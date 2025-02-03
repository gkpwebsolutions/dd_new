<?php

// No direct access
defined('_JEXEC') or die;

// Account functionality
class ItemlistControllerListing extends ItemlistController {

    public function saveItem() {
        // Get the database object
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;

        // Get form data
        $itemName = $input->getString('itemname');
        $description = $input->getString('desc');
        $mrp = $input->getFloat('mrp');  
        $offerPrice = $input->getFloat('offer_price');  
        
        
        $imagePath = '';  

        
        if ($_FILES['image']['error'] == 0) {
            // Define the upload directory and file name
            $uploadDir = JPATH_SITE . '/images/itemlist/';
            $fileName = JFile::makeSafe($_FILES['image']['name']);
            $imagePath = '/images/itemlist/' . $fileName;

            
            $fileType = $_FILES['image']['type'];
            if (strpos($fileType, 'image') === false) {
                echo json_encode(array('status' => false, 'message' => 'Please upload a valid image file.'));
                return;
            }

            // Move the uploaded file to the target directory
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $fileName)) {
                echo json_encode(array('status' => false, 'message' => 'Error uploading the image.'));
                return;
            }
        }

        // Prepare the data to be inserted into the database
        $insertData = (object) array(
            'name' => $itemName,
            'description' => $description,
            'image_path' => $imagePath,  // Store the image path in the database
            'mrp' => $mrp,
            'offer_price' => $offerPrice 
        );

        // Insert data into the database
        $status = $db->insertObject('w1h54_healthpackages', $insertData);

        // Return response based on success or failure
        if ($status) {
            echo json_encode(array('status' => true, 'message' => 'Data saved successfully!'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Error occurred while saving data.'));
        }
    }
}
