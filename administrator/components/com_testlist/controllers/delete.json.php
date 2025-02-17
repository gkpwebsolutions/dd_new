<?php 

// No direct access
defined('_JEXEC') or die;

// Account functionality


class TestistControllerDelete extends TestlistController {

    public function deleteItem(){

      $input = JFactory::getApplication()->input;
      $db = JFactory::getDbo();

      $del_id = $input->getInt('delid', 0);

      if($del_id === 0){
        echo 'Invalid ID'; die;
      }

      $query = $db->getQuery(true);

      $query
          ->delete("w1h54_testt")
          ->where('id = '. $db->quote($del_id) );
      $db->setQuery($query);
      $status = $db->execute();

      if($status){
        echo json_encode(array('status' => $status, 'message' => 'Data Deleted successfully...!'));
      }else{
          echo json_encode(array('status' => $status, 'message' => 'Error Occoured!'));
      }

      
      
    }
}