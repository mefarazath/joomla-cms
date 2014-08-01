<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('_JEXEC') or die('Restricted Access');

class WebServicesViewWebServices extends JViewLegacy 
{
    function display($tpl = null) 
    {
        //set data from the model
        $this->items = $this->get('Items');
        
        //check for error
        $errors = $this->get('Errors');
        if(count($errors))
        {
            JError::raiseError(500,  join('<br>', $errors));
            return false;
        }
        
        // add the toolbar to the view
        $this->addToolbar();
        
        //display the template
        parent::display($tpl);
    }
    
    function addToolbar()
    {
        JToolbarHelper::title('Web Services Manager');
        JToolbarHelper::addNew('webservice.add', 'Add a Service');
        JToolbarHelper::editList('webservice.edit','Edit a Service');
        JToolbarHelper::deleteList('Are you sure to remove the service?','webservices.delete', 'Remove Service');
        JToolbarHelper::custom('webservice.back', '', '', 'Back2', false);
        JToolbarHelper::back();
    }
}