<?php

defined('_JEXEC') or die('Restricted access');

$item = $this->item; // The item object containing details

// Check if the item exists
if ($item): ?>

<div class="w-full relative" style="height: 250px;"> 
   
    <div class="absolute inset-0 w-full h-full bg-cover bg-center" style="background-image: url('<?= JURI::root() . 'images/photo-1471864190281-a93a3070b6de.avif' ?>'); filter: blur(8px);"></div>
    
    <div class="absolute inset-0 flex items-center justify-between p-6">
        
        <div>
            <h5 class="text-white text-3xl font-bold">
                <?= htmlspecialchars($item->name) ?>
            </h5>
            <h6 class="text-blue-800 text-xl font-semibold">
                Get Maximum Discount
            </h6>
        </div>
        
        <div class="text-right flex flex-col items-end"> 
            
            <div class="flex items-center mb-4">
            
                <div class="mr-4">
                    <h3 class="text-2xl font-bold text-green-600">
                        ₹<?= number_format($item->offer_price, 2) ?>
                    </h3>
                </div>
                
                <div>
                    <p class="text-xl text-gray-600">
                        <span class="line-through text-red-500">₹<?= number_format($item->mrp, 2) ?></span>
                    </p>
                </div>
            </div>
        
            <a href="#" class="bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 transition-colors">
                Buy Now
            </a>
        </div>
    </div>
</div>
<section class="pack-icon" style="   ">
  <div class="container position-relative z-index-9" style="padding-bottom: 20px;">
        <div class="row g-0" style="    display: flex;    justify-content: space-around;    text-align: center;    box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 10px 0px, rgba(0, 0, 0, 0.19) 0px 4px 20px 0px;">
            <div class="col-3 bg-white" style="    padding-top: 25px; padding-bottom: 25px;">
                <div class="p-0 h-100 m-icon" style="    border-right: 1px solid;">
                    <span class="mb-4 d-inline-block p-icon"><img src="https://www.ganeshdiagnostic.com/assets/img/report-p.webp" alt="Location" width="60" height="60" title="Location"></span>
                    <h2 class="h5 mb-2 m-text" style="color:#000;"> FASTEST ONLINE REPORT</h2>
                </div>
            </div>
            <div class="col-3 bg-white" style="    padding-top: 25px;    padding-bottom: 25px;">
                <div class="p-0 h-100 m-icon" style="    border-right: 1px solid;">
                    <span class="mb-4 d-inline-block p-icon"><img src="https://www.ganeshdiagnostic.com/assets/img/sample-p.webp" alt="find-test-icon" width="60" height="60" title="find test"></span>
                    <h2 class="h5 mb-2 m-text" style="color:#000;">FREE HOME SAMPLE</h2>
                </div>
            </div>
            <div class="col-3 bg-white" style="    padding-top: 25px;    padding-bottom: 25px;">
                <div class="p-0 h-100 m-icon" style="    border-right: 1px solid;">
                    <span class="mb-4 d-inline-block p-icon"><img src="https://www.ganeshdiagnostic.com/assets/img/doctor-p.webp" alt="Health Package" width="60" height="60" title="Health Package"></span>
                    <h2 class="h5 mb-2 m-text" style="color:#000;">100% ACCURATE REPORT</h2>
                </div>
            </div>
            <div class="col-3 bg-white" style="    padding-top: 25px;    padding-bottom: 25px;">
                <div class="p-0 h-100 m-icon">
                    <span class="mb-4 d-inline-block p-icon"><img src="https://www.ganeshdiagnostic.com/assets/img/support-p.webp" alt="Health Package" width="60" height="60" title="Health Package"></span>
                    <h2 class="h5 mb-2 m-text" style="color:#000;">SUPPORT CUSTOMER CARE</h2>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="container mx-auto px-0 py-0 max-h-screen flex flex-col mb-18"></div>
    <div class="flex flex-wrap lg:flex-nowrap items-stretch bg-white rounded-md shadow-md overflow-hidden mb-18">

        <div class="w-full lg:w-1/3 flex-shrink-0 bg-blue-100 mb-18" style="min-height: 400px;">

            <?php if (!empty($item->image_path)): ?>
              <img src="<?= JURI::root() . $item->image_path ?>"
                     alt="Item Image"
                     class="w-full h-full object-cover" />
            <?php else: ?>
                <p class="text-gray-500 flex items-center justify-center h-full">No Image Available</p>
            <?php endif; ?>
        </div>
        <div class="w-full lg:w-2/3 p-3 flex flex-col justify-between">

            <h5 class="text-left text-3xl font-bold text-blue-800 mb-6">
                <?= htmlspecialchars($item->name) ?>
            </h5>
            
            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                <?= nl2br(htmlspecialchars($item->description)) ?>
            </p>
           
            <hr class="border-t-4 border-blue-800 mb-6">
            <div class="mb-6">
                <h6 class="text-indigo-600 font-semibold text-xl mb-6">
                    Exclusive Benefits with Ganesh Diagnostic & Imaging Center
                </h6>
                <hr class="border-t-4 border-green-700 mb-6"> 
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <li class="flex items-center">
                        <i class="fas fa-microscope text-indigo-600 mr-2 text-3xl"></i>
                        Latest Technology for Diagnostics
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-home text-indigo-600 mr-2 text-3xl"></i>
                        Free Home Sample Collection
                    </li>


                    <li class="flex items-center">
                        <i class="fas fa-check-circle text-indigo-600 mr-2 text-3xl"></i>
                        NABL & NABH Certified
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-percent text-indigo-600 mr-2 text-3xl"></i>
                        Up to 86% Discount
                    </li>
                </ul>
            </div>

            <hr class="border-t-4 border-indigo-800 mb-18"> 
            
            <h1 class="text-center text-lg font-semibold text-indigo-600 font-bold">
                Free Doctor Consultation
            </h1>
            <hr class="border-t-4 border-indigo-800 mt-18 mb-18"> >
        </div>
    </div>


    <div class="w-full bg-white rounded-md shadow-md p-6 mb-18">
        <div class="flex items-center justify-start w-full">
        
            <div class="flex flex-row items-center">
                
    <div class="ml-6">
                    <h3 class="text-4xl font-bold text-green-600 mb-2">
                        ₹<?= number_format($item->offer_price, 2) ?>
                    </h3>
                </div>
                
                <div class="mr-6 ml-4">
                    <p class="text-xl text-gray-600 mb-2">
                        <span class="line-through text-red-500">₹<?= number_format($item->mrp, 2) ?></span>
                    </p>
            </div>
            </div>
            
            <div class="ml-96 flex items-center"> 
                <a href="#buy-now" class="bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 transition-colors">
                    Get A Call Back
                </a>
            </div>
        </div>
    </div>

<div class="col-12 artist__general upcoming mt-12" id="upcoming">
  <?php
  jimport('joomla.application.module.helper');
            $module = JModuleHelper::getModule('mod_test', '');
            $attribs['style'] = 'xhtml';
            echo JModuleHelper::renderModule($module, $attribs);
        ?>
    </div>
    <!-- Custom Slider Section -->
    <div class="col-12 artist__general upcoming mt-12" id="upcoming">
        <?php
            jimport('joomla.application.module.helper');
            $module = JModuleHelper::getModule('mod_customslider', '');
            $attribs['style'] = 'xhtml';
            echo JModuleHelper::renderModule($module, $attribs);
        ?>
    </div>
<?php else: ?>
    <div class="container mx-auto my-5 px-6 mb-10">
        <p class="text-red-500 text-center font-semibold text-lg">Item not found</p>
    </div>
<?php endif; ?>




