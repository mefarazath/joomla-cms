<?php

defined('_JEXEC') or die('Restricted Access');

$controller = JControllerLegacy::getInstance('webservices');

$input = JFactory::getApplication()->input;
$task = $input->getCmd('task');

$controller->execute($task);

$controller->redirect();