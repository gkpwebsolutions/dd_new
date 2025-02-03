<?php
defined('_JEXEC') or die;

class ModCustomSliderHelper
{
    // Fetch slider data from the database
    public static function getSliderData()
    {
        // Get the database object
        $db = JFactory::getDbo();

        // Create a query to fetch all the slider items without date filtering
        $query = $db->getQuery(true)
            ->select($db->quoteName(['id', 'name', 'description', 'mrp', 'offer_price', 'image_path', 'created_at']))  // Include 'created_at' column
            ->from($db->quoteName('w1h54_healthpackages'));

        // Execute the query and return the results
        $db->setQuery($query);
        return $db->loadObjectList();  // This returns an array of objects (slider items)
    }
}
