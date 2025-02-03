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
						<label for="">ItemName:</label>
						<input type="text" name="itemname" id="item" placeholder="item name" class="form-control" >
						<span id="item1" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="">Qty:</label>
						<input type="number" name="qty" id="qty" placeholder="qty" class="form-control" >
						<span id="qty1" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="">Description:</label>
						<input type="text" name="desc" id="desc" placeholder="description" class="form-control" >
						<span id="desc1" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="">Cost:</label>
						<input type="number" name="cost" id="cost" placeholder="cost" class="form-control" >
						<spa id="cost1" class="text-danger"></span>
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
            $("#qty1").html("");
            $("#desc1").html("");
            $("#cost1").html("");

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

            // Validation of qty
            if($("#qty").val() == ""){
                $("#qty1").html("Please enter your qty...!");
                $("#qty").focus();
                return false;
            }
            if($("#qty").val().match("[a-zA-Z]")){
                $("#qty1").html("Please enter a valid qty...!");
                $("#qty").val("");
                $("#qty").focus();
                return false;
            }
            if(/[!@#$%^&*~]/.test($("#qty").val())){
                $("#qty1").html("Please enter a valid qty...!");
                $("#qty").val("");
                $("#qty").focus();
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

            // Validation of cost
            if($("#cost").val() == ""){
                $("#cost1").html("Please enter your cost...!");
                $("#cost").focus();
                return false;
            }
            if(/[a-zA-Z]/.test($("#cost").val())){
                $("#cost1").html("Please enter a valid cost...!");
                $("#cost").val("");
                $("#cost").focus();
                return false;
            }
            if(/[!@#$%^&*~]/.test($("#cost").val())){
                $("#cost1").html("Please enter a valid cost...!");
                $("#cost").val("");
                $("#cost").focus();
                return false;
            }
            

			var Url = "<?php JURI::base() ?>" + "index.php?option=com_itemlist&format=json&task=listing.saveItem";
			var fd = new FormData(this);

			$.ajax({
				type: "POST",
				url: Url,
				data: fd,
				success: function(response) {

                    // console.log(response);
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
		});  
    });
</script>

