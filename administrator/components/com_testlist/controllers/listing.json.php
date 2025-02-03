<?php

// No direct access
defined('_JEXEC') or die;

// Controller for listing and saving data for the "test" table
class TestlistControllerListing extends JControllerForm {

    
    public function saveItem() {
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;
        $srNo = $input->getString('sr_no');
        $testName = $input->getString('test_name');
        $testId = $input->getString('test_id');
        $testCode = $input->getString('test_code');
        $dictionaryId = $input->getString('dictionary_id');
        $profile = $input->getString('profile');
        $testAmount = $input->getString('test_amount');
        $costOfTest = $input->getString('cost_of_test');
        $outsourceAmount = $input->getString('outsource_amount');
        $minimumSellingPrice = $input->getString('minimum_selling_price');
        $revenueCap = $input->getString('revenue_cap');
        $testType = $input->getString('test_type');
        $outsourceCenter = $input->getString('outsource_center');
        $sampleType = $input->getString('sample_type');
        $testCategory = $input->getString('test_category');
        $departmentName = $input->getString('department_name');
        $accreditation = $input->getString('accreditation');
        $integrationCode = $input->getString('integration_code');
        $shortText = $input->getString('short_text');
        $capTest = $input->getString('cap_test');
        $targetTat = $input->getString('target_tat');
        $verificationStatus = $input->getString('verification_status');
        $testDescription = $input->getString('test_description');

    

        $imagePath = '';
if (!empty($_FILES['image']['name'])) {
    // Get a safe filename and store the image relative path
    $imagePath = '/images/testlist/' . JFile::makeSafe($_FILES['image']['name']);
    $uploadDir = JPATH_SITE . '/images/testlist/';

    // Ensure the directory exists, create it if not
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . basename($_FILES['image']['name']))) {
       
        $image = $imagePath; 
    } else {
        echo json_encode(array('status' => false, 'message' => 'File upload failed.'));
        return;
    }
}      

        $insertData = (object) array(
            'test_name' => $testName,
            'test_id' => $testId,
            'test_code' => $testCode,
            'dictionary_id' => $dictionaryId,
            'profile' => $profile,
            'test_amount' => $testAmount,
            'cost_of_test' => $costOfTest,
            'outsource_amount' => $outsourceAmount,
            'minimum_selling_price' => $minimumSellingPrice,
            'revenue_cap' => $revenueCap,
            'test_type' => $testType,
            'outsource_center' => $outsourceCenter,
            'sample_type' => $sampleType,
            'test_category' => $testCategory,
            'department_name' => $departmentName,
            'accreditation' => $accreditation,
            'integration_code' => $integrationCode,
            'short_text' => $shortText,
            'cap_test' => $capTest,
            'target_tat' => $targetTat,
            'verification_status' => $verificationStatus,
            'test_description' => $testDescription,
            'image_path' => $imagePath
        );

        $status = $db->insertObject('w1h54_test', $insertData);

        if ($status) {
            echo json_encode(array('status' => true, 'message' => 'Data saved successfully!'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Error occurred while saving data.'));
        }
    }

    public function listItems() {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
    
        
        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $limit = 10;
    
        
        $query->select('*')
              ->from($db->quoteName('w1h54_test'))
              ->setLimit($limit, $limitstart);
    
        $db->setQuery($query);
        $items = $db->loadObjectList();
    
        
        $queryTotal = $db->getQuery(true);
        $queryTotal->select('COUNT(*)')
                   ->from($db->quoteName('w1h54_test'));
        $db->setQuery($queryTotal);
        $total = $db->loadResult();
    
        
        $pagination = new JPagination($total, $limitstart, $limit);
    
        
        $this->items = $items;
        $this->pagination = $pagination; 
        parent::display(); 
    }
    
    

    public function deleteItem() {
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;
        $id = $input->getInt('delid');

        if ($id) {
            $query = $db->getQuery(true)
                        ->delete($db->quoteName('w1h54_test'))
                        ->where($db->quoteName('id') . ' = ' . (int)$id);
            $db->setQuery($query);

            if ($db->execute()) {
                echo json_encode(array('status' => true, 'message' => 'Record deleted successfully.'));
            } else {
                echo json_encode(array('status' => false, 'message' => 'Error occurred while deleting the record.'));
            }
        } else {
            echo json_encode(array('status' => false, 'message' => 'Invalid ID.'));
        }
    }

    public function selectItems() {
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;
        $ids = $input->get('id', array(), 'array');

        if (!empty($ids)) {
            $query = $db->getQuery(true)
                        ->delete($db->quoteName('w1h54_test'))
                        ->where($db->quoteName('id') . ' IN (' . implode(',', $ids) . ')');
            $db->setQuery($query);

            if ($db->execute()) {
                echo json_encode(array('status' => true, 'message' => 'Records deleted successfully.'));
            } else {
                echo json_encode(array('status' => false, 'message' => 'Error occurred while deleting records.'));
            }
        } else {
            echo json_encode(array('status' => false, 'message' => 'No records selected.'));
        }
    
}
}