<?php
	// No direct access
	defined('_JEXEC') or die;



//    echo "<pre>";
//    print_r($this->allItems);
//    echo "</pre>";

?>

<div>
    <table class="table table-bordered table-striped text-center">
    <h2 class="text-center bg-success text-white">Packages List</h2>
<p id="message" class="w-100 text-dark p-2 border rounded" style="background-color: #f8d7da;"></p> 
<a href="index.php?option=com_itemlist&view=add" class="btn btn-success mb-2 mt-4 btn-sm">Add Item</a> 
<button id="selectdelete" class="btn btn-danger mb-2 mt-4 m-4 btn-sm">Select Delete</button> 

        <thead class="thead-">
            <tr>
                <th><input type="checkbox" id="selectAll">Select All</th>
                <th>Sr.No</th>
                <th>Item Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>MRP</th>
                <th>Offer Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($this->allItems)): ?>
                <?php foreach ($this->allItems as $item): ?>
                    <tr>
                        <td><input type="checkbox" name="inputItem[]" id="<?= $item->id ?>"></td>
                        <td> <?= $item->id ?> </td>
                        <td> <?= $item->name ?> </td>
                        <td> <?= $item->description ?> </td>
                       
                        <td>
    <?php if (!empty($item->image_path)): ?>
        <img src="<?= JURI::root() . $item->image_path ?>" alt="Item Image" style="max-width: 200px; height: auto;" />
    <?php else: ?>
        No Image
    <?php endif; ?>
</td>
<td> <?= $item->mrp ?> </td>
                        <td> <?= $item->offer_price ?> </td>

<td>
    <!-- Edit Button with customized color -->
    <a href="<?= JURI::base() ?>index.php?option=com_itemlist&view=edit&id=<?= $item->id ?>" class="btn btn-warning btn-sm">Edit</a> <!-- Changed to btn-warning (yellow/orange) for editing -->
    
    <!-- Delete Button with customized color -->
    <a class="deleteBtn" href="<?= JURI::base() ?>index.php?option=com_itemlist&format=json&task=delete.deleteItem&delid=<?= $item->id ?>">
        <button class="btn btn-danger btn-sm">Delete</button> <!-- Keep btn-danger (red) for deleting, as it's commonly used for destructive actions -->
    </a>
</td>

                    </tr>
                <?php endforeach ?>
            <?php else: ?>
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

        // Handle "Delete" button click
        $(".deleteBtn").click(function(e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this item?')) {
                let Url = this.href;

                $.ajax({
                    type: "POST",
                    url: Url,
                    data: {},
                    success: function(response) {
                        if(response.status === true){
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
            }
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
            url: "<?php echo JURI::base() ?>index.php?option=com_itemlist&format=json&task=selectdelete.selectItems&id=" + selectedItems,
            data: {},
            success: function(response) {
                if (response.status === true) {
                    $('#message').text(response.message).addClass('bg-success');
                    setTimeout(() => {
                        window.location.href = "<?php echo JURI::base() ?>index.php?option=com_itemlist";
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
    });
</script>
