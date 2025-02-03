<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
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
            ->from('#__itemlist');
        $db->setQuery($query);
        $this->allItems = $db->loadObjectList();

        // Display the view
        parent::display($tpl);

    }

}
