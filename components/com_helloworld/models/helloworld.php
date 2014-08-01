<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to this file
defined('_JEXEC') or die("Restricted access");

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/*
* HelloWorld model 
*/
class HelloWorldModelHelloWorld extends JModelItem
{
    
    protected $msg;
    
    public function getMsg()
    {
     
        if(!isset($this->msg))
        {
            $jinput = JFactory::getApplication()->input;
            $id = $jinput->get('id',1,'INT');
            
            switch($id)
            {
                case 2:
                    $this->msg = 'Good Bye World!';
                break;
            
                default:
                case 1:
                    $this->msg = "Hello World!";
                break;    
            }
            
        }
        return $this->msg; 
    }
} 