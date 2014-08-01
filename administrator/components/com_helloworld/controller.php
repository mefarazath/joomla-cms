<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

//import Joomla controller library
jimport('joomla.application.component.controller');

class HelloWorldController extends JControllerLegacy
{
    
    function display($cachable = false, $urlparams = array()) 
    {
        // set default view if not set
        $input = JFactory::getApplication()->input;
        $input->set('view', $input->getCmd('view','HelloWorlds'));
        
        // call parent behaviour
        parent::display($cachable);
    }
}