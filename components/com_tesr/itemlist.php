<?php

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Itemlist', JPATH_COMPONENT);
JLoader::register('ItemlistController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = JControllerLegacy::getInstance('Itemlist');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
