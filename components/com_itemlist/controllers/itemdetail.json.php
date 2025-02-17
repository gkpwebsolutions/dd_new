<?php 

// No direct access
defined('_JEXEC') or die;


class ItemlistControllerItemDetail extends JControllerLegacy
{
    public function display($cachable = false, $urlparams = array())
    {
        
        $input = JFactory::getApplication()->input;
        $itemId = $input->getInt('id', 0); 

    
        if ($itemId == 0) {
            JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_itemlist&view=listing'));
        }

        
        $db = JFactory::getDbo();

        
        $query = $db->getQuery(true)
            ->select('name, offer_price, mrp, image_path, description')  
            ->from('w1h54_healthpackages')  
            ->where('id = ' . (int) $itemId);  

        
        $db->setQuery($query);
        $item = $db->loadObject();  

    
        if (!$item) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_ITEMLIST_ITEM_NOT_FOUND'), 'error');
            JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_itemlist&view=listing'));
        }

        
        $this->view = $this->getView('itemdetail', 'html');
        $this->view->assign('item', $item);  

        
        parent::display($cachable, $urlparams);
    }
}
?>
