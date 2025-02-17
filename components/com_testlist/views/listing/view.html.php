<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');


jimport('joomla.application.component.view');

class TestlistViewListing extends JViewLegacy
{
    function display($tpl = null)
    {
        $app = JFactory::getApplication();
        $db = JFactory::getDbo();

        // Get the search term, pagination limits, and limitstart
        $search = $app->getUserStateFromRequest('com_testlist.list.search', 'search', '', 'string');
        $limit = $app->getUserStateFromRequest('com_testlist.list.limit', 'limit', 200, 'int');
        $limitstart = $app->getUserStateFromRequest('com_testlist.list.limitstart', 'limitstart', 0, 'int');

        
        $query = $db->getQuery(true);
        $query->select("*")
              ->from('w1h54_test')
              ->setLimit($limit, $limitstart);

        
        if (!empty($search)) {
            $query->where('test_name LIKE ' . $db->quote('%' . $search . '%'));
        }

        $db->setQuery($query);
        $this->allItems = $db->loadObjectList();

        
        $queryTotal = $db->getQuery(true);
        $queryTotal->select('COUNT(*)')
                   ->from('w1h54_test');

        
        if (!empty($search)) {
            $queryTotal->where('test_name LIKE ' . $db->quote('%' . $search . '%'));
        }

        $db->setQuery($queryTotal);
        $total = $db->loadResult();

        
        $pagination = new JPagination($total, $limitstart, $limit);
        $this->pagination = $pagination;

        
        $this->search = $search;

       
        $paginationLinks = $this->pagination->getPagesLinks();
        if (!empty($this->search)) {
            $paginationLinks = preg_replace_callback('/href="(index\.php\?[^"]+)"/', function($matches) {
                $url = $matches[1];

                
                if (strpos($url, 'search=') === false) {
                    $url .= '&search=' . urlencode($this->search);
                } else {
                    $url = preg_replace('/search=[^&]+/', 'search=' . urlencode($this->search), $url);
                }

                
                if (strpos($url, 'limitstart=') === false) {
                    $url .= '&limitstart=' . urlencode($this->pagination->limitstart);
                }

                return 'href="' . $url . '"';
            }, $paginationLinks);
        }

        $this->paginationLinks = $paginationLinks;

       
        parent::display($tpl);
    }
}

?>
