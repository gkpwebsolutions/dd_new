<?php

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Testlist', JPATH_COMPONENT);
JLoader::register('TestlistController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = JControllerLegacy::getInstance('Testlist');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
