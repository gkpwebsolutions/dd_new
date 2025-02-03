<?php
// No direct access
defined('_JEXEC') or die;
?>


<form id="testAddForm" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="test_name">Test Name:</label>
        <input type="text" name="test_name" id="test_name" placeholder="Enter Test Name" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_id">Test ID:</label>
        <input type="text" name="test_id" id="test_id" placeholder="Enter Test ID" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_code">Test Code:</label>
        <input type="text" name="test_code" id="test_code" placeholder="Enter Test Code" class="form-control" >
    </div>

    <div class="form-group">
        <label for="dictionary_id">Dictionary ID:</label>
        <input type="text" name="dictionary_id" id="dictionary_id" placeholder="Enter Dictionary ID" class="form-control" >
    </div>

    <div class="form-group">
        <label for="profile">Profile:</label>
        <input type="text" name="profile" id="profile" placeholder="Enter Profile" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_amount">Test Amount:</label>
        <input type="text" name="test_amount" id="test_amount" placeholder="Enter Test Amount" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cost_of_test">Cost of Test:</label>
        <input type="text" name="cost_of_test" id="cost_of_test" placeholder="Enter Cost of Test" class="form-control" >
    </div>

    <div class="form-group">
        <label for="outsource_amount">Outsource Amount:</label>
        <input type="text" name="outsource_amount" id="outsource_amount" placeholder="Enter Outsource Amount" class="form-control" >
    </div>

    <div class="form-group">
        <label for="minimum_selling_price">Minimum Selling Price:</label>
        <input type="text" name="minimum_selling_price" id="minimum_selling_price" placeholder="Enter Minimum Selling Price" class="form-control" >
    </div>

    <div class="form-group">
        <label for="revenue_cap">Revenue Cap:</label>
        <input type="text" name="revenue_cap" id="revenue_cap" placeholder="Enter Revenue Cap" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_type">Test Type:</label>
        <input type="text" name="test_type" id="test_type" placeholder="Enter Test Type" class="form-control" >
    </div>

    <div class="form-group">
        <label for="outsource_center">Outsource Center:</label>
        <input type="text" name="outsource_center" id="outsource_center" placeholder="Enter Outsource Center" class="form-control" >
    </div>

    <div class="form-group">
        <label for="sample_type">Sample Type:</label>
        <input type="text" name="sample_type" id="sample_type" placeholder="Enter Sample Type" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_category">Test Category:</label>
        <input type="text" name="test_category" id="test_category" placeholder="Enter Test Category" class="form-control" >
    </div>

    <div class="form-group">
        <label for="department_name">Department Name:</label>
        <input type="text" name="department_name" id="department_name" placeholder="Enter Department Name" class="form-control" >
    </div>

    <div class="form-group">
        <label for="accreditation">Accreditation:</label>
        <input type="text" name="accreditation" id="accreditation" placeholder="Enter Accreditation" class="form-control" >
    </div>

    <div class="form-group">
        <label for="integration_code">Integration Code:</label>
        <input type="text" name="integration_code" id="integration_code" placeholder="Enter Integration Code" class="form-control" >
    </div>

    <div class="form-group">
        <label for="short_text">Short Text:</label>
        <input type="text" name="short_text" id="short_text" placeholder="Enter Short Text" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cap_test">Cap Test:</label>
        <input type="text" name="cap_test" id="cap_test" placeholder="Enter Cap Test" class="form-control" >
    </div>

    <div class="form-group">
        <label for="target_tat">Target TAT:</label>
        <input type="text" name="target_tat" id="target_tat" placeholder="Enter Target TAT" class="form-control" >
    </div>

    <div class="form-group">
        <label for="verification_status">Verification Status:</label>
        <input type="text" name="verification_status" id="verification_status" placeholder="Enter Verification Status" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_description">Test Description:</label>
        <input type="text" name="test_description" id="test_description" placeholder="Enter Test Description" class="form-control" >
    </div>
    

    <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Test</button>
    </div>

    <div id="message"></div> 
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $("#testAddForm").submit(function(e) {

            e.preventDefault();  
            
            $('#message').html('');

           
            var Url = "<?php echo JURI::base(); ?>" + "index.php?option=com_testlist&format=json&task=listing.saveItem";
            var fd = new FormData(this);

            
            $.ajax({
                type: "POST",
                url: Url,
                data: fd,
                success: function(response) {
                    if(response.status == true) {
                        
                        $('#message').text(response.message).addClass('bg-success').removeClass('bg-danger');
                        setTimeout(function() {
                            window.location.href = "<?php echo JURI::base(); ?>" + "index.php?option=com_testlist"; // Redirect after 1 second
                        }, 1000);
                    } else {
                
                        $('#message').text(response.message).addClass('bg-danger').removeClass('bg-success');
                    }
                }, 
                cache: false,
                contentType: false,
                processData: false
            });
        });  

    });
</script>
