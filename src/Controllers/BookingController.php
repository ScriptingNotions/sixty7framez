<?php
namespace ScriptingThoughts\Controllers;

class BookingController extends Controller
{
    public $bookingPosition = "";

    public function getBookingPosition()
    {
        //$this->bookingPosition = $_POST['bookingPosition'];

        switch($this->bookingPosition) {
            case "":
                echo $this->renderView($this->component("booking-select-package"), 
                [
                    
                ]);
                break;

            case "package":
                echo $this->renderView($this->component(""), 
                [
                    
                ]);
                break;
        }

    }


}