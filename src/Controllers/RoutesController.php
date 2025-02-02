<?php

namespace ScriptingThoughts\Controllers;

use ScriptingThoughts\Services\GoogleCalendarService;
use ScriptingThoughts\Services\StripeService;
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

    public function booking($package = "", $bookingPosition = "")
    {
        $this->pageTitle = "Booking";
        $calendarService = new GoogleCalendarService();
        $calendarId = $_ENV["GOOGLE_CALENDAR_ID"];

        $post = count($_POST) > 0 ? $this->filter_post() : false;

    
        

           // var_dump(json_decode(html_entity_decode($post["bookingData"])));

         
            
            $this->pageTitle = "Home";
            $this->pageFile = "home";
    

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

        var_dump(json_decode(html_entity_decode($post['data'])));
        var_dump(json_encode($post['data']));

        $bookingDetails = json_decode(html_entity_decode($post['data']), true);

        $eventData = [
            'summary' => 'Photo booth event',
            'location' => $bookingDetails['venueAddress'],
            'description' => 'Photo booth event with ' . $bookingDetails['firstName']." ".$bookingDetails['lastName'] . " at " . $bookingDetails['venueName'],
            'start' => [
                'dateTime' => $bookingDetails['eventDate']."T".$bookingDetails['eventTime'], // Specify the start time in ISO 8601 format
                'timeZone' => 'America/New_York',
            ],
            'end' => [
                'dateTime' => $bookingDetails['eventDate']."T".$bookingDetails['eventTime'], // Specify the end time in ISO 8601 format
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
       print_r($calendarService->insertEvent($calendarId, $eventData)["status"]);
        echo '</pre>';

        $bookingStatus = $calendarService->insertEvent($calendarId, $eventData)["status"];

        if($bookingStatus === "confirmed") {
            // send emails
        }
        //$calendarService->insertEvent($calendarId, $eventData);
    }

    public function verifyPayment() {
        $stripeService = new StripeService();
        $post = $this->filter_post();

        $sessionId = $post["session_id"];

        $this->returnJsonHttpResponse(200, $stripeService->verifyPayment($sessionId));
    }
}