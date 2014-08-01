<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('_JEXEC') or die('Restricted Access');

class WebServicesController extends JControllerLegacy
{
    
    function display($cachable = false, $urlparams = array())
    {
        // set the view if not set
        $input = JFactory::getApplication()->input;
        $input->set('view',$input->getCmd('view','WebServices'));
        
        // call the parent display method
        parent::display($cachable);
    }
}
