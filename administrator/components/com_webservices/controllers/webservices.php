<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class WebServicesControllerWebServices extends JControllerAdmin
{
    // set the model to enable deletion of a list of elements
      public function getModel($name = 'WebService', $prefix = 'WebServicesModel') 
        {
                $model = parent::getModel($name, $prefix, array('ignore_request' => true));
                return $model;
        }
        
    
     // method to delete web service records { this will be removed if services are deleted based on their ids rather than name}   
      function delete() {
          
          //check for session forgeries
          JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));
          
          //get items to remove from the request
          $cid = JFactory::getApplication()->input->get(cid,array(),'array');
          
          if(!is_array($cid) || count($cid) < 0)
          {
              JLog::add(JText::_($this->text_prefix.'NO_ITEMS_SELECTED'),  JLog::WARNING, 'jerror');
          }
          else
          {
              //get the model
              $model = $this->getModel('WebService');
              
              if($model->delete($cid))
              {
                  $this->setMessage(JText::plural($this->text_prefix.'_N_ITEMS_DELETED',count($cid)));
              }
              else
              {
                  $this->setMessage($model->getError());
              }
          }
          
          // Invoke the postDelete method to allow for the child class to access the model.
		$this->postDeleteHook($model, $cid);

		$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list, false));
          
          
      }
          
}