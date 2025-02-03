<?php
defined('_JEXEC') or die;

// Import the JModuleHelper class
use Joomla\CMS\Helper\ModuleHelper;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

// Call the helper function and pass parameters
$hello = modHelloWorldHelper::getHello($params);

// Get the module layout
require ModuleHelper::getLayoutPath('mod_footer');
