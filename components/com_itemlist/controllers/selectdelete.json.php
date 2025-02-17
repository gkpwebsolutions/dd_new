<?php 

// No direct access
defined('_JEXEC') or die;

// Account functionality
class ItemlistControllerSelectdelete extends ItemlistController {

    public function selectItems(){

        

        $db = JFactory::getDbo();
        
        $input = JFactory::getApplication()->input;
        $ids = $input->get('id',array(),'array()');

        

        $query = $db->getQuery(true);

        if (!empty($ids)) {

            $query
                ->delete('w1h54_healthpackages')
                ->where('id IN (' . $ids . ')');
            $db->setQuery($query);

            

            $status = $db->execute();

            if ($status) {
                echo json_encode(array('status'=>$status,'message'=>'selected data deleted sucessfully.'));
            }else{
                echo json_encode(array('status'=>$status,'message'=>'Error Occured.'));
            }
        }

    }

}