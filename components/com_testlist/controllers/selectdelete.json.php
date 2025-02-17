<?php 

// No direct access
defined('_JEXEC') or die;


class TestlistControllerSelectdelete extends TestlistController {

    public function selectItems(){

      

        $db = JFactory::getDbo();
        
        $input = JFactory::getApplication()->input;
        $ids = $input->get('id',array(),'array()');

        
        

        $query = $db->getQuery(true);

        if (!empty($ids)) {

            $query
                ->delete('w1h54_test')
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