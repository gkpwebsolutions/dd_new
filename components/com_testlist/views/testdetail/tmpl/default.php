<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

$item = $this->item; 

$host = 'localhost'; 
$username = 'root'; 
$password = 'root'; 
$dbname = 'joomla_db'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = '';
$errorMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['strPatientName'];
    $phone = $_POST['strPatientPhone'];
    $healthPackageName = $_POST['health_package_name']; // Get the selected package name

    // Validation
    if (empty($name) || empty($phone) || empty($healthPackageName)) {
        $errorMessage = "Name, phone number, and health package are required.";
    } elseif (!preg_match("/^[6-9][0-9]{9}$/", $phone)) {
        $errorMessage = "Invalid phone number format. Please enter a valid 10-digit number starting with 6-9.";
    } else {
        // Insert data into w1h54_get_a_callback table
        $sql = "INSERT INTO w1h54_get_a_callback (name, phone, health_package_name) 
                VALUES ('$name', '$phone', '$healthPackageName')";

        if ($conn->query($sql) === TRUE) {
            $successMessage = "Thank you for your submission! We will contact you soon.";
        } else {
            $errorMessage = "Error: " . $conn->error;
        }
    }

    $conn->close();

    // Return JSON response
    if ($successMessage) {
        echo json_encode(["status" => "success", "message" => $successMessage]);
    } else {
        echo json_encode(["status" => "error", "message" => $errorMessage]);
    }
    exit;
}
?>

<?php if (!empty($item)):  ?>

<div class="w-full relative" style="height: 250px;"> 
    <div class="absolute inset-0 w-full h-full bg-cover bg-center" style="background-image: url('<?= JURI::root() . 'images/photo-1471864190281-a93a3070b6de.avif' ?>'); filter: blur(8px);"></div>
    <div class="absolute inset-0 flex items-center justify-between p-6">
        <div>
            <h5 class="text-white text-3xl font-bold"><?= htmlspecialchars($item->test_name) ?></h5>
            <h6 class="text-blue-800 text-xl font-semibold">Get Maximum Discount</h6>
        </div>

        <div class="text-right flex flex-col items-end"> 
            <div class="flex items-center mb-4">
                <div class="mr-4">
                    <h3 class="text-2xl font-bold"  style="color: #03C03C">
                        ₹<?= number_format($item->test_amount, 2) ?>
                    </h3>
                </div>
                <div>
                    <p class="text-xl text-gray-600">
                        <span class="line-through text-red-500">₹<?= number_format($item->cost_of_test, 2) ?></span>
                    </p>
                </div>
            </div>
           
            <a href="#" class="bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 transition-colors" onclick="document.getElementById('request-form-pack').classList.remove('hidden')">
    Buy Now
</a>
        </div>
    </div>
</div>

<section class="pack-icon mt-10">
    <div class="container mx-auto px-4 pb-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-center shadow-lg rounded-md p-6">
            
            <div class="bg-white p-6 rounded-md shadow-md">
                <img src="images/report-p.webp" alt="Fastest Online Report" class="w-16 h-16 mx-auto mb-4">
                <h5 class="font-semibold text-lg text-gray-800">Fastest Online Report</h5>
            </div>
            <!-- Free Home Sample -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <img src="images/sample-p.webp" alt="Free Home Sample" class="w-16 h-16 mx-auto mb-4">
                <h5 class="font-semibold text-lg text-gray-800">Free Home Sample</h5>
            </div>
            <!-- 100% Accurate Report -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <img src="images/doctor-p.webp" alt="100% Accurate Report" class="w-16 h-16 mx-auto mb-4">
                <h5 class="font-semibold text-lg text-gray-800">100% Accurate Report</h5>
            </div>
            <!-- Customer Care Support -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <img src="images/support-p.webp" alt="Support Customer Care" class="w-16 h-16 mx-auto mb-4">
                <h5 class="font-semibold text-lg text-gray-800">Support Customer Care</h5>
            </div>
        </div>
    </div>
</section>

