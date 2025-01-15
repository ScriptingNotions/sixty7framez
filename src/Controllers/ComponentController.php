<?php
namespace ScriptingThoughts\Controllers;

class ComponentController extends Controller
{
    public function mobileMenu()
    {
        echo $this->renderView($this->component("mobile-nav-menu"), 
        [
            
        ]);
    }


}