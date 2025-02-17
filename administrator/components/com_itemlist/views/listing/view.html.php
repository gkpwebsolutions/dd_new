<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

class ItemlistViewListing extends JViewLegacy
{
    
    function display($tpl = null)
    {   
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("*")
            ->from('w1h54_healthpackages');
        $db->setQuery($query);
        $this->allItems = $db->loadObjectList();

        
        parent::display($tpl);

    }

}
