<?php
    // No direct access
    defined('_JEXEC') or die;
?>

<div class="container mx-auto px-4">
   <!-- Packages List Section -->
   <h2 class="text-center bg-green-500 text-white py-4 text-4xl font-extrabold rounded-lg mb-6">
       Health Packages List
   </h2>
   <p class="text-lg text-gray-800 leading-relaxed text-center font-semibold mb-8">
       Unlock the path to optimal health with <span class="font-semibold" style="color:#001861">Diagnodrugs Diagnostics</span> and our exclusive health packages. 
       Our comprehensive full-body health packages help monitor any changes in your health. We offer top-tier radiology and pathology services, 
       accessible to everyone at affordable prices. Receive your health check-up reports online within 24 hours. Book your health package today and take charge of your well-being!
   </p>

   <!-- Grid for Items -->
   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
       <?php if (!empty($this->allItems)): ?>
           <?php foreach ($this->allItems as $item): ?>
               <div class="card bg-white border rounded-lg shadow-md overflow-hidden">
                   <div class="card-body p-4 text-center">
                       <h5 class="card-title font-semibold text-xl mb-3">
                           <!-- Link to the item detail page -->
                           <a href="<?= JRoute::_('index.php?option=com_itemlist&view=itemdetail&id=' . $item->id) ?>" class="text-decoration-none text-blue-600">
                               <?= htmlspecialchars($item->name) ?>
                           </a>
                       </h5>

                       <!-- Item Image -->
                       <div class="item-image-container mb-3">
                           <?php if (!empty($item->image_path)): ?>
                               <img src="<?= JURI::root() . $item->image_path ?>" alt="Item Image" class="w-full h-48 object-cover rounded-md" />
                           <?php else: ?>
                               <p class="text-gray-500">No Image Available</p>
                           <?php endif; ?>
                       </div>

                       <!-- Item Description -->
                       <p class="text-sm text-gray-600 mb-4"><?= $item->description ?></p>

                       <!-- MRP and Offer Price -->
                       <p class="font-semibold text-gray-800">
                           <span class="text-gray-500">MRP: </span><?= $item->mrp ?>
                       </p>
                       <p class="font-bold text-green-600">
                           <span class="text-gray-500">Offer Price: </span><?= $item->offer_price ?>
                       </p>
                   </div>
               </div>
           <?php endforeach ?>
       <?php else: ?>
           <div class="col-12">
               <p class="text-center text-danger">Record Not Found</p>
           </div>
       <?php endif; ?>
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
                                window.location.href = "<?php echo JURI::base() ?>" + "index.php?option=com_itemlist";
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
                    url: "<?php echo JURI::base()?>index.php?option=com_itemlist&format=json&task=selectdelete.selectItems&id=" + selectedItems,
                    data: {},
                    success: function(response) {
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
            }
        });
    });
</script>
