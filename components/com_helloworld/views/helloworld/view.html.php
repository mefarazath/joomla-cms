<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to the file
defined('_JEXEC') or die('Restricted Access');

//import the Joomla view library
jimport('joomla.application.component.view');

/*
 * HTML view for the HelloWorld component 
 */
class HelloWorldViewHelloWorld extends JViewLegacy{
    
    // Overwriting the Jview display method
    function display($tpl = null) {
        
        // Assign data to the view
        $this->msg = $this->get('Msg');
        
        // Check for errors
        $errors = $this->get('Errors');
        if (count($errors))
        {
            JLog::add(implode("<br />", $errors), JLog::WARNING, 'jerror');
            return false;
        }
        
        //Display the view
        parent::display($tpl);
    }
    
}
