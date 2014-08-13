<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// no direct access to this file
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
    function getItems() 
    {
        
        //create a registry object
        $registry = \Joomla\Registry\Registry::getInstance(1);
        
        // check whether the json file exists
        if(!file_exists('webservices.json'))
        {
            $this->_errors = 'Web Services File Not Found';
            return false;
        }
        
        //load the webservices.json file into the Registry object
        $registry->loadFile('webservices.json');
        
        //convert the registry into an array and get the services  
        $services = $registry->toArray();
       // print_r($services);
        // get the services converted to items
        $items = $this->convertServicesToItems($services);

        return $items;
        
    }
    
 
    /*
     *  Method to convert the services in the json file to stdObjects items
     * 
     *  param $services an associative array of services key as their name an attibute array as the value
     * 
     * returns $items array of objects 
     */
    function convertServicesToItems($servicesArray)
    {
         //create the list to be returned to the view
        $items = array();
       
        // convert each service to a list item
        foreach($servicesArray as $service)
        {
           // get the parameters of the services
           $params = $service;
           
           if(!is_array($params))
           {
               continue;
           }
               
           $registry = new JRegistry;
           // load the parameters onto a registry object
           $registry->loadArray($params);         
           // convert the registry object onto an item object and insert it to items
            $items[] = $registry->toObject();  
        }
       // print_r($items);
        return $items;
        
    }
    
}