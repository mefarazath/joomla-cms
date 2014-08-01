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
}