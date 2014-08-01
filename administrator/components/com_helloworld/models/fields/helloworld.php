<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//no direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');



class JFormFieldHelloWorld extends JFormFieldList
{
    
    protected $type = 'HelloWorld';
    
    
  protected function getOptions() 
  {
       $db = JFactory::getDBO();
                $query = $db->getQuery(true);
                $query->select('id')->select('greeting');
                $query->from('#__helloworld');
                $db->setQuery((string)$query);
                $messages = $db->loadObjectList();
       
      $options = array();
      if($messages)
      {          
          foreach ($messages as $message) 
          {
              $options[] = JHtml::_('select.option',$message->id,$message->greeting);  
          }    
      }
      print_r(parent::getOptions());
      echo "<br>";
       $options = array_merge( parent::getOptions(),$options);
       print_r($options);
       return $options;   
  }
}