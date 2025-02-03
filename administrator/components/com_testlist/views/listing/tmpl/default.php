<?php
// No direct access
defined('_JEXEC') or die;


?>

<head>
    <!-- Tailwind CSS CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- You can also include any additional CSS here if necessary -->
</head>

<div>
    <table class="table table-bordered table-striped text-center">
        <h2 class="text-center bg-success text-white">Test List</h2>
        <a href="index.php?option=com_testlist&view=add" class="btn btn-success mb-2 mt-4 btn-sm">Add Item</a> 
        
        <button id="selectdelete" class="btn btn-danger mb-2 mt-4 m-4 btn-sm">Select Delete</button>

        <thead class="thead-">
            <tr>
                <th><input type="checkbox" id="selectAll">Select All</th>
                <th>Sr.No</th>
                <th>Test Name</th>
                <th>Test ID</th>
                <th>Test Code</th>
                <th>Dictionary ID</th>
                <th>Profile</th>
                <th>Test Amount</th>
                <th>Cost of Test</th>
                <th>Outsource Amount</th>
                <th>Minimum Selling Price</th>
                <th>Revenue Cap</th>
                <th>Test Type</th>
                <th>Outsource Center</th>
                <th>Sample Type</th>
                <th>Test Category</th>
                <th>Department Name</th>
                <th>Accreditation</th>
                <th>Integration Code</th>
                <th>Short Text</th>
                <th>Cap Test</th>
                <th>Target TAT</th>
                <th>Verification Status</th>
                <th>Test Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($this->allItems)): ?>
                <?php foreach ($this->allItems as $item): ?>
                    <tr>
                        <td><input type="checkbox" name="inputItem[]" id="<?= $item->id ?>"></td>
                        <td> <?= $item->sr_no ?> </td>
                        <td> <?= $item->test_name ?> </td>
                        <td> <?= $item->test_id ?> </td>
                        <td> <?= $item->test_code ?> </td>
                        <td> <?= $item->dictionary_id ?> </td>
                        <td> <?= $item->profile ?> </td>
                        <td> <?= $item->test_amount ?> </td>
                        <td> <?= $item->cost_of_test ?> </td>
                        <td> <?= $item->outsource_amount ?> </td>
                        <td> <?= $item->minimum_selling_price ?> </td>
                        <td> <?= $item->revenue_cap ?> </td>
                        <td> <?= $item->test_type ?> </td>
                        <td> <?= $item->outsource_center ?> </td>
                        <td> <?= $item->sample_type ?> </td>
                        <td> <?= $item->test_category ?> </td>
                        <td> <?= $item->department_name ?> </td>
                        <td> <?= $item->accreditation ?> </td>
                        <td> <?= $item->integration_code ?> </td>
                        <td> <?= $item->short_text ?> </td>
                        <td> <?= $item->cap_test ?> </td>
                        <td> <?= $item->target_tat ?> </td>
                        <td> <?= $item->verification_status ?> </td>
                        <td> <?= $item->test_description ?> </td>
                        <td>
    <?php if (!empty($item->image_path)): ?>
        <!-- Add inline CSS to control max-width and height -->
        <img src="<?= JURI::root() . $item->image_path ?>" alt="Item Image" style="max-width: 200px; height: auto;" class="rounded-md" />
    <?php else: ?>
        <p class="text-center text-gray-600">No Image Available</p>
    <?php endif; ?>
</td>

                        <td>
                            <a href="<?= JURI::base() ?>index.php?option=com_testlist&view=edit&id=<?= $item->id ?>" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="24" style="color:red">Record Not Found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    
    <div class="flex justify-center space-x-0.5">
    <a href="index.php?option=com_testlist&limitstart=0" class="page-link px-4 py-2 text-blue-600 hover:bg-blue-500 hover:text-white border border-gray-300 rounded-md">1</a>
<a href="index.php?option=com_testlist&limitstart=200" class="page-link px-4 py-2 text-blue-600 hover:bg-blue-500 hover:text-white border border-gray-300 rounded-md">2</a>
<a href="index.php?option=com_testlist&limitstart=400" class="page-link px-4 py-2 text-blue-600 hover:bg-blue-500 hover:text-white border border-gray-300 rounded-md">3</a>
<a href="index.php?option=com_testlist&limitstart=600" class="page-link px-4 py-2 text-blue-600 hover:bg-blue-500 hover:text-white border border-gray-300 rounded-md">4</a>
<a href="index.php?option=com_testlist&limitstart=800" class="page-link px-4 py-2 text-blue-600 hover:bg-blue-500 hover:text-white border border-gray-300 rounded-md">5</a>
<a href="index.php?option=com_testlist&limitstart=1000" class="page-link px-4 py-2 text-blue-600 hover:bg-blue-500 hover:text-white border border-gray-300 rounded-md">6</a>

        
    </div>
</div>



</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).on('click', '.pagination a', function(e) {
    e.preventDefault(); // Prevent default link behavior

    var pageUrl = $(this).attr('href'); // Get the href URL from the pagination link

    $.ajax({
        url: pageUrl, // Send the URL of the clicked page as a GET request
        type: 'GET',
        success: function(response) {
            // Extract the new table and pagination from the server response
            var newTable = $(response).find('table');
            var newPagination = $(response).find('.pagination-container');

            // Update the table and pagination with the new content
            $('table').html(newTable.html());
            $('.pagination-container').html(newPagination.html());
        },
        error: function() {
            alert("Error loading data.");
        }
    });
});




$('#selectAll').click(function() {
    $('input[name="inputItem[]"]').prop('checked', this.checked);
});


$('#selectdelete').click(function() {
    let selectedItems = $('input[name="inputItem[]"]:checked').map(function() {
        return $(this).attr('id');
    }).get();

    if (selectedItems.length === 0) {
        alert('No tests selected');
        return;
    }

    if (confirm('Are you sure you want to delete the selected tests?')) {
        $.ajax({
            type: "POST",
            url: "<?php echo JURI::base() ?>index.php?option=com_testlist&format=json&task=selectdelete.selectItems&id=" + selectedItems,
            data: {},
            success: function(response) {
                if (response.status === true) {
                    $('#message').text(response.message).addClass('bg-success');
                    setTimeout(() => {
                        window.location.href = "<?php echo JURI::base() ?>index.php?option=com_testlist";
                    }, 1000);
                } else {
                    $('#message').text(response.message).addClass('bg-danger');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
});

// Handle individual delete action
$(".deleteBtn").click(function(e) {
    e.preventDefault();

    if (confirm('Are you sure delete this test?')) {
        let Url = this.href;

        $.ajax({
            type: "POST",
            url: Url,
            data: {},
            success: function(response) {
                if (response.status === true) {
                    $('#message').text(response.message).addClass('bg-success');
                    setTimeout(() => {
                        window.location.href = "<?php echo JURI::base() ?>" + "index.php?option=com_testlist";
                    }, 1000);
                } else {
                    $('#message').text(response.message).addClass('bg-danger');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
});
</script>
