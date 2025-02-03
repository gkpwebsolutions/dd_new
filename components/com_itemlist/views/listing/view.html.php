<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla view library
jimport('joomla.application.component.view');

class ItemlistViewListing extends JViewLegacy
{
    // Overwriting JView display method
    function display($tpl = null)
    {   
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("*")
            ->from('w1h54_healthpackages');  // Ensure to use the correct table name (i.e. #__healthpackages)
        $db->setQuery($query);
        $this->allItems = $db->loadObjectList();

        // Display the view
        parent::display($tpl);
    }
}
