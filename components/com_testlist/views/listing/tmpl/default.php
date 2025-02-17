<?php 
 ?>

<head>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<div class="container mx-auto px-4">
    <h2 class="text-center bg-green-500 text-white py-4 text-4xl font-extrabold rounded-lg mb-6">Tests List</h2>

    <!-- Search Bar Section -->
    <div class="flex justify-center mb-6">
    <form action="<?= JRoute::_('index.php?option=com_testlist&view=testlist') ?>" method="get" class="flex items-center space-x-4 w-full max-w-3xl">
    <input type="text" name="search" value="<?= htmlspecialchars($this->search ?? '') ?>" placeholder="Search Test..." />
    <button type="submit">Search</button>
</form>


    </div>

    <!-- Pagination Section -->
    <div class="flex justify-between items-center mb-4">
        
        <div class="pagination-container flex-1 text-center">
            <?= $this->pagination->getPagesLinks(); ?>
        </div>
    </div>

    
    <div class="row grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php if (!empty($this->allItems)): ?>
            <?php foreach ($this->allItems as $item): ?>
                <div class="card">
                    <div class="card-body text-center bg-white p-4 border rounded-lg shadow-md">
                        <h5 class="card-title">
                            <!-- Link to the item detail page -->
                            <a href="<?= JRoute::_('index.php?option=com_testlist&view=testdetail&id=' . $item->id) ?>" class="text-decoration-none text-lg font-semibold text-blue-600 hover:text-blue-800">
                                <?= !empty($item->test_name) ? htmlspecialchars($item->test_name) : '-' ?>
                            </a>
                        </h5>

                        <!-- Item Image -->
                        <div class="item-image-container mb-3">
                            <?php if (!empty($item->image_path)): ?>
                                <img src="<?= JURI::root() . $item->image_path ?>" alt="Item Image" class="w-full h-48 object-cover rounded-lg" />
                            <?php else: ?>
                                <img src="<?= JURI::root() . 'images/8622.jpg' ?>" alt="Default Image" class="w-full h-48 object-cover rounded-lg" />
                            <?php endif; ?>
                        </div>
                        <!-- MRP  -->
                        <p><strong>MRP:</strong> <?= $item->test_amount ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center text-danger">Record Not Found</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="pagination-container text-center mt-4">
        <?= $this->paginationLinks; ?> <!-- Updated to use manually modified pagination links -->
    </div>
</div>

<!-- Include Bootstrap and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Delete item functionality
        $(".deleteBtn").click(function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this item?')) {
                let Url = this.href;
                $.ajax({
                    type: "POST",
                    url: Url,
                    data: {},
                    success: function(response) {
                        if(response.status === true){
                            $('#message').text(response.message).addClass('bg-success');
                            setTimeout(() => {
                                window.location.href = "<?= JURI::base() ?>index.php?option=com_testlist";
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

        // Handle "Select All" checkbox
        $('#selectAll').click(function() {
            $('input[name="inputItem[]"]').prop('checked', this.checked);
        });

        // Handle "Select Delete" action
        $('#selectdelete').click(function() {
            let selectedItems = $('input[name="inputItem[]"]:checked').map(function() {
                return $(this).attr('id');
            }).get();

            if (selectedItems.length === 0) {
                alert('No items selected');
                return;
            }

            if (confirm('Are you sure you want to delete the selected items?')) {
                $.ajax({
                    type: "POST",
                    url: "<?= JURI::base() ?>index.php?option=com_testlist&format=json&task=selectdelete.selectItems&id=" + selectedItems,
                    data: {},
                    success: function(response) {
                        if (response.status === true) {
                            $('#message').text(response.message).addClass('bg-success');
                            setTimeout(() => {
                                window.location.href = "<?= JURI::base() ?>index.php?option=com_testlist";
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
