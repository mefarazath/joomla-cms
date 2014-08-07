<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('_JEXEC') or die('Restricted Access');

class WebServicesModelWebServices extends JModelList
{
    
    function getListQuery() 
    {
           $db = JFactory::getDbo();
           $query = $db->getQuery(true);
           
           $query->select('*')
                 ->from('#__webservices');
           
           return $query;
    }
    
    
    // return the list of web services from the file
    function getItems() {
        
        //create a registry object
        $registry = Joomla\Registry\Registry::getInstance(1);
        
        // check whether the json file exists
        if(!file_exists('webservices.json'))
        {
            $this->_errors = 'Web Services File Not Found';
            return false;
        }
        
        //load the webservices.json file into the Registry object
        $registry->loadFile('webservices.json');
        
        //convert the registry into an array 
        $registryArray = $registry->toArray();
        
        // retrieve the services from the registry array in the 'service'=>array(params)
        $services = $registryArray['webservices'];
        
        //create the list to be returned to the view
        $items = array();
        
        // convert each service to a list item
        foreach($services as $key=>$value)
        {
            // get the parameters of the services
           $params = $value;
        
           $registry = new JRegistry;
           // load the parameters onto a registry object
           $registry->loadArray($params);         
           // convert the registry object onto an item object and insert it to items
            $items[] = $registry->toObject();  
        }

        return $items;
    }
    
 
    
    
    
}