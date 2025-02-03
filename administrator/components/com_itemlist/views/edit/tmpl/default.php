<?php
	// No direct access
	defined('_JEXEC') or die;
   
?>



<div class="item_listing">

	<div class="container">
		<div class="row">
			
				<form action="" method="post" id="itemForm">

                <p id="message" class="w-20 text-light py-2 text-center"></p>

					<div class="form-group">
						<label for="">Item Name:</label>
						<input type="text" name="itemname" value="<?= $this->editItem->name ?>" id="item" placeholder="Item name" class="form-control" >
						<span id="item1" class="text-danger"></span>
					</div>
					
					<div class="form-group">
						<label for="">Description:</label>
						<input type="text" name="desc" id="desc" value="<?= $this->editItem->description ?>" placeholder="Description" class="form-control" >
						<span id="desc1" class="text-danger"></span>
					</div>

                    <div class="form-group">
                        <label for="image">Upload Image:</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <span id="image1" class="text-danger"></span>
                    </div>

                    <!-- New Fields for MRP and Offer Price -->
                    <div class="form-group">
                        <label for="mrp">MRP:</label>
                        <input type="text" name="mrp" id="mrp" value="<?= $this->editItem->mrp ?>" placeholder="Maximum Retail Price" class="form-control">
                        <span id="mrp1" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="offer_price">Offer Price:</label>
                        <input type="text" name="offer_price" id="offer_price" value="<?= $this->editItem->offer_price ?>" placeholder="Offer Price" class="form-control">
                        <span id="offer_price1" class="text-danger"></span>
                    </div>
					
					<div class="form-group">
						<button class="btn btn-primary" >Submit</button>
					</div>
				</form>
			<!-- </div> -->
		</div>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){  
		
		$("#itemForm").submit(function(e) {

			e.preventDefault();

			if($("#item").val() == "") {
                $('#item1').html('Please enter your itemname ...!');
                $('#item').focus();
                return false;
            }
            if($('#item').val().length < 3){
                $('#item1').html('Please enter at least 3 characters ...!');
                $('#item').val("");
                $('#item').focus();
                return false;
            }
            if(/^\d+$/.test($('#item').val())){
                $('#item1').html('Please enter an alphanumeric itemname ...!');
                $('#item').val("");
                $('#item').focus();
                return false;
            } 

           

            // Validation of desc
            if($("#desc").val() == ""){
                $("#desc1").html("Please enter your description...!");
                $("#desc").focus();
                return false;
            }
            if(/^\d+$/.test($("#desc").val())){
                $("#desc1").html("Please enter an alphanumeric description...!");
                $("#desc").val("");
                $("#desc").focus();
                return false;
            }

            

			// console.log('testing')
			var Url = "<?php JURI::base() ?>" + "index.php?option=com_itemlist&format=json&task=edit.editItem";
			var fd = new FormData(this);
            fd.append('id', '<?php echo $this->editItem->id; ?>');
            

			$.ajax({
				type: "POST",
				url: Url,
				data: fd,
				success: function(response) {

                    // console.log(response);

					if(response.status === true){
                        $('#message').text(response.message).addClass('bg-primary');
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
		});  
    });
</script>

