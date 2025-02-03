<?php 
// No direct access
defined('_JEXEC') or die; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Why Us - Accordion</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 py-12">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <p class="text-xl text-gray-700 leading-relaxed">
        At our clinic, we are committed to providing <span class="font-semibold text-indigo-600">quality services</span> that prioritize your health and well-being. Here's why you can trust us for your diagnostic needs:
      </p>
    </div>

    <div class="space-y-8">
    
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      
        <div class="accordion-item group border-b-4 border-gray-300 p-6 rounded-lg bg-white shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out">
          <button class="accordion-header w-full text-left text-xl font-semibold text-indigo-700 group-hover:text-indigo-900 focus:outline-none transform group-hover:scale-105 transition-all duration-300">
            Quality Services
          </button>
          <div class="accordion-content hidden mt-3 text-gray-600">
            We ensure that all tests are conducted with the highest standards of care and precision.
          </div>
        </div>

        <div class="accordion-item group border-b-4 border-gray-300 p-6 rounded-lg bg-white shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out">
          <button class="accordion-header w-full text-left text-xl font-semibold text-indigo-700 group-hover:text-indigo-900 focus:outline-none transform group-hover:scale-105 transition-all duration-300">
            Accurate Results
          </button>
          <div class="accordion-content hidden mt-3 text-gray-600">
            Our advanced technology and experienced professionals ensure reliable and precise diagnostic results.
          </div>
        </div>

        <div class="accordion-item group border-b-4 border-gray-300 p-6 rounded-lg bg-white shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out">
          <button class="accordion-header w-full text-left text-xl font-semibold text-indigo-700 group-hover:text-indigo-900 focus:outline-none transform group-hover:scale-105 transition-all duration-300">
            Full-Time Pathologists and Microbiologists
          </button>
          <div class="accordion-content hidden mt-3 text-gray-600">
            Our team of dedicated, qualified pathologists and microbiologists are always available to oversee and interpret test results.
          </div>
        </div>
      </div>

      
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="accordion-item group border-b-4 border-gray-300 p-6 rounded-lg bg-white shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out">
          <button class="accordion-header w-full text-left text-xl font-semibold text-indigo-700 group-hover:text-indigo-900 focus:outline-none transform group-hover:scale-105 transition-all duration-300">
            Fully Automated Analyzers
          </button>
          <div class="accordion-content hidden mt-3 text-gray-600">
            We use state-of-the-art, fully automated analyzers to perform tests, ensuring accuracy and efficiency.
          </div>
        </div>

        <div class="accordion-item group border-b-4 border-gray-300 p-6 rounded-lg bg-white shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out">
          <button class="accordion-header w-full text-left text-xl font-semibold text-indigo-700 group-hover:text-indigo-900 focus:outline-none transform group-hover:scale-105 transition-all duration-300">
            Evidence (Image) Based Reporting
          </button>
          <div class="accordion-content hidden mt-3 text-gray-600">
            All reports are based on evidence and are accompanied by relevant images to support findings, providing a comprehensive view of your health.
          </div>
        </div>

        <div class="accordion-item group border-b-4 border-gray-300 p-6 rounded-lg bg-white shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out">
          <button class="accordion-header w-full text-left text-xl font-semibold text-indigo-700 group-hover:text-indigo-900 focus:outline-none transform group-hover:scale-105 transition-all duration-300">
            ISO and NABL Certified
          </button>
          <div class="accordion-content hidden mt-3 text-gray-600">
            We follow ISO and NABL standards to guarantee the highest quality of testing, safety, and reliability in every service we provide.
          </div>
        </div>
      </div>
    </div>

    