<div class="container mx-auto px-4 py-8 max-h-screen flex flex-col mb-18">
    <div class="flex flex-wrap lg:flex-nowrap items-stretch bg-white rounded-md shadow-md overflow-hidden mb-18">
        <div class="w-full lg:w-1/3 flex-shrink-0 bg-blue-100" style="min-height: 400px;">
            <?php if (!empty($item->image_path)): ?>
                <img src="<?= JURI::root() . $item->image_path ?>" alt="Item Image" class="w-full h-full object-cover" />
                <?php else: ?>
                <img src="<?= JURI::root() . 'images/8622.jpg' ?>" alt="Default Image" class="w-full h-full object-cover" />
            <?php endif; ?>
        </div>
        
        <div class="w-full lg:w-2/3 p-6">
            <h5 class="text-left text-3xl font-bold text-blue-800 mb-6"><?= htmlspecialchars($item->test_name) ?></h5>
            <p class="text-gray-700 text-lg leading-relaxed mb-6"><?= nl2br(htmlspecialchars($item->test_code)) ?></p>
            <hr class="border-t-4 border-blue-800 mb-6">
            <div class="mb-6">
                <h6 class="text-indigo-600 font-semibold text-xl mb-6">Exclusive Benefits with Ganesh Diagnostic & Imaging Center</h6>
                <hr class="border-t-4 border-green-700 mb-6">
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <li class="flex items-center">
                    <i class="fas fa-microscope mr-2 text-3xl" style="color: #03C03C;"></i>
                    Latest Technology for Diagnostics
                    </li>
                    <li class="flex items-center">
                    <i class="fas fa-home mr-2 text-3xl" style="color: #03C03C;"></i> Free Home Sample Collection  
                    </li>
                    <li class="flex items-center">
                    <i class="fas fa-check-circle mr-2 text-3xl" style="color: #03C03C;"></i> NABL & NABH Certified  
                    </li>
                    <li class="flex items-center">
                    <i class="fas fa-percent mr-2 text-3xl" style="color: #03C03C;"></i> Up to 86% Discount
                    </li>
                </ul>
            </div>
            <hr class="border-t-4 border-indigo-800 mb-18">
            <h1 class="text-center text-lg font-semibold text-indigo-600 font-bold">Free Doctor Consultation</h1>
            <hr class="border-t-4 border-indigo-800 mt-18 mb-18">
        </div>
    </div>

    <div class="w-full bg-white rounded-md shadow-md p-6 mb-18">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <h3 class="text-4xl font-bold mr-4 "  style="color: #03C03C;">

                    ₹<?= number_format($item->test_amount, 2) ?>
                </h3>
                <p class="text-xl text-gray-600">
                    <span class="line-through text-red-500">₹<?= number_format($item->cost_of_test, 2) ?></span>
                </p>
            </div>
            <div class="mt-4 flex justify-center">
                <button class="bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all" onclick="document.getElementById('request-form-pack').classList.remove('hidden')">
                    Get A Call Back
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure for Callback Form -->
<div id="request-form-pack" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-800">Request a Call Back</h3>
            <button onclick="document.getElementById('request-form-pack').classList.add('hidden')" class="text-gray-500 text-2xl">&times;</button>
        </div>
        <div class="mt-4" id="message-container">
            <form id="callback-form" method="post">
                <div class="mb-4">
                    <label for="strPatientName" class="block text-gray-700">Enter Your Name</label>
                    <input type="text" name="strPatientName" id="strPatientName" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Enter Your Name" required>
                </div>
                <div class="mb-4">
                    <label for="strPatientPhone" class="block text-gray-700">Enter Mobile Number</label>
                    <input type="text" name="strPatientPhone" id="strPatientPhone" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Enter Mobile Number" pattern="[6-9]{1}[0-9]{9}" minlength="10" maxlength="10" required>
                </div>

                <input type="hidden" name="health_package_name" value="<?= htmlspecialchars($item->test_name) ?>" />

                <div class="text-center">
                    <button type="submit" class="bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 transition-all">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>


<script>
// AJAX form submission
document.getElementById('callback-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    // Get form data
    var formData = new FormData(this);


    var xhr = new XMLHttpRequest();
    xhr.open("POST", "", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);

    
            var messageContainer = document.getElementById('message-container');
            if (response.status === 'success') {
                messageContainer.innerHTML = '<p class="text-green-600 text-lg font-semibold">' + response.message + '</p>';
                setTimeout(function() {
                    document.getElementById('request-form-pack').classList.add('hidden'); 
                }, 3000); 
            } else {
                messageContainer.innerHTML = '<p class="text-red-600 text-lg font-semibold">' + response.message + '</p>';
            }
        }
    };
    xhr.send(formData); 
});

</script>



    <!-- Custom Slider Section -->
    <div class="col-12 artist__general upcoming mt-12" id="upcoming">
        <?php
            jimport('joomla.application.module.helper');
            $module = JModuleHelper::getModule('mod_customslider', '');
            $attribs['style'] = 'xhtml';
            echo JModuleHelper::renderModule($module, $attribs);
        ?>
    </div>

    <div class="col-12 artist__general upcoming mt-12" id="upcoming">
        <?php
            jimport('joomla.application.module.helper');
            $module = JModuleHelper::getModule('mod_test', '');
            $attribs['style'] = 'xhtml';
            echo JModuleHelper::renderModule($module, $attribs);
        ?>
    </div>

    <?php else: ?>
    <div class="container mx-auto my-5 px-6 mb-10">
        <p class="text-red-500 text-center font-semibold text-lg">Item not found</p>
    </div>
<?php endif; ?>