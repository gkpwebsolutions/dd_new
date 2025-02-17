<?php
	// No direct access
	defined('_JEXEC') or die;
?>

<div class="item_listing">

	<div class="container">
		<div class="row">
			<!-- <div class="col-md-6"> -->
				<form action="" method="post" id="itemForm">
                    <p id="message" class="w-20 text-light py-2 text-center"></p>

					<div class="form-group">
						<label for="">Item Name:</label>
						<input type="text" name="itemname" id="item" placeholder="Item name" class="form-control" >
						<span id="item1" class="text-danger"></span>
					</div>
					
					<div class="form-group">
						<label for="">Description:</label>
						<input type="text" name="desc" id="desc" placeholder="Description" class="form-control" >
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
                        <input type="text" name="mrp" id="mrp" placeholder="Maximum Retail Price" class="form-control">
                        <span id="mrp1" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="offer_price">Offer Price:</label>
                        <input type="text" name="offer_price" id="offer_price" placeholder="Offer Price" class="form-control">
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

            $('#item1').html('');
            $("#desc1").html("");
            $("#image1").html("");
            $("#mrp1").html("");
            $("#offer_price1").html("");

            // Validation of item name
			if($("#item").val() == "") {
                $('#item1').html('Please enter your item name ...!');
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
                $('#item1').html('Please enter an alphanumeric item name ...!');
                $('#item').val("");
                $('#item').focus();
                return false;
            }

            // Validation of description
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

            // Validate MRP (Maximum Retail Price)
            if($("#mrp").val() == "") {
                $("#mrp1").html("Please enter MRP...");
                $("#mrp").focus();
                return false;
            }
            if(isNaN($("#mrp").val())) {
                $("#mrp1").html("MRP must be a valid number...");
                $("#mrp").val("");
                $("#mrp").focus();
                return false;
            }

            // Validate Offer Price
            if($("#offer_price").val() == "") {
                $("#offer_price1").html("Please enter an offer price...");
                $("#offer_price").focus();
                return false;
            }
            if(isNaN($("#offer_price").val())) {
                $("#offer_price1").html("Offer price must be a valid number...");
                $("#offer_price").val("");
                $("#offer_price").focus();
                return false;
            }

            // Check if Offer Price is less than or equal to MRP
            if(parseFloat($("#offer_price").val()) > parseFloat($("#mrp").val())) {
                $("#offer_price1").html("Offer price cannot be greater than MRP...");
                $("#offer_price").val("");
                $("#offer_price").focus();
                return false;
            }

            // Validate image file
            var fileInput = $("#image")[0].files[0];
            if (fileInput) {
                var fileType = fileInput.type.split('/')[0];
                if (fileType !== 'image') {
                    $("#image1").html("Please upload a valid image file.");
                    return false;
                }
            } else {
                $("#image1").html("Please upload an image.");
                return false;
            }

            
			var Url = "<?php echo JURI::base(); ?>" + "index.php?option=com_itemlist&format=json&task=listing.saveItem";
			var fd = new FormData(this);

			$.ajax({
				type: "POST",
				url: Url,
				data: fd,
				success: function(response) {
                    if(response.status == true){
                        $('#message').text(response.message).addClass('bg-success');
                        setTimeout(() => {
                            window.location.href = "<?php echo JURI::base(); ?>" + "index.php?option=com_itemlist";
                        }, 1000);
                    } else {
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
