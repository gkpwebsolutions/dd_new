<?php
// Prevent direct access to this file
defined('_JEXEC') or die;

// Include the helper file
require_once __DIR__ . '/helper.php';

// Get data from the helper (e.g., from a database or component)
$data = ModCustomAdminModuleHelper::getData();

// Load the layout file (admin template file)
require JModuleHelper::getLayoutPath('mod_customadminmodule');
?>
