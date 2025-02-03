<?php
// No direct access
defined('_JEXEC') or die;

$successMessage = ''; // Variable for success message initialization

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection variables
    $host = 'localhost'; 
    $username = 'root';  
    $password = 'root';  
    $dbname = 'joomla_db'; 

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
    $sql = "INSERT INTO w1h54_contact_messages (name, email, branch, message) VALUES ('$name', '$email', '$branch', '$message')";

    // Execute the query and handle the result
    if ($conn->query($sql) === TRUE) {
        // Message sent successfully
        $successMessage = 'Your message has been sent successfully!';
    } else {
        // Error inserting data
        $successMessage = 'Error: ' . $conn->error;
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
    <title>Our Branches - Diagnodrugs Diagnostics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 90%; /* Reduced width for responsiveness */
            max-width: 600px;
            position: relative;
        }

        .thank-you-message {
            display: none;
            background-color: #e0ffe0;
            padding: 10px;
            border: 1px solid #4CAF50;
            color: green;
            margin-top: 20px;
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-wide">

    <header class="hero-section bg-gradient-to-r from-lime-300 via-green-500 to-teal-600 text-white text-center py-32 px-8 rounded-3xl shadow-2xl transform transition duration-300">
        <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight mb-4 tracking-tight">Our Branches</h1>
        <p class="mt-4 text-xl sm:text-2xl max-w-3xl mx-auto">We are committed to providing top-notch diagnostic services. Explore our branches across the city to find the nearest Diagnodrugs Diagnostics center for your healthcare needs.</p>
    </header>

    <section class="container mx-auto px-4 mt-16">
        <div class="flex flex-wrap justify-center gap-8 sm:gap-12">
            <!-- Branch 1 -->
            <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
                <div class="bg-white shadow-xl rounded-3xl overflow-hidden card transition duration-300">
                    <div class="map-card relative">
                        <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl sm:text-2xl font-semibold text-[#0a51a3] mb-3">Branch 1: XYZ Location</h3>
                        <p class="text-gray-700">Address: 123, ABC Street, City, PIN Code</p>
                        <p class="text-gray-700">Contact: +91 1234567890</p>
                    </div>
                    <div class="px-6 py-4">
                        <a href="javascript:void(0);" onclick="showModal('contactFormModal')" class="bg-[#0a51a3] text-white px-8 py-3 rounded-full text-sm font-semibold hover:bg-[#084c80] transition duration-300 w-full text-center block">Contact Us</a>
                    </div>
                </div>
            </div>

            <!-- Branch 2 -->
            <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
                <div class="bg-white shadow-xl rounded-3xl overflow-hidden card transition duration-300">
                    <div class="map-card relative">
                        <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl sm:text-2xl font-semibold text-[#0a51a3] mb-3">Branch 2: ABC Location</h3>
                        <p class="text-gray-700">Address: 456, DEF Street, City, PIN Code</p>
                        <p class="text-gray-700">Contact: +91 0987654321</p>
                    </div>
                    <div class="px-6 py-4">
                        <a href="javascript:void(0);" onclick="showModal('contactFormModal')" class="bg-[#0a51a3] text-white px-8 py-3 rounded-full text-sm font-semibold hover:bg-[#084c80] transition duration-300 w-full text-center block">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Modal -->
    <div id="contactFormModal" class="modal">
        <div class="modal-content">
            <button class="close-btn" onclick="closeForm()">×</button>

            <p class="text-xs text-blue-500 mb-1 text-center">Get In Touch</p>
            <h2 class="text-lg font-semibold text-red-600 mb-3 text-center">Do not use this form to communicate personal data.</h2>

            <form id="contactForm" method="POST" onsubmit="submitForm(event)">
                <div class="mb-3">
                    <label for="name" class="block text-xs font-medium text-blue-600">Full Name</label>
                    <input type="text" id="name" name="name" class="mt-1 p-1.5 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="block text-xs font-medium text-blue-600">Email Address</label>
                    <input type="email" id="email" name="email" class="mt-1 p-1.5 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <div class="mb-3">
                    <label for="branch" class="block text-xs font-medium text-blue-600">Select Branch</label>
                    <select id="branch" name="branch" class="mt-1 p-1.5 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">-- Select a Branch --</option>
                        <option value="Branch 1: XYZ Location">Branch 1: XYZ Location</option>
                        <option value="Branch 2: ABC Location">Branch 2: ABC Location</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="message" class="block text-xs font-medium text-blue-600">Your Message</label>
                    <textarea id="message" name="message" rows="2" class="mt-1 p-1.5 w-full border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required></textarea>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Send Message</button>
            </form>

            <!-- Thank You Message -->
            <div id="thankYouMessage" class="thank-you-message">
                Your message has been sent successfully! Thank you for reaching out.
            </div>
        </div>
    </div>

    <script>
        // Show the contact form modal
        function showModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = 'flex'; // Show the modal
        }

        // Close the contact form modal
        function closeForm() {
            document.getElementById('contactFormModal').style.display = 'none'; // Hide the form when close button is clicked
        }

        // Handle form submission with AJAX
        function submitForm(event) {
            event.preventDefault(); // Prevent form from submitting normally

            var formData = new FormData(document.getElementById('contactForm'));
            
            // Show the thank you message immediately after submission
            document.getElementById('thankYouMessage').style.display = 'block';
            
            // Perform AJAX request
            $.ajax({
                url: '', // Same page for PHP handling
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Close the modal after a successful submission
                    document.getElementById('contactFormModal').style.display = 'none';
                    document.getElementById('contactForm').reset(); // Optionally reset the form
                },
                error: function() {
                    alert('There was an error submitting your message.');
                },
                processData: false,
                contentType: false
            });
        }
    </script>
</body>
</html>
