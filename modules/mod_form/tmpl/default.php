<?php
// No direct access
defined('_JEXEC') or die;

// Create an instance of JConfig
$config = new JConfig();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Use the config object for database connection details
    $host = $config->host;
    $username = $config->user;
    $password = $config->password;
    $dbname = $config->db;

    // Establish the database connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data and escape it to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $branch = $conn->real_escape_string($_POST['branch']);
    $message = $conn->real_escape_string($_POST['message']);

    // SQL query to insert the data into the database
    $sql = "INSERT INTO {$config->dbprefix}contact_messages (name, email, branch, message) VALUES ('$name', '$email', '$branch', '$message')";

    // Execute the query and handle the result
    if ($conn->query($sql) === TRUE) {
        echo "<p class='text-green-600 text-center'>Your message has been sent successfully!</p>";
    } else {
        echo "<p class='text-red-600 text-center'>Error: " . $conn->error . "</p>";
    }

    // Close the database connection
    $conn->close();
}
?>

    // Get form data and escape it to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $branch = $conn->real_escape_string($_POST['branch']);
    $message = $conn->real_escape_string($_POST['message']);

    // SQL query to insert the data into the database
    $sql = "INSERT INTO w1h54_contact_messages (name, email, branch, message) VALUES ('$name', '$email', '$branch', '$message')";

    // Execute the query and handle the result
    if ($conn->query($sql) === TRUE) {
        echo "<p class='text-green-600 text-center'>Your message has been sent successfully!</p>";
    } else {
        echo "<p class='text-red-600 text-center'>Error: " . $conn->error . "</p>";
    }

    // Close the database connection
    $conn->close();
}
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

<section class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto">
  <p class="text-sm text-blue-500 mb-4 text-center">Get In Touch</p>
  <h2 class="text-2xl font-semibold text-red-600 mb-6 text-center">Do not use this form to communicate personal data.</h2>

  <form action="" method="POST">
    <div class="mb-6">
      <label for="name" class="block text-sm font-medium text-blue-600">Full Name</label>
      <input type="text" id="name" name="name" class="mt-1 p-3 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
    </div>

    <div class="mb-6">
      <label for="email" class="block text-sm font-medium text-blue-600">Email Address</label>
      <input type="email" id="email" name="email" class="mt-1 p-3 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
    </div>

    <!-- Branch Location Dropdown -->
    <div class="mb-6">
      <label for="branch" class="block text-sm font-medium text-blue-600">Select Branch</label>
      <select id="branch" name="branch" class="mt-1 p-3 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        <option value="">-- Select a Branch --</option>
        <option value="Branch 1: XYZ Location">Branch 1: XYZ Location</option>
        <option value="Branch 2: ABC Location">Branch 2: ABC Location</option>
      </select>
    </div>

    <div class="mb-6">
      <label for="message" class="block text-sm font-medium text-blue-600">Your Message</label>
      <textarea id="message" name="message" rows="4" class="mt-1 p-3 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required></textarea>
    </div>

    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">Send Message</button>
  </form>
</section>

</body>
</html>
