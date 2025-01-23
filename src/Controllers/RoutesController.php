<?php
namespace ScriptingThoughts\Controllers;

class RoutesController extends Controller
{
    public $pageTitle;
    public $pageFile;
    public $bookingPosition = "";
    public $bookingContent;
    public $package;
    public $customerDetails;

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
        
        $package === "" ? $this->package = "standard-package" : $this->package = $package;
        
        $this->customerDetails = [
            "package" => $this->package
        ];

        $this->view("booking");
    }
}