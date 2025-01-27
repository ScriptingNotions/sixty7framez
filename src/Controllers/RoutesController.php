<?php

namespace ScriptingThoughts\Controllers;

use ScriptingThoughts\Services\GoogleCalendarService;

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

        $post = count($_POST) > 0 ? $this->filter_post() : false;

        if($post != false) {
            if(isset($post["home-first-name"]) && isset($post["home-last-name"]) && isset($post["home-email"]) && isset($post["home-phone"])) {
                $this->firstName = $post["home-first-name"];
                $this->lastName = $post["home-last-name"];
                $this->email = $post["home-email"];
                $this->phone = $post["home-phone"];
            }

           // var_dump(json_decode(html_entity_decode($post["bookingData"])));

            if(isset($post["bookingData"])) {
                $bookingData = json_decode(html_entity_decode($post["bookingData"]));

                $this->firstName = $bookingData->firstName;
                $this->lastName = $bookingData->lastName;
                $this->email = $bookingData->email;
                $this->phone = $bookingData->phone;
                $this->eventType = $bookingData->eventType;
                $this->eventTime = $bookingData->eventTime;
                $this->eventDate = $bookingData->eventDate;
                $this->venueAddress = $bookingData->venueAddress;
                $this->venueName = $bookingData->venueName;
                $bookingData->package = $bookingData->package;

                return $this->returnJsonHttpResponse(200, $bookingData);
            }       
            
            $this->pageTitle = "Home";
            $this->pageFile = "home";
    
        }

        $package === "" ? $this->package = "standard-package" : $this->package = $package;
        
        $serviceAccountInfo = [
            "private_key" =>  $_ENV["GOOGLE_SERVICE_ACCOUNT_PKEY"],
            "client_email" => $_ENV["GOOGLE_SERVICE_ACCOUNT_EMAIL"]
        ];

        $calendarService = new GoogleCalendarService($serviceAccountInfo);
        $calendarId = $_ENV["GOOGLE_CALENDAR_ID"];

        echo '<pre>';
        print_r($calendarService->getListOfEvents($calendarId));
        echo '</pre>';

        $eventData = [
            'summary' => 'Project Meeting',
            'location' => '123 Main Street, City, Country',
            'description' => 'Discuss project updates and next steps.',
            'start' => [
                'dateTime' => '2025-01-30T10:00:00-07:00', // Specify the start time in ISO 8601 format
                'timeZone' => 'America/New_York',
            ],
            'end' => [
                'dateTime' => '2025-01-30T11:00:00-07:00', // Specify the end time in ISO 8601 format
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
    

        $this->view("booking");
    }
}