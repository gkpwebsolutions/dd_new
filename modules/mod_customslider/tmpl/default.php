<?php
defined('_JEXEC') or die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health Packages</title>

  <!-- Include Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <!-- Link to Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  
</head>
<body class="bg-white">

  <!-- Related Tests Section with Green Background -->
  <div class="bg-green-100 p-6 rounded-lg mb-8">
    
    <div class="text-center mb-6">
    
<h2 class="text-4xl font-semibold text-blue-800 tracking-wide mb-4" style="font-family: 'Poppins', sans-serif; letter-spacing: 0.5px;">Related Packages</h2>
<p class="text-lg mb-6 leading-relaxed" style="font-family: 'Roboto', sans-serif; color: #03C03C; transition: color 0.3s ease;">
  Early detection is key to maintaining optimal health. At Diagnodrugs Diagnostics, we offer a wide range of accessible and thorough health checkup packages. Our comprehensive testing services are designed to provide timely insights, ensuring proactive care and early treatment to protect your well-being.
</p>



    </div>

    <!-- Owl Carousel Container -->
    <div class="owl-carousel owl-theme mb-8">
      <?php
      // Loop through all the items to generate carousel items
      foreach ($sliderItems as $index => $item) : ?>
        <div class="item">
          <div class="border border-gray-300 rounded-lg shadow-lg p-4">
            <!-- Item Image -->
            <div class="mb-3">
              <?php if (!empty($item->image_path)): ?>
                <a href="<?= JRoute::_('index.php?option=com_itemlist&view=itemdetail&id=' . $item->id); ?>" class="item-detail-link">
                  <img src="<?= JURI::root() . $item->image_path ?>" alt="Item Image" class="w-full h-64 object-cover rounded-md" />
                </a>
              <?php else: ?>
                <p class="text-center text-gray-600">No Image</p>
              <?php endif; ?>
            </div>

            <!-- Item Name -->
            <h5 class="text-center text-xl font-semibold text-blue-800 mb-2">
              <?= htmlspecialchars($item->name); ?>
            </h5>

            <!-- MRP and Offer Price Section -->
            <div class="text-center mb-2">
              <p class="text-lg text-gray-500">
                MRP: <span class="line-through text-red-500">₹<?= htmlspecialchars($item->mrp); ?></span>
              </p>
              <div class="flex justify-center items-center mb-2">
                <p class="font-bold text-xl text-green-600 mr-4">
                  Offer Price: ₹<?= htmlspecialchars($item->offer_price); ?>
                </p>
                <!-- Smaller Book Now Button -->
                <a href="<?= JRoute::_('index.php?option=com_itemlist&view=itemdetail&id=' . $item->id); ?>" class="bg-blue-600 text-white py-1 px-4 text-sm rounded-lg hover:bg-blue-700 transition duration-300">
                  Book Now
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- View All Health Packages Button -->
  <div class="text-center mt-6">
    <a href="index.php?option=com_itemlist" class="inline-block bg-blue-600 text-white py-2 px-6 rounded-lg text-lg hover:bg-blue-700 transition duration-300">
      View All Health Packages
    </a>
  </div>

  <!-- jQuery (necessary for Owl Carousel) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  <!-- Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!-- Owl Carousel Initialization -->
  <script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel({
        loop: true,            // Loops the carousel indefinitely
        margin: 10,            // Space between items
        nav: true,             // Show next/prev navigation buttons
        dots: true,            // Show dots indicator
        autoplay: true,        // Enable auto-slide
        autoplayTimeout: 3000, // Time for each slide to stay before changing
        responsive: {          // Adjust items based on screen size
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      });
    });
  </script>

</body>
</html>
