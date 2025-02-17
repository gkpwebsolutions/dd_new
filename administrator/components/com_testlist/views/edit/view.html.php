<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class TestlistViewEdit extends JViewLegacy
{
    public function display($tpl = null)
    {   
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;

        
        $id = $input->getInt('id');

    
        $query = $db->getQuery(true)
                    ->select('*')
                    ->from($db->quoteName('w1h54_test'))
                    ->where($db->quoteName('id') . ' = ' . $db->quote($id));
        $db->setQuery($query);

    
        $this->test = $db->loadObject(); 

        
        parent::display($tpl);
    }
}
