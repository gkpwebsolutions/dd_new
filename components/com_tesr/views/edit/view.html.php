<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

class ItemlistViewEdit extends JViewLegacy
{
    // Overwriting JView display method
    function display($tpl = null)
    {   
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;

        $id  = $input->get('id');
        // echo $id;die;

        $query = $db->getQuery(true);
        $query
            ->select("*")
            ->from('#__itemlist')
            ->where('id ='.$id);
        $db->setQuery($query);
        $this->editItem = $db->loadObject();

        // Display the view
        parent::display($tpl);

    }

}
                        