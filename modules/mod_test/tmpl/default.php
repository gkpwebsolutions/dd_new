<?php
defined('_JEXEC') or die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test Packages</title>

  <!-- Include Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <!-- Link to Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  
</head>
<body class="bg-white">

  <!-- Section Title -->
  <div class="bg-green-100 p-6 rounded-lg mb-8">
    <div class="text-center mb-6">
      <h2 class="text-4xl font-semibold text-blue-800 tracking-wide mb-4" style="font-family: 'Poppins', sans-serif; letter-spacing: 0.5px;">Related Tests</h2>
    </div>

    <!-- Owl Carousel for Related Tests -->
    <div class="owl-carousel owl-theme mb-8">
      <?php
      foreach ($sliderItems as $index => $item) : ?>
        <div class="item">
          <div class="border border-gray-300 rounded-lg shadow-lg p-4">
            <!-- Item Image -->
            <div class="mb-3">
              <?php if (!empty($item->image_path)): ?>
                <a href="<?= JRoute::_('index.php?option=com_testlist&view=testdetail&id=' . $item->id); ?>" class="item-detail-link">
                  <img src="<?= JURI::root() . $item->image_path ?>" alt="Item Image" class="w-full h-64 object-cover rounded-md" />
                </a>
              <?php else: ?>
                <img src="<?= JURI::root() . 'images/8622.jpg' ?>" alt="Default Image" class="w-full h-64 object-cover rounded-md" />
              <?php endif; ?>
            </div>

            <!-- Item Name -->
            <a href="<?= JRoute::_('index.php?option=com_testlist&view=testdetail&id=' . $item->id) ?>" class="text-decoration-none text-center block mx-auto text-lg font-semibold text-blue-800">
              <?= htmlspecialchars($item->test_name) ?>
            </a>

            <!-- MRP and Offer Price Section -->
            <div class="text-center mt-4">
            <p class="font-bold text-xl text-green-600">
                MRP: ₹<?= htmlspecialchars($item->test_amount); ?>
              </p>
              
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- View All Health Packages Button -->
  <div class="text-center mt-6">
    <a href="index.php?option=com_testlist" class="inline-block bg-blue-600 text-white py-2 px-6 rounded-lg text-lg hover:bg-blue-700 transition duration-300">
      View All Test Packages
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
