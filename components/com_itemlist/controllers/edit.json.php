<?php 

// No direct access
defined('_JEXEC') or die;

// Account functionality
class ItemlistControllerEdit extends ItemlistController {

    public function editItem() {

        
        $db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;

        
        $image = '';

    
        if (!empty($_FILES['image']['name'])) {
            $uploadDir = JPATH_ROOT . '/images/items/'; 
            $uploadFile = $uploadDir . basename($_FILES['image']['name']); 

            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $image = basename($_FILES['image']['name']); 
            } else {
                echo json_encode(array('status' => false, 'message' => 'File upload failed.'));
                return; 
            }
        }

        
        $updateData = (object) array(
            'id' => $input->getString('id'),
            'name' => $input->getString('itemname'),
            'description' => $input->getString('desc'),
            'image_path' => $image,  
            'mrp' => $input->getString('mrp'),
            'offer_price' => $input->getString('offer_price'),
        );

        
        $status = $db->updateObject('w1h54_healthpackages', $updateData, 'id');
        
        
        if ($status) {
            echo json_encode(array('status' => true, 'message' => 'Data updated successfully!'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Error occurred while updating the data.'));
        }
    }

}
