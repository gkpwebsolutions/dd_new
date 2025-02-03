<?php
// No direct access
defined('_JEXEC') or die;
?>

<form id="testEditForm" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="test_name">Test Name:</label>
        <input type="text" name="test_name" id="test_name" value="<?= htmlspecialchars($this->test->test_name ?? '', ENT_QUOTES); ?>" placeholder="Enter Test Name" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_id">Test ID:</label>
        <input type="text" name="test_id" id="test_id" value="<?= htmlspecialchars($this->test->test_id ?? '', ENT_QUOTES); ?>" placeholder="Enter Test ID" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_code">Test Code:</label>
        <input type="text" name="test_code" id="test_code" value="<?= htmlspecialchars($this->test->test_code ?? '', ENT_QUOTES); ?>" placeholder="Enter Test Code" class="form-control" >
    </div>

    <div class="form-group">
        <label for="dictionary_id">Dictionary ID:</label>
        <input type="text" name="dictionary_id" id="dictionary_id" value="<?= htmlspecialchars($this->test->dictionary_id ?? '', ENT_QUOTES); ?>" placeholder="Enter Dictionary ID" class="form-control" >
    </div>

    <div class="form-group">
        <label for="profile">Profile:</label>
        <input type="text" name="profile" id="profile" value="<?= htmlspecialchars($this->test-> profile ?? '', ENT_QUOTES); ?>" placeholder="Enter Profile" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_amount">Test Amount:</label>
        <input type="text" name="test_amount" id="test_amount" value="<?= htmlspecialchars($this->test-> test_amount ?? '', ENT_QUOTES); ?>" placeholder="Enter Test Amount" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cost_of_test">Cost of Test:</label>
        <input type="text" name="cost_of_test" id="cost_of_test" value="<?= htmlspecialchars($this->test-> cost_of_test ?? '', ENT_QUOTES); ?>" placeholder="Enter Cost of Test" class="form-control" >
    </div>

    <div class="form-group">
        <label for="outsource_amount">Outsource Amount:</label>
        <input type="text" name="outsource_amount" id="outsource_amount" value="<?= htmlspecialchars($this->test-> outsource_amount ?? '', ENT_QUOTES); ?>" placeholder="Enter Outsource Amount" class="form-control" >
    </div>

    <div class="form-group">
        <label for="minimum_selling_price">Minimum Selling Price:</label>
        <input type="text" name="minimum_selling_price" id="minimum_selling_price" value="<?= htmlspecialchars($this->test-> minimum_selling_price ?? '', ENT_QUOTES); ?>" placeholder="Enter Minimum Selling Price" class="form-control" >
    </div>

    <div class="form-group">
        <label for="revenue_cap">Revenue Cap:</label>
        <input type="text" name="revenue_cap" id="revenue_cap" value="<?= htmlspecialchars($this->test-> revenue_cap ?? '', ENT_QUOTES); ?>" placeholder="Enter Revenue Cap" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_type">Test Type	:</label>
        <input type="text" name="test_type" id="test_type" value="<?= htmlspecialchars($this->test-> test_type ?? '', ENT_QUOTES); ?>" placeholder="Enter Test Type" class="form-control" >
    </div>

    <div class="form-group">
        <label for="outsource_center">Outsource Center:</label>
        <input type="text" name="outsource_center" id="outsource_center" value="<?= htmlspecialchars($this->test-> outsource_center ?? '', ENT_QUOTES); ?>" placeholder="Enter Outsource Center" class="form-control" >
    </div>

    <div class="form-group">
        <label for="sample_type">Sample Type:</label>
        <input type="text" name="sample_type" id="sample_type" value="<?= htmlspecialchars($this->test-> sample_type ?? '', ENT_QUOTES); ?>" placeholder="Enter Sample Type" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_category">Test Category:</label>
        <input type="text" name="test_category" id="test_category" value="<?= htmlspecialchars($this->test-> test_category ?? '', ENT_QUOTES); ?>" placeholder="Enter Test Category" class="form-control" >
    </div>

    <div class="form-group">
        <label for="department_name">Department Name:</label>
        <input type="text" name="department_name" id="department_name" value="<?= htmlspecialchars($this->test-> department_name ?? '', ENT_QUOTES); ?>" placeholder="Enter Department Name" class="form-control" >
    </div>

    <div class="form-group">
        <label for="accreditation">Accreditation:</label>
        <input type="text" name="accreditation" id="accreditation" value="<?= htmlspecialchars($this->test-> accreditation ?? '', ENT_QUOTES); ?>" placeholder="Enter Accreditation" class="form-control" >
    </div>

    <div class="form-group">
        <label for="integration_code">Integration Code:</label>
        <input type="text" name="integration_code" id="integration_code" value="<?= htmlspecialchars($this->test-> integration_code ?? '', ENT_QUOTES); ?>" placeholder="Enter Integration Code" class="form-control" >
    </div>

    <div class="form-group">
        <label for="short_text">Short Text:</label>
        <input type="text" name="short_text" id="short_text" value="<?= htmlspecialchars($this->test-> short_text ?? '', ENT_QUOTES); ?>" placeholder="Enter Short Text" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cap_test">Cap Test:</label>
        <input type="text" name="cap_test" id="cap_test" value="<?= htmlspecialchars($this->test-> cap_test ?? '', ENT_QUOTES); ?>" placeholder="Enter Cap Test" class="form-control" >
    </div>

    <div class="form-group">
        <label for="target_tat">Target TAT:</label>
        <input type="text" name="target_tat" id="target_tat" value="<?= htmlspecialchars($this->test-> target_tat ?? '', ENT_QUOTES); ?>" placeholder="Enter Target TAT" class="form-control" >
    </div>

    <div class="form-group">
        <label for="verification_status">Verification Status:</label>
        <input type="text" name="verification_status" id="verification_status" value="<?= htmlspecialchars($this->test-> verification_status ?? '', ENT_QUOTES); ?>" placeholder="Enter Verification Status" class="form-control" >
    </div>

    <div class="form-group">
        <label for="test_description">Test Description:</label>
        <input type="text" name="test_description" id="test_description" value="<?= htmlspecialchars($this->test-> test_description ?? '', ENT_QUOTES); ?>" placeholder="Enter Test Description" class="form-control" >
    </div>

    <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" class="form-control">
        
        <?php if (!empty($this->test->image_path)): ?>
            <div class="current-image mt-2">
                <p><strong>Current Image:</strong></p>
                
                <img src="<?= JURI::base() . $this->test->image_path ; ?>" style="max-width: 100%; height: auto; border: 1px solid #ccc;">
            </div>
        <?php else: ?>
            <p>No current image available.</p>  
        <?php endif; ?>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Test</button>
    </div>

    <input type="hidden" name="id" value="<?= $this->test->id; ?>">
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#testEditForm").submit(function(e) {
        e.preventDefault();  

        var url = "<?php echo JURI::base(); ?>" + "index.php?option=com_testlist&format=json&task=edit.editItem";
        
        var fd = new FormData(this);  
        $.ajax({
            type: "POST",
            url: url,  
            data: fd,
            success: function(response) {
                if (response.status === true) {
                    alert(response.message);
                    window.location.href = "<?php echo JURI::base(); ?>index.php?option=com_testlist"; // Redirect after success
                } else {
                    alert(response.message);
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});
</script>
