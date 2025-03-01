<?php

namespace ScriptingThoughts\Controllers;

use ScriptingThoughts\Services\GoogleCalendarService;
use ScriptingThoughts\Services\StripeService;
use ScriptingThoughts\Services\MailService;

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
        $calendarService = new GoogleCalendarService();
        $calendarId = $_ENV["GOOGLE_CALENDAR_ID"];

        $post = count($_POST) > 0 ? $this->filter_post() : false;


        

           // var_dump(json_decode(html_entity_decode($post["bookingData"])));


        $package === "" ? $this->package = "standard-package" : $this->package = $package;
        


        $eventData = [
            'summary' => 'Project Meeting',
            'location' => '123 Main Street, City, Country',
            'description' => 'Discuss project updates and next steps.',
            'start' => [
                'dateTime' => '2025-01-29T10:00:00-07:00', // Specify the start time in ISO 8601 format
                'timeZone' => 'America/New_York',
            ],
            'end' => [
                'dateTime' => '2025-01-29T11:00:00-07:00', // Specify the end time in ISO 8601 format
                'timeZone' => 'America/New_York',
            ],
            'reminders' => [
                'useDefault' => false,
                'overrides' => [
                    ['method' => 'email', 'minutes' => 24 * 60], // Send email reminder 24 hours before
                    ['method' => 'popup', 'minutes' => 10], // Popup reminder 10 minutes before
                ],
            ],
        ];
        
        echo '<pre>';
        foreach($calendarService->getListOfEvents($calendarId)["items"] as $event) {
            //echo 'Start: '; 
            // 
            //print_r($event);

           // echo 'End: ';
            //print_r($event["end"]);
        }
        //print_r($calendarService->getListOfEvents($calendarId)[0]->end);
       // print_r($calendarService->insertEvent($calendarId, $eventData));
        echo '</pre>';

    
        if($customerDetails) {
            $customerDetails = urldecode(strrev(base64_decode($customerDetails)));
            $customerDetails = explode("-", $customerDetails);
            //explode("-", $customerDetails);
            $this->bookingDetails["firstName"] =  $customerDetails[0];
            $this->bookingDetails["lastName"] = $customerDetails[1];
            $this->bookingDetails["email"] = $customerDetails[2];
            $this->bookingDetails["phone"] = $customerDetails[3];
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
        
        
        echo '<pre>';
        foreach($calendarService->getListOfEvents($calendarId)["items"] as $event) {
           // echo 'Start: '; 
            
            //print_r($event);

          // echo 'End: ';
           // print_r($event["end"]);
        }
        //print_r($calendarService->getListOfEvents($calendarId)[0]->end);
       //print_r($calendarService->insertEvent($calendarId, $eventData)["status"]);
        echo '</pre>';

       $booking = $calendarService->insertEvent($calendarId, $eventData);

       echo '<pre>';
        print_r($booking);
       echo '</pre>';

       if($booking["status"] === "confirmed") { 
            $this->bookingDetails["htmlLink"] = $booking["htmlLink"];

            $startTime =  new \DateTime($booking["start"]["dateTime"]);
            $endTime =  new \DateTime($booking["end"]["dateTime"]);
            
            $formatedStartTime = $startTime->format("l, F j, Y g:i A T");
            $formatedEndTime = $endTime->format("l, F j, Y g:i A T");

            $this->bookingDetails["startTime"] = $formatedStartTime;
            $this->bookingDetails["endTime"] = $formatedEndTime;
            
            // send emails
            $mail = new MailService();
            $mail = $mail->send(
                "noviceone@outlook.com", 
                "Booking complete!", 
                $this->partial("bookingEmailConfirmation")
                //"<h1>Your </h1>booking has been complete. Booking link: {$booking["htmlLink"]} Summary: {$booking["summary"]} Details: {$booking["description"]} Location: {$booking["location"]}" 
            );
            
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

        

        $mail = new MailService();
        $mail = $mail->send(["noviceone@outlook.com"], "Inquiry", "Name: {$post["name"]} Email: {$post["email"]} Phone: {$post["phone"]} Message: {$post["message"]}");

        var_dump($mail);
        if($mail) {
            $this->returnJsonHttpResponse(200, ["message_sent" => true, "message_HTML" => $this->renderView($this->component("thank-you-message")) ]);
        } else {
            $this->returnJsonHttpResponse(500, ["message_sent" => false]);
        }
    }
}