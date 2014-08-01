<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('_JEXEC') or die('Restricted Access');

class WebServicesViewWebService extends JViewLegacy 
{
    function display($tpl = null) 
    {
        //set data from the model
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');
        
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
        $input = JFactory::getApplication()->input;
        $input->set('hidemainmenu',true);
        $isNew = ($this->item->id == 0) ;
        
        JToolbarHelper::title($isNew?'Add A Service':'Edit A Service');
        JToolbarHelper::save('webservice.save');
        JToolbarHelper::cancel('webservice.cancel', $isNew? 'Cancel' : 'Close');   
    }
}
