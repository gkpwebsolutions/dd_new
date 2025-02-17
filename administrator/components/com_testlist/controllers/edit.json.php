<?php

// No direct access
defined('_JEXEC') or die;

// Account functionality
class TestlistControllerEdit extends TestlistController {

    public function editItem() {
       
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;

        
        $testName = $input->getString('test_name');
        $testId = $input->getString('test_id');
        $testCode = $input->getString('test_code');
        
        $image = '';

       
       
if (!empty($_FILES['image']['name'])) {
    $imagePath = '/images/testlist/' . JFile::makeSafe($_FILES['image']['name']);
    $uploadDir = JPATH_SITE . '/images/testlist/';  
    
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . basename($_FILES['image']['name']))) {
    
        $image = $imagePath;
    } else {
        echo json_encode(array('status' => false, 'message' => 'File upload failed.'));
        return;
    }
}


        

       
        $updateData = (object) array(
            'id' => $input->getInt('id'),
            'test_name' => $testName,
            'test_id' => $testId,
            'test_code' => $testCode,
            'dictionary_id' => $input->getString('dictionary_id', '', 'html'),
            'profile' => $input->getString('profile', '', 'html'),
            'test_amount' => $input->getFloat('test_amount', 0),
            'cost_of_test' => $input->getFloat('cost_of_test', 0),
            'outsource_amount' => $input->getFloat('outsource_amount', 0),
            'minimum_selling_price' => $input->getFloat('minimum_selling_price', 0),
            'revenue_cap' => $input->getFloat('revenue_cap', 0),
            'test_type' => $input->getString('test_type', '', 'html'),
            'outsource_center' => $input->getString('outsource_center', '', 'html'),
            'sample_type' => $input->getString('sample_type', '', 'html'),
            'test_category' => $input->getString('test_category', '', 'html'),
            'department_name' => $input->getString('department_name', '', 'html'),
            'accreditation' => $input->getString('accreditation', '', 'html'),
            'integration_code' => $input->getString('integration_code', '', 'html'),
            'short_text' => $input->getString('short_text', '', 'html'),
            'cap_test' => $input->getString('cap_test', '', 'html'),
            'target_tat' => $input->getString('target_tat', '', 'html'),
            'verification_status' => $input->getString('verification_status', '', 'html'),
            'test_description' => $input->getString('test_description', '', 'html'),
            'image_path' => $image,
        );

        
        try {
            $status = $db->updateObject('w1h54_test', $updateData, 'id');

            
            if ($status) {
                echo json_encode(array('status' => true, 'message' => 'Data updated successfully!'));
            } else {
                echo json_encode(array('status' => false, 'message' => 'Error occurred while updating the data.'));
            }
        } catch (Exception $e) {
            echo json_encode(array('status' => false, 'message' => 'Error: ' . $e->getMessage()));
        }
    }

}
?>
