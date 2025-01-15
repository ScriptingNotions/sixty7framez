<?php
namespace ScriptingThoughts\Controllers;

class RoutesController extends Controller
{
    public $pageTitle;
    public $pageFile;

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
        $this->pageFile = "about";

        $this->view("about");
    }
}