<div class="space-y-8 mt-12 text-center">
  <h2 class="text-3xl font-semibold mb-8 font-[Poppins]" style="color:#001861">Technology Driven (Reduced Chances of Error)</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
    
    <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-700 hover:text-white">
      <span class="text-5xl mb-4 transition-colors duration-300 ease-in-out" style="color:#03C03C">
        <i class="fas fa-barcode"></i>
      </span>
      <h3 class="text-lg font-semibold text-gray-700 transition-colors duration-300 ease-in-out">Bar-code Enabled</h3>
    </div>

    <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-700 hover:text-white">
      <span class="text-5xl mb-4 transition-colors duration-300 ease-in-out" style="color:#03C03C">
        <i class="fas fa-cogs"></i>
      </span>
      <h3 class="text-lg font-semibold text-gray-700 transition-colors duration-300 ease-in-out">LIMS Integration</h3>
    </div>

    <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-700 hover:text-white">
      <span class="text-5xl mb-4 transition-colors duration-300 ease-in-out" style="color:#03C03C">
        <i class="fas fa-mobile-alt"></i>
      </span>
      <h3 class="text-lg font-semibold text-gray-700 transition-colors duration-300 ease-in-out">Doctor's & Patient App</h3>
    </div>

    <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-700 hover:text-white">
      <span class="text-5xl mb-4 transition-colors duration-300 ease-in-out" style="color:#03C03C">
        <i class="fas fa-qrcode"></i>
      </span>
      <h3 class="text-lg font-semibold text-gray-700 transition-colors duration-300 ease-in-out">QR Code on Reports</h3>
    </div>

  </div>
</div>

<div class="space-y-8 mt-8 text-center">
  <h2 class="text-4xl font-semibold mb-6 font-[Poppins]" style="color:#001861">Our Instruments</h2> 

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

  
    <div class="flex justify-center items-center h-full">
      <img src="images/c8e6476f-575e-4463-9459-e8bc6dbd2961.jpg" alt="Our Instruments" class="rounded-lg shadow-lg w-full md:w-4/5 lg:w-3/4 xl:w-2/3 object-cover h-full">
    </div>

    <div class="flex flex-wrap justify-between w-full md:w-1/2 gap-4">
    
      <ul class="flex items-center justify-start w-full space-x-4 text-gray-700 text-sm flex-nowrap">
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>Mindray BS-240 Pro - Biochemistry</span>
        </li>
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>Mindray BS 240 - Biochemistry</span>
        </li>
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>Mindray CL Gooi - Hormone Analyzer</span>
        </li>
      </ul>
      
      <ul class="flex items-center justify-start w-full space-x-4 text-gray-700 text-sm flex-nowrap">
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>Mindray BC-5130 Hematology analyzer</span>
        </li>
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>Mindray BC-20 Hematology analyzer</span>
        </li>
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>Wondfo Finecare - FIA-Hormone</span>
        </li>
      </ul>
      
      <ul class="flex items-center justify-start w-full space-x-4 text-gray-700 text-sm flex-nowrap">
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>Arkray Orinlyser - Urine analyzer</span>
        </li>
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>Bi 32 Automated blood culture system</span>
        </li>
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>AVN Bio Electrolyte analyzer</span>
        </li>
      </ul>
      
      <ul class="flex items-center justify-start w-full space-x-4 text-gray-700 text-sm flex-nowrap">
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>Tissue processor</span>
        </li>
        <li class="flex items-center hover:bg-indigo-100 hover:text-indigo-700 hover:scale-105 hover:shadow-lg hover:transform p-3 rounded-md transition duration-300 ease-in-out">
          <i class="fas fa-cogs mr-3 transition-colors duration-300 ease-in-out" style="color:#03C03C"></i>
          <span>Microtome</span>
        </li>
      </ul>
    </div>
  </div>
</div>



  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const accordionItems = document.querySelectorAll('.accordion-item');

      accordionItems.forEach(item => {
        item.addEventListener('click', function () {
          const content = item.querySelector('.accordion-content');
          const isOpen = !content.classList.contains('hidden');

          
          document.querySelectorAll('.accordion-content').forEach(otherContent => {
            if (otherContent !== content) {
              otherContent.classList.add('hidden');
            }
          });

          if (isOpen) {
            content.classList.add('hidden');
          } else {
            content.classList.remove('hidden');
          }
        });
      });
    });
  </script>

</body>

</html>
