<?php

// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\View\HtmlView;

/**
 * Item Detail view class.
 */
class TestlistViewTestDetail extends HtmlView {

    // Overwriting JView display method
    function display($tpl = null)
    {   
        // Get the input from the request
        $input = Factory::getApplication()->input;
        $itemId = $input->getInt('id', 0);  // Get 'id' from the URL

        // If no valid item ID, redirect or show an error message
        if ($itemId == 0) {
            Factory::getApplication()->enqueueMessage('Invalid item ID', 'error');
            return;
        }

        // Get the database object
        $db = Factory::getDbo();
        $query = $db->getQuery(true)
                    ->select('*')
                    ->from('#__test')  // Ensure this is the correct table name
                    ->where('id = ' . (int) $itemId);  // Use the item ID for fetching the correct record
        $db->setQuery($query);
        $item = $db->loadObject();  // Load the item from the database

        if (!$item) {
            // If the item is not found, show an error message
            Factory::getApplication()->enqueueMessage('Item not found', 'error');
            return;
        }

        // Assign the item to the view
        $this->item = $item;

        // Display the view
        parent::display($tpl);
    }
}
