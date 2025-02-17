<?php

// No direct access
defined('_JEXEC') or die;


class ItemlistControllerListing extends ItemlistController {

    public function saveItem() {
        
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;

        
        $itemName = $input->getString('itemname');
        $description = $input->getString('desc');
        $mrp = $input->getFloat('mrp');  
        $offerPrice = $input->getFloat('offer_price');  
        
        
        $imagePath = '';  

        
        if ($_FILES['image']['error'] == 0) {
            
            $uploadDir = JPATH_SITE . '/images/itemlist/';
            $fileName = JFile::makeSafe($_FILES['image']['name']);
            $imagePath = '/images/itemlist/' . $fileName;

            
            $fileType = $_FILES['image']['type'];
            if (strpos($fileType, 'image') === false) {
                echo json_encode(array('status' => false, 'message' => 'Please upload a valid image file.'));
                return;
            }

            
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $fileName)) {
                echo json_encode(array('status' => false, 'message' => 'Error uploading the image.'));
                return;
            }
        }

        
        $insertData = (object) array(
            'name' => $itemName,
            'description' => $description,
            'image_path' => $imagePath,  
            'mrp' => $mrp,
            'offer_price' => $offerPrice 
        );

        
        $status = $db->insertObject('w1h54_healthpackages', $insertData);

        
        if ($status) {
            echo json_encode(array('status' => true, 'message' => 'Data saved successfully!'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Error occurred while saving data.'));
        }
    }
}
