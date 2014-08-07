<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

// load tooltip behaviour
JHtml::_('behavior.tooltip');

?>

<form action="<?php echo JRoute::_('index.php?option=com_webservices'); ?>" method="post" name="adminForm" id="adminForm">
    <?php
       foreach($this->items as $i=>$item):
           
            echo JHtmlGrid::id($i, $item->name);
         // echo $item->id."  ".$item->name."   ".$item->publicKey."<br>";
            echo " ".$item->name . "        " . $item->publicKey;
            echo "<br>";
            
    endforeach;
        ?>
       <div>
            <input type="hidden" name="task" value=""/>
            <input type="hidden" name="boxchecked" value="0" />
            <?php echo JHtml::_('form.token'); ?>
        </div>   
</form>