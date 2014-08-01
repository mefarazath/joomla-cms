<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.view');


class HelloWorldViewHelloWorlds extends JViewLegacy
{
    
    function display($tpl = null) {
        
        //Get data from the model
        $items = $this->get('Items');
        $pagination = $this->get('Pagination');
        
        //check for errors
        if (count($errors = $this->get('Errors'))) 
            {
                JError::raiseError(500, implode('<br />', $errors));
                return false;
            }
        
        // Assign data to the view
        $this->items = $items;
        $this->pagination = $pagination;
        
        // Set the toolbar
        $this->addToolBar();
        
        //Display the template
        parent::display($tpl);
    }
    
    
    function addToolBar()
    {
     
        JToolbarHelper::title('HELLO WORLD MANAGER');
        JToolbarHelper::deleteList('Are You sure?', 'helloworlds.delete');
        JToolbarHelper::editList('helloworld.edit');
        JToolbarHelper::addNew('helloworld.add');
    }
}