<?php 

// No direct access
defined('_JEXEC') or die;

// Account functionality
class ItemlistControllerEdit extends ItemlistController {

    public function editItem(){

		$db = JFactory::getDbo();
        $input = JFactory::getApplication()->input;
        // print_r($input->get('id'));
        // die;

        $updateData =  (object) array(
            'id'          => $input->getString('id'),
            'item_name'   => $input->getString('itemname'),
            'qty'         => $input->getString('qty'),
            'description' => $input->getString('desc'),
            'cost'        => $input->getString('cost'),
        );

        // print_r($updateData);die;
        
        $status = $db->updateObject('#__itemlist', $updateData, 'id');

        if($status){
            echo json_encode(array('status' => $status, 'message' => 'Data Updated successfully...!'));
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