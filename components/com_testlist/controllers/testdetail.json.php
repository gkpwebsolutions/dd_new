<?php 

// No direct access
defined('_JEXEC') or die;

// No direct access


class TestlistControllerItemdetail extends JControllerLegacy
{
    public function display($cachable = false, $urlparams = array())
    {
        
        $input = JFactory::getApplication()->input;
        $itemId = $input->getInt('id', 0); 

        
        if ($itemId == 0) {
            JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_testlist&view=listing'));
        }

    
        $db = JFactory::getDbo();

        
        $query = $db->getQuery(true);
        $query->select('*')
              ->from('w1h54_test') 
              ->where('id = ' . (int) $itemId);

        
        $db->setQuery($query);
        $item = $db->loadObject();  

        
        if (!$item) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_ITEMLIST_ITEM_NOT_FOUND'), 'error');
            JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_testlist&view=listing'));
        }

        
        $this->view = $this->getView('testdetail', 'html');
        $this->view->assign('item', $item);  

        
        parent::display($cachable, $urlparams);
    }
}
