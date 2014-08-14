<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('_JEXEC') or die('Restricted access');

class WebServicesModelWebService extends JModelAdmin
{
    
        function getTable($type = 'WebService', $prefix = 'WebServicesTable', $config = array()) 
        {
             return JTable::getInstance($type, $prefix, $config);
        }


        function getForm($data = array(), $loadData = true) 
        {

            //load the form from the xml file
            $form = $this->loadForm('com_webservices.webservice','webservice', array('control'=>'jform','load_data'=>$loadData));

            // check whether the form creation was successful
            if(empty($form))
            {         
                return false;
            }

            return $form;

        }

        function loadFormData() 
        {
           //check the previous session for entered data
           $data = JFactory::getApplication()->getUserState('com_webservices.edit.webservice.data', array());
          // echo "data from session";
          // print_r($data);
           if (empty($data)) 
           {
               $data = $this->getItem();
           }
        //   print_r($data);
           return $data;
              
        }

        function save($data) 
        {

           // write the service record to the database {this would be removed later}
           parent::save($data);
          
           $name = JFactory::getApplication()->input->get('name','');
           print_r($name);
           
           //load the file to registry object
           $registry = new JRegistry;

           if (file_exists('webservices.json')) {
               $registry->loadFile('webservices.json');
           }

           // name of the path to be saved in the file           
           $path = $data[name];
           
           //check whether a service has been just renamed 
           $renamed = $path != $name ? true : false;
           
           if($renamed)
           {
               $this->delete($name);
           }
           
           $registry->set($path, $data);
           $result = file_put_contents('webservices.json', $registry->toString()) ? true : false;

           return $result;
        }

        
        function delete($cid)
        {
            
            $services = (array)$cid;
            
            $registry = \Joomla\Registry\Registry::getInstance(1);
            
            if(!file_exists('webservices.json'))
            {
                $this->_errors = 'Web Services File Not Found';
                return false;
            }
            
            $registry->loadFile('webservices.json');
           // $services = $registry->toArray();
         
            foreach($services as $i)
            {
                 if(!$registry->exists($i)){
                     continue;
                 }
                 
                 $registry->set($i,'');
                 
            }
            
            file_put_contents('webservices.json', $registry);
            return true;
            
        }
        
    
        
}