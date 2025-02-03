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

        // Get the test ID from the URL
        $id = $input->getInt('id');

        // Fetch the test data from the database
        $query = $db->getQuery(true)
                    ->select('*')
                    ->from($db->quoteName('w1h54_test'))
                    ->where($db->quoteName('id') . ' = ' . $db->quote($id));
        $db->setQuery($query);

        // Assign the fetched object to $this->editItem
        $this->test = $db->loadObject(); // Use this directly to assign to the view

        // Display the view
        parent::display($tpl);
    }
}
