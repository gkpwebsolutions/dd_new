<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla view library
jimport('joomla.application.component.view');

class ItemlistViewListing extends JViewLegacy
{
    
    function display($tpl = null)
    {   
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("*")
            ->from('#_healthpackages');  
        $db->setQuery($query);
        $this->allItems = $db->loadObjectList();

    
        parent::display($tpl);
    }
}
