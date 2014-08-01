<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class WebServicesTableWebService extends JTable{
    
    function __construct(&$db) 
    {
        $table = '#__webservices';
        $key = 'id';
        
        parent::__construct($table, $key,$db);
    }
}