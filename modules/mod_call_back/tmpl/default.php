<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

// Get the Joomla session object
$session = Factory::getSession();

// Check for form submission
$isSubmitted = false;
$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $location = htmlspecialchars($_POST['location']);
    
    // Validate inputs (basic)
    if (!empty($name) && !empty($mobile) && !empty($location)) {
        // Get the database object
        $db = Factory::getDbo();

        // Prepare the query
        $query = $db->getQuery(true)
            ->insert($db->quoteName('w1h54_callback'))
            ->set([
                $db->quoteName('name') . ' = ' . $db->quote($name),
                $db->quoteName('mobile') . ' = ' . $db->quote($mobile),
                $db->quoteName('location') . ' = ' . $db->quote($location)
            ]);

        // Execute the query
        try {
            $db->setQuery($query);
            $db->execute();
            
            // Set the success message in the Joomla session
            $session->set('form_submitted', true);
            $session->set('form_message', 'Your request has been submitted successfully.');
        } catch (Exception $e) {
            // If an error occurs, store the error message
            $session->set('form_submitted', false);
            $session->set('form_message', 'Error: ' . $e->getMessage());
        }
        
        // Redirect to the same page to clear form data and show the message
        $app = Factory::getApplication();
        $app->redirect(JUri::getInstance()->toString());
    } else {
        $session->set('form_submitted', false);
        $session->set('form_message', 'Please fill all fields correctly.');
    }
}

// Check if the form was submitted successfully
if ($session->get('form_submitted')) {
    $isSubmitted = true;
    $message = $session->get('form_message');

    // Clear the session message after displaying
    $session->clear('form_submitted');
    $session->clear('form_message');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request a Call Back</title>

  <!-- Include Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

  <div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
      <h2 class="text-2xl font-semibold text-center text-blue-800 mb-6">Request a Call Back</h2>

      <!-- Form -->
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <!-- Name Field -->
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Enter Your Name</label>
          <input type="text" id="name" name="name" required class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Your Full Name">
        </div>

        <!-- Mobile Number Field -->
        <div class="mb-4">
          <label for="mobile" class="block text-sm font-medium text-gray-700">Enter Mobile Number</label>
          <input type="tel" id="mobile" name="mobile" required class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Your Mobile Number">
        </div>

        <!-- Location Dropdown -->
        <div class="mb-4">
          <label for="location" class="block text-sm font-medium text-gray-700">Select Location</label>
          <select id="location" name="location" class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="">Select Location</option>
            <option value="location1">Location 1</option>
            <option value="location2">Location 2</option>
          </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg text-lg hover:bg-blue-700 transition duration-300">Submit</button>
        </div>
      </form>

      <!-- Display Success or Error Message -->
      <?php if ($isSubmitted): ?>
        <div class="mt-6">
          <p class="text-green-600 mt-4 text-center"><?php echo $message; ?></p>
        </div>
      <?php elseif ($message): ?>
        <div class="mt-6">
          <p class="text-red-600 mt-4 text-center"><?php echo $message; ?></p>
        </div>
      <?php endif; ?>

    </div>
  </div>

</body>
</html>
