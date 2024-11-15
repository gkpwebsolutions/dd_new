<?php 
// No direct access
defined('_JEXEC') or die; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-poppins">

    <div class="max-w-4xl mx-auto my-10 p-8 bg-white shadow-lg rounded-lg">
    
        <h1 class="text-xl font-semibold text-sky-600">Get in Touch</h1>
        
        
        <p class="text-lg text-red-600 my-4 font-semibold">Do not use this form to communicate personal data.</p>
        
    
        <form action="/submit-form" method="POST">
    
            <label for="name" class="block text-sky-600 font-medium">Your Name:</label>
            <input type="text" id="name" name="name" class="w-full p-3 mt-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500" required>

        
            <label for="phone" class="block text-sky-600 font-medium">Your Phone:</label>
            <input type="tel" id="phone" name="phone" class="w-full p-3 mt-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500" required>

        
            <label for="email" class="block text-sky-600 font-medium">Your Email:</label>
            <input type="email" id="email" name="email" class="w-full p-3 mt-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500" required>

            
            <label for="message" class="block text-sky-600 font-medium">Message:</label>
            <textarea id="message" name="message" rows="4" class="w-full p-3 mt-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500" required></textarea>

    
            <button type="submit" class="w-full py-3 bg-sky-600 text-white font-semibold rounded-md hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
                Submit
            </button>
        </form>
    </div>

</body>
</html>
