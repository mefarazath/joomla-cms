<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class WebServicesControllerWebService extends JControllerForm
{
    
    function back()
    {
        $this->setRedirect(JRoute::_('index.php')) ;
        $this->redirect();
    }    
}
