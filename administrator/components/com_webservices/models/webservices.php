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
    
    
    
}