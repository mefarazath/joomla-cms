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
 * {componentName}View{ViewName}
 */
class HelloWorldViewfluffy extends JViewLegacy{
    
    // Overwriting the Jview display method
    function display($tpl = null) {
        
        // Assign data to the view
        $this->msg = 'Fluffy Message';
        
        //Display the view
        parent::display($tpl);
    }
    
}