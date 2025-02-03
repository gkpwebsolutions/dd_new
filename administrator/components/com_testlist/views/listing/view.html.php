<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

// No direct access to this file

class TestlistViewListing extends JViewLegacy
{
    function display($tpl = null)
    {   
        $app = JFactory::getApplication();
        $db = JFactory::getDbo();

        
        $limit = $app->getUserStateFromRequest('com_testlist.list.limit', 'limit', 200, 'int');
        $limitstart = $app->getUserStateFromRequest('com_testlist.list.limitstart', 'limitstart', 0, 'int');

       
        $query = $db->getQuery(true);
        $query->select("*")
              ->from('w1h54_test')
              ->setLimit($limit, $limitstart);

        $db->setQuery($query);
        $this->allItems = $db->loadObjectList();

        $queryTotal = $db->getQuery(true);
        $queryTotal->select('COUNT(*)')
                   ->from('w1h54_test');
        $db->setQuery($queryTotal);
        $total = $db->loadResult();

        
        $pagination = new JPagination($total, $limitstart, $limit);
        $this->pagination = $pagination;

        
        if ($app->input->get('format') == 'json') {
            
            echo $this->loadTemplate('listing'); 
            return;
        }


        parent::display($tpl);
    }
}
