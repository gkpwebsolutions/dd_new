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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Modal background */
        .modal-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Form container styling */
        .form-container {
            position: relative;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            width: 90%;
        }

        /* Form styling */
        input, select, textarea {
            border-radius: 0.375rem;
            border: 1px solid #D1D5DB;
            padding: 0.75rem;
            width: 100%;
            margin-top: 0.5rem;
        }

        button {
            background-color: #2563EB;
            color: white;
            padding: 0.75rem;
            border-radius: 0.375rem;
            width: 100%;
            margin-top: 1rem;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1D4ED8;
        }
    </style>
</head>
<body class="bg-gray-100 font-poppins">

<!-- Contact Form Modal -->
<div id="contactFormModal" class="modal-background">
    <section class="form-container">
        <p class="text-xs text-blue-500 mb-1 text-center">Get In Touch</p>
        <h2 class="text-lg font-semibold text-red-600 mb-3 text-center">Do not use this form to communicate personal data.</h2>

        <form action="" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-xs font-medium text-blue-600">Full Name</label>
                <input type="text" id="name" name="name" class="mt-1" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-xs font-medium text-blue-600">Email Address</label>
                <input type="email" id="email" name="email" class="mt-1" required>
            </div>

            <!-- Branch Location Dropdown -->
            <div class="mb-4">
                <label for="branch" class="block text-xs font-medium text-blue-600">Select Branch</label>
                <select id="branch" name="branch" class="mt-1" required>
                    <option value="">-- Select a Branch --</option>
                    <option value="Branch 1: XYZ Location">Branch 1: XYZ Location</option>
                    <option value="Branch 2: ABC Location">Branch 2: ABC Location</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="message" class="block text-xs font-medium text-blue-600">Your Message</label>
                <textarea id="message" name="message" rows="3" class="mt-1" required></textarea>
            </div>

            <button type="submit">Send Message</button>
        </form>
    </section>
</div>

<script>
    // Function to close the contact form
    function closeForm() {
        document.getElementById('contactFormModal').style.display = 'none';  // Hide the form when close button is clicked
    }
</script>

</body>
</html>
