<?php

namespace ScriptingThoughts\Controllers;

use ScriptingThoughts\Services\GoogleCalendarService;
use ScriptingThoughts\Services\StripeService;
use ScriptingThoughts\Services\MailService;
use Dompdf\Dompdf;
use ScriptingThoughts\Services\Uploadcare;

class RoutesController extends Controller
{
    public $pageTitle;
    public $pageFile;
    public $bookingPosition = "";
    public $bookingContent;
    public $package;
    public $firstName;
    public $lastName;
    public $phone;
    public $email;
    public $eventType;
    public $eventTime; 
    public $eventDate; 
    public $venueAddress; 
    public $venueName;
    public $bookingDetails;
    public $isDST;

    public function home()
    {
        $this->pageTitle = "Home";
        $this->pageFile = "home";

        $this->view("home");
    }

    public function process()
    {
        $this->pageTitle = "The Process";

        $this->view("process");
    }

    public function about()
    {
        $this->pageTitle = "About";

        $this->view("about");
    }

    public function contact()
    {
        $this->pageTitle = "Contact";

        $this->view("contact");
    }

    public function booking($package = "", $bookingPosition = "", $customerDetails = "")
    {
        $this->pageTitle = "Booking";

        $post = count($_POST) > 0 ? $this->filter_post() : false;

        // var_dump(json_decode(html_entity_decode($post["bookingData"])));

        $package === "" ? $this->package = "standard-package" : $this->package = $package;
        $package = trim($package);
        $package = htmlspecialchars($package);
    
        if($customerDetails) {
            $customerDetails = urldecode(strrev(base64_decode($customerDetails)));
            $customerDetails = explode("-", $customerDetails);
            $customerDetails = array_map('trim', $customerDetails);
            $customerDetails = array_map('htmlspecialchars', $customerDetails);

            //explode("-", $customerDetails);
            $this->bookingDetails["firstName"] =  $customerDetails[0];
            $this->bookingDetails["lastName"] = $customerDetails[1];
            $this->bookingDetails["email"] = $customerDetails[2];
            $this->bookingDetails["phone"] = $customerDetails[3];
            $this->bookingDetails["companyName"] = $customerDetails[4];
        }


        $this->view("booking");
    }

    public function bookingPayment() {
        $stripeService = new StripeService();

        $this->returnJsonHttpResponse(200, [
            "clientSecret" => $stripeService->stripeCheckoutSession()->client_secret, 
            "sessionId" => $stripeService->stripeCheckoutSession()->id
        ]);
    }

