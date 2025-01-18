<?php
namespace ScriptingThoughts\Controllers;

class RoutesController extends Controller
{
    public $pageTitle;
    public $pageFile;
    public $bookingPosition = "";
    public $bookingContent;
    public $package;

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

        $bookingSequence = ["booking.select-package", "booking.customer-overview", "booking.event-details", "booking.summary", "booking.payment"];

        $this->pageTitle = "Booking";
        $this->package = "standard-package";
        
        $package === "" ? $this->package = "standard-package" : $this->package = $package;
        
        switch($this->bookingPosition) {
            case "":
                $this->bookingContent = $this->renderView($this->component("booking.select-package"), 
                [
                    
                ]);
                break;

            case "package":
                echo $this->renderView($this->component($package), 
                [
                    
                ]);
                break;
        }

        $this->view("booking");
    }
}