<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/*
 * Hello World Component Controller 
*/
class HelloWorldController extends JControllerLegacy
{
    
    
    
   function sayHello(){
       echo "Hello Boys";
   } 
}