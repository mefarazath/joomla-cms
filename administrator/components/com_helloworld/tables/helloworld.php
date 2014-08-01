<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HelloWorldTableHelloWorld extends JTable
{
    function __construct(&$db) {
        $table = '#__helloworld';
        $key = 'id';
       // $db = JFactory::getDbo();
        
        parent::__construct($table, $key, $db);
    }
    
    
}