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

    public function booking()
    {
        $this->pageTitle = "Booking";
        $this->package = "standard-package";
        
        $post = filter_post();

        if(isset($post["package-type"])) {
            $this->package = $post["package-type"];
        }

        switch($this->bookingPosition) {
            case "":
                $this->bookingContent = $this->renderView($this->component("booking.select-package"), 
                [
                    
                ]);
                break;

            case "package":
                echo $this->renderView($this->component(""), 
                [
                    
                ]);
                break;
        }

        $this->view("booking");
    }
}