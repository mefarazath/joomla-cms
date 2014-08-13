<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Webservice001Test
 *
 * @author Farazath Ahamed
 */

require_once 'SeleniumJoomlaTestCase.php';

class Webservice001Test extends SeleniumJoomlaTestCase{
    //put your code here
    
    function testwebServiceComponent()
    {
        $this->setUp();
        $this->gotoAdmin();
        sleep(2);
        $this->doAdminLogin();
        
        $this->click('link=Components');
        sleep(2);
        $this->click('link=com-webservices');
        sleep(3);
        
        $this->jPrint('Web Services component working');
        $this->doAdminLogout();
        sleep(3);
        
    }
    
    
    function testAddWebservice()
    {
        $this->setUp();
        $this->jPrint('Starting testAddWebservice');
        $this->gotoAdmin();
        $this->doAdminLogin();
        $this->click('link=Components');
        sleep(2);
        $this->click('link=com-webservices');
        sleep(3);
        
        $this->jPrint('Add new web services');
        
        $testServices = array('facebook', 'twitter', 'github', 'googleMaps');
        
       
        foreach ($testServices as $service)
        {
            // click on the button to add a new service
            $this->jPrint('Adding '.$service);
            $this->jClick('Add a Service');
            sleep(2);
            // fill the form to add a service
            $this->type('jform_name',$service); sleep(1);       
            $this->type('jform_publicKey',  hash('md5', rand(1,10000))); sleep(1);
            $this->type('jform_privateKey',  hash('md5', rand(1,10000))); sleep(1);
            $this->type('jform_passPhrase',$service.rand(23,1900)); sleep(1);
            sleep(2);
            
            // save the service
            $this->jClick('Save & Close');
            sleep(2);
            
        }
        
        sleep(3);
        $this->jPrint(' Test Complete for adding new web service');
        
    }
    
    
    
    
}
