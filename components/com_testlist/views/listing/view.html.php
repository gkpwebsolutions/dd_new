<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

// No direct access to this file

class TestlistViewListing extends JViewLegacy
{
    // Overwriting JView display method
    function display($tpl = null)
    {   
        $app = JFactory::getApplication();
        $db = JFactory::getDbo();

        // Get the pagination limits
        $limit = $app->getUserStateFromRequest('com_testlist.list.limit', 'limit', 200, 'int');
        $limitstart = $app->getUserStateFromRequest('com_testlist.list.limitstart', 'limitstart', 0, 'int');

        // Build the query with pagination
        $query = $db->getQuery(true);
        $query->select("*")
              ->from('w1h54_test')
              ->setLimit($limit, $limitstart);

        $db->setQuery($query);
        $this->allItems = $db->loadObjectList();

        // Get total number of records for pagination
        $queryTotal = $db->getQuery(true);
        $queryTotal->select('COUNT(*)')
                   ->from('w1h54_test');
        $db->setQuery($queryTotal);
        $total = $db->loadResult();

        // Create the pagination object
        $pagination = new JPagination($total, $limitstart, $limit);
        $this->pagination = $pagination;

        // Display the view
        parent::display($tpl);
    }
}

