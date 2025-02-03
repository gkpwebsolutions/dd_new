<?php
defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';

// Fetch slider data (e.g., images) from the database or component
$sliderItems = ModCustomSliderHelper::getSliderData();

// Include the module layout file (HTML structure)
require JModuleHelper::getLayoutPath('mod_customslider');
