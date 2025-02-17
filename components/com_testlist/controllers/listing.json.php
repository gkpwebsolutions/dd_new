<?php

// No direct access
defined('_JEXEC') or die;


class TestlistControllerListi extends JControllerForm {

    
    public function saveItem() {
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;

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
            $imagePath = 'images/itemlist/' . JFile::makeSafe($_FILES['image']['name']);
            $uploadDir = JPATH_SITE . '/images/itemlist/';

            if (JFile::exists($uploadDir . $imagePath)) {
                echo json_encode(array('status' => false, 'message' => 'File already exists.'));
                return;
            }

            if (JFile::upload($_FILES['image']['tmp_name'], $uploadDir . $imagePath)) {
                
            } else {
                echo json_encode(array('status' => false, 'message' => 'Error uploading the image.'));
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
       
$search = JFactory::getApplication()->input->getString('search', '');


$query = $db->getQuery(true);
$query->select('*')
      ->from($db->quoteName('w1h54_test'))
      ->setLimit($limit, $limitstart);


if (!empty($search)) {
    $query->where('test_name LIKE ' . $db->quote('%' . $search . '%'));
}

$db->setQuery($query);
$this->allItems = $db->loadObjectList();



$queryTotal = $db->getQuery(true);
$queryTotal->select('COUNT(*)')
           ->from('w1h54_test');


if (!empty($search)) {
    $queryTotal->where('test_name LIKE ' . $db->quote('%' . $search . '%'));
}

$db->setQuery($queryTotal);
$total = $db->loadResult();


$pagination = new JPagination($total, $limitstart, $limit);
$this->pagination = $pagination;


        
        $this->items = $items;
        $this->pagination = $pagination;
        $this->limitstart = $limitstart;
        $this->limit = $limit;
        $this->search = $search; 

       
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

?>
