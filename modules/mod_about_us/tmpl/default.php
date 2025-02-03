<?php 
// No direct access
defined('_JEXEC') or die; ?>
<!-- <-?php echo $hello; ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="about-us py-12 bg-gray-50 w-full flex items-center justify-center"> 
    <div class="w-full max-w-7xl px-4"> 
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="about-text">
                <h3 class="text-xl font-semibold text-blue-950 mt-6 mb-3">ABOUT US</h3>
                <h2 class="text-2xl font-bold text-blue-950 mb-4">We Employ Latest Research Technology & Company</h2>

                <p class="text-lg text-gray-700 mb-4">
                    Diagnodrugs diagnostics is one of the upcoming clinical laboratories and diagnostic centers, located in Gorakhpur. With plans to widen the network of laboratories in various regions, we are committed to offering advanced diagnostic services. Our expansion plans include opening new branches in Kushinagar, Deoria, Mahrajganj, Khalilabad, and Basti.
                </p>
                
                <div class="flex justify-between mt-8 space-x-8">
                
                    <div class="flex flex-col items-center text-center">
                        <div class="flex items-center space-x-0.5">
                            <i class="fas fa-user-md text-sky-600 text-4xl"></i> 
                            <h4 class="text-lg font-semibold text-blue-950">Medical Laboratory Technician</h4>
                        </div>
                        <p class="text-gray-700 mt-2">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                    </div>

            
                    <div class="flex flex-col items-center text-center">
                        <div class="flex items-center space-x-0.5">
                            <i class="fas fa-certificate text-sky-600 text-4xl"></i>
                            <h4 class="text-lg font-semibold text-blue-950">NABL Certificate Management</h4>
                        </div>
                        <p class="text-gray-700 mt-2">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                    </div>
                </div>

                
                <div class="text-center mt-6">
                    <a href="#about-more" class="inline-block px-6 py-2 border border-blue-600 text-blue-950 font-semibold rounded-md hover:bg-blue-600 hover:text-white transition-all duration-300">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
