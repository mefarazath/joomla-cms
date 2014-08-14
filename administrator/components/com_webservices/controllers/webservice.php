<?php
//require 'Record.php';
//use Record\Record;
use Joomla\Registry\Registry;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class WebServicesControllerWebService extends JControllerForm
{
    
    function back()
    {
//        $this->setRedirect(JRoute::_('index.php')) ;
//        $this->redirect();
        
        $record = new stdClass;
        $record->name = 'recaptcha';
        $record->publickey = 'bysdasasyduyasdj11';
        $record->privatekey = 'asda123818983adasd9932';
        $record->otherkeys =  null;
        
        $registry = Registry::getInstance(1);
        
        if(file_exists('webservices.json'))
        {
            $registry->loadFile('webservices.json');
        }
        
        $registry->set('webservices.'.$record->name, $record);
        $contents = $registry->toString();
        echo $contents;

        file_put_contents('webservices.json',$contents);
              
    } 
    
    
    function edit() {     
        $app = JFactory::getApplication();
        $cid = $app->input->get('cid',array(),'array');
        
        $context = 'com_webservices.edit.webservice';
        
        $recordId = $cid[0];

        $registry = Registry::getInstance(1)->loadFile('webservices.json');
        
        $service = $registry->get($recordId,array());
        
        $data = empty($service)? null : $service;
        
        $this->holdEditId($context,$cid[0]);
        $app->setUserState($context . '.data',$data);
        
        $this->setRedirect(
                            JRoute::_(
                                    'index.php?option=' . $this->option . '&view=' . $this->view_item.
                                    $this->getRedirectToItemAppend($recordId,'name'), false)
                           );
        

        return true;
    }
    
}  
    
  
