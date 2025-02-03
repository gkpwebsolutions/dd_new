<?php
defined('_JEXEC') or die;

class ModTestHelper
{

    public static function getSliderData()
    {
        // Get the database object
        $db = JFactory::getDbo();

        // Create a query to fetch all the slider items without date filtering
        $query = $db->getQuery(true)
            ->select($db->quoteName(['test_id', 'test_name','test_code', 'dictionary_id', 'profile', 'test_amount',  'cost_of_test', 'outsource_amount', 'minimum_selling_price', 'revenue_cap' , 'test_type' , 'outsource_center',  'sample_type', 'test_category', 'department_name', 'accreditation', 'integration_code', 'short_text', 'cap_test', 'target_tat', 'verification_status', 'test_description','image_path', 'id']))  // Include 'created_at' column
            ->from($db->quoteName('w1h54_test'))
            ->setLimit(50); 

       
        $db->setQuery($query);
        return $db->loadObjectList();  
    }
}
?>

           
            
            
           
           
           
        
            
            
            
           
            