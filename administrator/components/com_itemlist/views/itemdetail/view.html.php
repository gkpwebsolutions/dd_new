// components/com_itemlist/views/itemdetail/view.html.php

<?php
// No direct access
defined('_JEXEC') or die('Restricted access');



// Import the base controller
jimport('joomla.application.component.controller');

class ItemlistControllerItemdetail extends JControllerLegacy
{
    public function display($cachable = false, $urlparams = array())
    {
        // Get the input (ID of the item)
        $input = JFactory::getApplication()->input;
        $itemId = $input->getInt('id', 0); // Fetch the 'id' parameter from the URL (default 0)

        // If no itemId is provided, redirect to the listing page
        if ($itemId == 0) {
            JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_itemlist&view=listing'));
        }

        $db = JFactory::getDbo();

    
        $query = $db->getQuery(true);
        $query->select('*')
              ->from('#__healthpackages') // Change this to your actual table name
              ->where('id = ' . (int) $itemId);

        
        $db->setQuery($query);
        $item = $db->loadObject();  // Fetch the item

        // If no item found, show an error message and redirect to the listing page
        if (!$item) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_ITEMLIST_ITEM_NOT_FOUND'), 'error');
            JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_itemlist&view=listing'));
        }

        // Now assign the item data to the view
        $this->view = $this->getView('itemdetail', 'html');
        $this->view->assign('item', $item);  // Assign the item to the view

        // Display the view
        parent::display($cachable, $urlparams);
    }
}
