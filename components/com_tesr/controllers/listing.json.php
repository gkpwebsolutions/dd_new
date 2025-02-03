<?php 

// No direct access
defined('_JEXEC') or die;

// Account functionality
class ItemlistControllerListing extends ItemlistController {

    public function saveItem(){

		$db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;

        $insertData =  (object) array(
            'item_name'    => $input->getString('itemname'),
            'qty'         => $input->getString('qty'),
            'description' => $input->getString('desc'),
            'cost'        => $input->getString('cost'),
        );
        
        $status = $db->insertObject('#__itemlist', $insertData);

        if($status){
            echo json_encode(array('status' => $status, 'message' => 'Data saved successfully...!'));
        }else{
            echo json_encode(array('status' => $status, 'message' => 'Error Occoured!'));
        }
		
        // $updateData = (object) array(
        //     'id' => '4',
        //     'item_name'  => 'Vivek',
        //     'qty' => $input->getString('qty'),
        //     'description' => $input->getString('desc'),
        //     'cost' => $input->getString('cost'),
        // );

        // $status = $db->updateObject('#__itemlist', $updateData, 'id');


     

		// var_dump( $status); die;

		// Load the model
        // $model = $this->getModel('Example', 'ExampleModel');

        // Call the save method in the model
        // $model->save($data);

        // Redirect to the list view
        // $this->setRedirect(JRoute::_('index.php?option=com_example&view=examples', false));

		// print_r($_POST);die;
		
		// echo "itemname : " . $_POST['itemname'] .'|'."qty : " . $_POST['qty'] .'|'. "desc : " . $_POST['desc'] .'|' . "cost : " . $_POST['cost'] ;die;
	}

}