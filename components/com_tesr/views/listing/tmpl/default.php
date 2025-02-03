<?php
	// No direct access
	defined('_JEXEC') or die;



//    echo "<pre>";
//    print_r($this->allItems);
//    echo "</pre>";

?>

<div>
   
    <table class=" table table-bordered table-striped text-center">
    <h2 class="text-center bg-danger text-white ">Itemlist</h2>
    <p id="message" class="w-30 text-light p-2"></p>
    <a href="http://joomla-5.localhost/administrator/index.php?option=com_itemlist&view=add" class="btn btn-primary mb-2  mt-4 btn-sm">Add Item</a>
    <button id="selectdelete" class="btn btn-primary mb-2  mt-4  m-4 btn-sm">Select Delete</button>
        <thead class="thead-">
        <tr>
            <th><input type="checkbox" id="selectAll">Select All</th>
            <th>Sr.No</th>
            <th>ItemName</th>
            <th>Qty</th>
            <th>Description</th>
            <th>Cost</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php if(!empty($this->allItems)):?>
        <?php foreach ($this->allItems as $item) :?>
            <tr>
                <td><input type="checkbox" name="inputItem[]" id="<?= $item->id ?>"></td>
                <td> <?= $item->id ?> </td>
                <td> <?= $item->item_name ?> </td>
                <td> <?= $item->qty ?> kg </td>
                <td> <?= $item->description ?></td>
                <td> <?= $item->cost ?></td>
                <td><a  href="<?php echo JURI::base()?>index.php?option=com_itemlist&view=edit&id=<?= $item->id ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a class="deleteBtn" href="<?php echo JURI::base()?>index.php?option=com_itemlist&format=json&task=delete.deleteItem&delid=<?= $item->id ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
        <?php  endforeach ?>    
        <?php else:  ?> 
            <tr>
                <td colspan="7" style="color:red">Record Not Found</td>
            </tr>
            
        <?php endif; ?>    
        
    </tbody>
    
    </table>
</div>

	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){  
		
		$(".deleteBtn").click(function(e) {

			e.preventDefault();

            if(confirm('Are you sure delete this item ?')){
             
                let Url = this.href;
       
                $.ajax({
                    type: "POST",
                    url: Url,
                    data: {},
                    success: function(response) {
                        if(response.status== true){
                            $('#message').text(response.message).addClass('bg-success');
                            setTimeout(() => {
                                window.location.href = "<?php JURI::base() ?>" + "index.php?option=com_itemlist";
                            }, 1000);
                        }else{
                            $('#message').text(response.message).addClass('bg-danger');
                        }
    
                    }, 
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
		});  



        //Handle "Select All" checkbox
       
       $('#selectAll').click(function() {
            // var isChecked = $(this).is(':checked');  // Check if "Select All" is checked
            $('input[name="inputItem[]"]').prop('checked', this.checked);
    
        });


    $('#selectdelete').click(function() {

        
        let selectedItems = $('input[name="inputItem[]"]:checked').map(function() {
            // return this.val;
            return $(this).attr('id');
        }).get();

        console.log(selectedItems);

        // let id = JSON.stringify(selectedItems);


        if (selectedItems.length === 0) {
            alert('No items selected');
            return;
        }

        if (confirm('Are you sure you want to delete the selected items?')) {

            $.ajax({
                type: "POST",
                url: "<?php echo JURI::base()?>index.php?option=com_itemlist&format=json&task=selectdelete.selectItems&id=" + selectedItems,
                data: {},
                success: function(response) {

                    // console.log(response);

                    if (response.status === true) {
                        $('#message').text(response.message).addClass('bg-success');
                        setTimeout(() => {
                            window.location.href = "<?php echo JURI::base()?>index.php?option=com_itemlist";
                        }, 1000);
                    } else {
                        $('#message').text(response.message).addClass('bg-danger');
                    }
                },
                cache: false,
				contentType: false,
				processData: false
            });
        
    };
});



		// $("#updatebtn").click(function(e) {

		// 	e.preventDefault();

        //     let data  =  new FormData(this);
        //     console.log(data);
             
        //         // let Url = this.href;
       
        //         // $.ajax({
        //         //     type: "POST",
        //         //     url: Url,
        //         //     data: {},
        //         //     success: function(response) {
        //         //         if(response.status== true){
        //         //             $('#message').text(response.message).addClass('bg-success');
        //         //             setTimeout(() => {
        //         //                 window.location.href = "<?php //JURI::base() ?>" + "index.php?option=com_itemlist";
        //         //             }, 1000);
        //         //         }else{
        //         //             $('#message').text(response.message).addClass('bg-danger');
        //         //         }
    
        //         //     }, 
        //         //     cache: false,
        //         //     contentType: false,
        //         //     processData: false
        //          // });
        //  });
});  
    
</script>




