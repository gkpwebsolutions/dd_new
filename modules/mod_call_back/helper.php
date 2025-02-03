<?php
defined('_JEXEC') or die;

class ModCallHelper
{
    // Fetch slider data from the database
    public static function getSliderData()
    {
        // Get the database object
        $db = JFactory::getDbo();

        // Create a query to fetch all the slider items without date filtering
        $query = $db->getQuery(true)
            ->select($db->quoteName(['id', 'name', 'mobile', 'location', 'created_at']))  // Include 'created_at' column
            ->from($db->quoteName('w1h54_callback'));

        // Execute the query and return the results
        $db->setQuery($query);
        return $db->loadObjectList();  // This returns an array of objects (slider items)
    }
}
?>