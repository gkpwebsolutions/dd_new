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

  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>



  
    <section class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto">
      <p class="text-sm text-blue-500 mb-4 text-center">Get In Touch</p>
      <h2 class="text-2xl font-semibold text-blue-600 mb-6 text-center">Do not use this form to communicate personal data.</h2>

    
      <form action="#" method="POST">
        <div class="mb-6">
          <label for="name" class="block text-sm font-medium text-blue-600">Full Name</label>
          <input type="text" id="name" name="name" class="mt-1 p-3 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>

        <div class="mb-6">
          <label for="email" class="block text-sm font-medium text-blue-600">Email Address</label>
          <input type="email" id="email" name="email" class="mt-1 p-3 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>

        <div class="mb-6">
          <label for="message" class="block text-sm font-medium text-blue-600">Your Message</label>
          <textarea id="message" name="message" rows="4" class="mt-1 p-3 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">Send Message</button>
      </form>
    </section>
  </div>

</body>
</html>
