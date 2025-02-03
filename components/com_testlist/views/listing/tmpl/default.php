<?php
    // No direct access
    defined('_JEXEC') or die;
?>

<head>
    <!-- Tailwind CSS CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
 


<div class="container">
<h2 class="text-center bg-green-500 text-white py-4 text-4xl font-extrabold  rounded-lg mb-6">Tests List</h2>
    <div class="row">
        <?php if (!empty($this->allItems)): ?>
            <?php foreach ($this->allItems as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <!-- Link to the item detail page -->
                                <a href="<?= JRoute::_('index.php?option=com_testlist&view=testdetail&id=' . $item->id) ?>" class="text-decoration-none">
                                    <strong><?= htmlspecialchars($item->test_name) ?></strong>
                                </a>
                            </h5>


                            <!-- Item Image -->
                            <div class="item-image-container mb-3">
                                <?php if (!empty($item->image_path)): ?>
                                    <img src="<?= JURI::root() . $item->image_path ?>" alt="Item Image" class="img-fluid" />
                                    <?php else: ?>
                <img src="<?= JURI::root() . 'images/8622.jpg' ?>" alt="Default Image" class="w-full h-full object-cover" />
            <?php endif; ?>
                            </div>

                            <!-- Item Description -->
                            <p class="card-text"><?= $item->test_description ?></p>

                            <!-- MRP  -->
                            <p><strong>MRP:</strong> <?= $item->test_amount ?></p>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center text-danger">Record Not Found</p>
            </div>
        <?php endif; ?>

         <!-- Pagination -->
    <div class="pagination-container text-center">
        <?= $this->pagination->getPagesLinks(); ?>
    </div>
</div>
    </div>
</div>


<!-- Include Bootstrap and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function(){  
        
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
                    url: "<?php echo JURI::base()?>index.php?option=com_testlist&format=json&task=selectdelete.selectItems&id=" + selectedItems,
                    data: {},
                    success: function(response) {
                        if (response.status === true) {
                            $('#message').text(response.message).addClass('bg-success');
                            setTimeout(() => {
                                window.location.href = "<?php echo JURI::base()?>index.php?option=com_testlist";
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
