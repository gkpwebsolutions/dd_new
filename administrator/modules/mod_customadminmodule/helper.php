<?php
defined('_JEXEC') or die;

class ModCustomAdminModuleHelper
{
    public static function getData()
    {
        // Fetch data for the administrator area
        $db = JFactory::getDbo();
        
        try {
            // Building the query to fetch data
            $query = $db->getQuery(true)
                ->select($db->quoteName(array('id', 'name', 'description', 'mrp', 'offer_price', 'image_path')))  // Select columns with correct names
                ->from($db->quoteName('w1h54_healthpackages'));  // Table name without state filter

            // Execute the query and return results
            $db->setQuery($query);
            $result = $db->loadObjectList();

            if ($db->getErrorNum()) {
                // Log any database error
                JLog::add('Database Error: ' . $db->getErrorMsg(), JLog::ERROR, 'mod_customadminmodule');
                return [];
            }

            return $result;  // Return the results (array of objects)

        } catch (Exception $e) {
            // Handle exception if any error occurs
            JLog::add('Exception: ' . $e->getMessage(), JLog::ERROR, 'mod_customadminmodule');
            return [];  // Return an empty array in case of error
        }
    }
}
