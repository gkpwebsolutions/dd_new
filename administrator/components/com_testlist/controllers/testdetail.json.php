<?php 

// No direct access
defined('_JEXEC') or die;

// No direct access


class TestlistControllerTestdetail extends JControllerLegacy
{
    public function display($cachable = false, $urlparams = array())
    {
        // Get the input (ID of the item)
        $input = JFactory::getApplication()->input;
        $itemId = $input->getInt('id', 0); // Fetch the 'id' parameter from the URL (default 0)

        // If no itemId is provided, redirect to the listing page
        if ($itemId == 0) {
            JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_testlist&view=listing'));
        }

        // Get the database object
        $db = JFactory::getDbo();

        // Build the query to fetch the item by ID
        $query = $db->getQuery(true);
        $query->select('*')
              ->from('w1h54_test') // Change this to your actual table name
              ->where('id = ' . (int) $itemId);

        // Set the query and load the result
        $db->setQuery($query);
        $item = $db->loadObject();  // Fetch the item

        // If no item found, show an error message and redirect to the listing page
        if (!$item) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_TESTLIST_ITEM_NOT_FOUND'), 'error');
            JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_testlist&view=listing'));
        }

        // Now assign the item data to the view
        $this->view = $this->getView('testdetail', 'html');
        $this->view->assign('item', $item);  // Assign the item to the view

        // Display the view
        parent::display($cachable, $urlparams);
    }
}
