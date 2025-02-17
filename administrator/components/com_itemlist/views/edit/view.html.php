<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

class ItemlistViewEdit extends JViewLegacy
{
    
    function display($tpl = null)
    {   
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;

        $id  = $input->get('id');
        

        $query = $db->getQuery(true);
        $query
            ->select("*")
            ->from('w1h54_healthpackages')
            ->where('id ='.$id);
        $db->setQuery($query);
        $this->editItem = $db->loadObject();

        
        parent::display($tpl);

    }

}
                        