    public function bookEvent() {
        $post = $this->filter_post();
        $calendarService = new GoogleCalendarService();
        $calendarId = $_ENV["GOOGLE_CALENDAR_ID"];

        $signatureData = $post["signature"];
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
        $signatureData = base64_decode($signatureData);

        // $signaturePath = "signatures/signature_" . time() . ".png";
        // file_put_contents($signaturePath, $signatureData);

        $stripeService = new StripeService();

        // var_dump(json_decode(html_entity_decode($post['data'])));
        // var_dump(json_encode($post['data']));

        $this->bookingDetails = json_decode(html_entity_decode($post['data']), true);

        $date = new \DateTime($this->bookingDetails['eventDate'], new \DateTimeZone('America/New_York'));
        $this->isDST = (bool)$date->format('I');
        $DSTTime = $this->isDST ? "04:00" : "05:00";

        $packageTime = $this->bookingDetails['packageTime'];
        $time = explode(":", $this->bookingDetails['eventTime']);

        $hour = $time[0];
    
        $time[0] = $hour + $packageTime;

        var_dump('Photo booth event with: ' . $this->bookingDetails['firstName']." ".$this->bookingDetails['lastName'] . " at " . $this->bookingDetails['venueName']. " Event Type: " . $this->bookingDetails['eventType'] . $this->bookingDetails['eventTypeOther'] != "" ? $this->bookingDetails['eventTypeOther'] : " " . " Phone: " . $this->bookingDetails['phone'] . " Email: " . $this->bookingDetails['email'] . " Package: " . $this->bookingDetails['package'] . " ID: ".$this->bookingDetails['orderId']);
        $eventData = [
            'summary' => 'Photo booth event',
            'location' => $this->bookingDetails['venueAddress'] . " " . $this->bookingDetails['venueCity'] . ", " . 
                          $this->bookingDetails['venueState'] . " " . $this->bookingDetails['venueZip'],
            'description' => "<b>Event With:</b> " . $this->bookingDetails['firstName'] . " " .
                              $this->bookingDetails['lastName'] . "<br>" .
                              "<b>Place:</b> " . $this->bookingDetails['venueName'] . "<br>" .
                              "<b>Event Type:</b> " . $this->bookingDetails['eventType'] . 
                              ($this->bookingDetails['eventTypeOther'] != "" ? " - " . $this->bookingDetails['eventTypeOther'] : "") . "<br>" . 
                              "<b>Phone:</b> " . $this->bookingDetails['phone'] . "<br>" . 
                              "<b>Email:</b> " . $this->bookingDetails['email'] . "<br>" . 
                              "<b>Package:</b> " . $this->bookingDetails['packageType'] . "<br>" . 
                              "<b>ID:</b> " . $this->bookingDetails['orderId'],
            'start' => [
                'dateTime' => $this->bookingDetails['eventDate'] . "T" . $this->bookingDetails['eventTime'] . "-" . $DSTTime,
                'timeZone' => 'America/New_York',
            ],
            'end' => [
                'dateTime' => $this->bookingDetails['eventDate'] . "T" . implode(":", $time),
                'timeZone' => 'America/New_York',
            ],
            'reminders' => [
                'useDefault' => false,
                'overrides' => [
                    ['method' => 'email', 'minutes' => 24 * 60],
                    ['method' => 'popup', 'minutes' => 10],
                ],
            ],
        ];
        
        
    //     echo '<pre>';
    //     foreach($calendarService->getListOfEvents($calendarId)["items"] as $event) {
    //        // echo 'Start: '; 
            
    //         //print_r($event);

    //       // echo 'End: ';
    //        // print_r($event["end"]);
    //     }
    //     //print_r($calendarService->getListOfEvents($calendarId)[0]->end);
    //    //print_r($calendarService->insertEvent($calendarId, $eventData)["status"]);
    //     echo '</pre>';

       $booking = $calendarService->insertEvent($calendarId, $eventData);

    //    echo '<pre>';
    //     print_r($booking);
    //    echo '</pre>';

       if(isset($booking["status"]) && $booking["status"] === "confirmed") { 
            $this->bookingDetails["htmlLink"] = $booking["htmlLink"];

            $startTime =  new \DateTime($booking["start"]["dateTime"]);
            $endTime =  new \DateTime($booking["end"]["dateTime"]);
            
            $formatedStartTime = $startTime->format("l, F j, Y g:i A T");
            $formatedEndTime = $endTime->format("l, F j, Y g:i A T");

            $this->bookingDetails["startTime"] = $formatedStartTime;
            $this->bookingDetails["endTime"] = $formatedEndTime;
            
            $charge = $stripeService->getCharge($this->bookingDetails["sessionId"]);
            $this->bookingDetails["receipt"] = $charge->receipt_url;

            // send emails
            $mail = new MailService();
            $mail = $mail->send(
                "noviceone@outlook.com", 
                "Booking complete!", 
                $this->partial("bookingEmailConfirmation")
                //"<h1>Your </h1>booking has been complete. Booking link: {$booking["htmlLink"]} Summary: {$booking["summary"]} Details: {$booking["description"]} Location: {$booking["location"]}" 
            );
                    
            // create contract pdf and send to provider
            $signature = $this->bookingDetails['contractSignature'];
            $date = date("F j, Y");
            $ipAddress = $_SERVER['REMOTE_ADDR'];
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
        
            $img = file_get_contents("https://ucarecdn.com/d1ebc5f9-baf2-4090-ac28-d5894ba50828/logosmall3.png");
            $base64_img = base64_encode($img);

            $img_tag = '<img class="logo" src="data:image/png;base64,' . $base64_img . '" alt="Logo" style="width: 64px; height: 64px;">';
            
            $dompdf = new Dompdf();

            $dompdf->loadHtml($this->renderView($this->component("contract"), [
                'img_tag' => $img_tag, 
                'signature' => $signature, 
                'date' => $date, 
                'bookingDetails' => $this->bookingDetails,
                'ipAddress' => $ipAddress,
                'userAgent' => $userAgent
            ]));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portait');

            // Render the HTML as PDF
            $dompdf->render();

            // Save signature to a temporary file
            $signaturePath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'signature_' . uniqid() . '.png';
            file_put_contents($signaturePath, $signatureData);

            // Save PDF output to a temporary file
            $tempPdfPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'temp_pdf_' . uniqid() . '.pdf';
            file_put_contents($tempPdfPath, $dompdf->output());

            $uploadcare = new Uploadcare();

            $pdfUpload = $uploadcare->uploadPdf($tempPdfPath, $this->bookingDetails['orderId']);
            // Delete the temporary file after upload
            unlink($tempPdfPath);

            $this->returnJsonHttpResponse(200, ["uploaded" => $pdfUpload, "charge" => $charge]);
            
        // send email to provider    
            if ($mail) {

            }
       }

        
    }

    public function getEvents() {
        $calendarService = new GoogleCalendarService();
        $calendarId = $_ENV["GOOGLE_CALENDAR_ID"];
        
        $bookedEventDateTime = [];

        foreach($calendarService->getListOfEvents($calendarId)["items"] as $event) {
            array_push($bookedEventDateTime, ["start" => $event["start"], "end" => $event["end"]]);
        }

        $this->returnJsonHttpResponse(200, $bookedEventDateTime);
    }

    public function verifyPayment() {
        $stripeService = new StripeService();
        $post = $this->filter_post();

        $sessionId = $post["session_id"];


        $this->returnJsonHttpResponse(200, $stripeService->verifyPayment($sessionId));
    }

    public function postContactMsg() {
        $post = $this->filter_post();

            $turnstileSecret = $_ENV['CF_TURNSTILE_SECRET'];
            $turnstileResponse = $post['turnstileResponse'];
        
            $verifyResponse = file_get_contents("https://challenges.cloudflare.com/turnstile/v0/siteverify", false, stream_context_create([
                "http" => [
                    "method" => "POST",
                    "header" => "Content-Type: application/x-www-form-urlencoded",
                    "content" => http_build_query([
                        "secret" => $turnstileSecret,
                        "response" => $turnstileResponse
                    ])
                ]
            ]));
        
            $responseData = json_decode($verifyResponse);
        
            if (!$responseData->success) {
                die('Turnstile verification failed. Please try again.');
            }
        
            // Continue with form processing if successful

        
        if($post["honeypot"] !== "") {
            $this->returnJsonHttpResponse(500, ["message_sent" => false]);
        }

        $mail = new MailService();
        $mail = $mail->send(["noviceone@outlook.com"], "Inquiry", "Name: {$post["name"]} Email: {$post["email"]} Phone: {$post["phone"]} Message: {$post["message"]}");

        if($mail) {
            $this->returnJsonHttpResponse(200, ["message_sent" => true, "message_HTML" => $this->renderView($this->component("thank-you-message")) ]);
        } else {
            $this->returnJsonHttpResponse(500, ["message_sent" => false, "honeypot" => $post["honeypot"]]);
        }
    }
}