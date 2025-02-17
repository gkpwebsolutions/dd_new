<?php

// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\View\HtmlView;


class ItemlistViewItemDetail extends HtmlView {

    
    function display($tpl = null)
    {   
        
        $input = Factory::getApplication()->input;
        $itemId = $input->getInt('id', 0);  

        
        if ($itemId == 0) {
            Factory::getApplication()->enqueueMessage('Invalid item ID', 'error');
            return;
        }

        
        $db = Factory::getDbo();
        $query = $db->getQuery(true)
                    ->select('name, offer_price, mrp, image_path, description') 
                    ->from('#_healthpackages')  
                    ->where('id = ' . (int) $itemId); 
        $db->setQuery($query);
        $item = $db->loadObject();  

        if (!$item) {
            
            Factory::getApplication()->enqueueMessage('Item not found', 'error');
            return;
        }

        
        $this->item = $item;

    
        parent::display($tpl);
    }
}
?>
