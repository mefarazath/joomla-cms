<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HelloWorldModelHelloWorlds extends JModelList
{
    
    protected function getListQuery() {
        
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('id,greeting')
              ->from('#__helloworld');
        
        return $query;
    }
    
}