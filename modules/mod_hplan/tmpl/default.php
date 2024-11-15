

<?php 
// No direct access
defined('_JEXEC') or die; ?>
<!-- <-?php echo $hello; ?> -->




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health Plans</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
  
    .blurred {
      filter: blur(8px);
      pointer-events: none;
    }

    .checkups-container {
      display: none;
    }

    .checkups-container.show {
      display: block;
    }

    .plan-card {
      background-color: #ffffff;
      padding: 2rem;
      border-radius: 1.25rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .plan-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 16px 32px rgba(0, 0, 0, 0.15);
    }

    .plan-button {
      background-color: #3b82f6;
      color: white;
      padding: 0.75rem 2rem;
      border-radius: 0.5rem;
      font-weight: 600;
      letter-spacing: 1px;
      transition: background-color 0.3s ease;
    }

    .plan-button:hover {
      background-color: #2563eb;
    }

    .close-button {
      background-color: #ef4444;
      color: white;
      padding: 0.75rem 2rem;
      border-radius: 0.5rem;
      font-weight: 600;
      letter-spacing: 1px;
      transition: background-color 0.3s ease;
    }

    .close-button:hover {
      background-color: #dc2626;
    }

    
    .section-title {
      font-size: 2.5rem;
      font-weight: 700;
      color: #1f2937;
      margin-bottom: 1.5rem;
    }

    .section-description {
      font-size: 1.125rem;
      color: #6b7280;
      margin-bottom: 2rem;
    }

    .plan-list-item {
      display: flex;
      align-items: center;
      font-size: 1.125rem;
      margin-bottom: 0.75rem;
      color: #4b5563;
    }

    .plan-list-item svg {
      margin-right: 0.5rem;
      color: #10b981;
    }

    .plan-price {
      font-size: 1.5rem;
      font-weight: 700;
      color: #3b82f6;
      margin-top: 1rem;
      margin-bottom: 1.5rem;
    }

    .checkup-card {
      background-color: #ffffff;
      padding: 1.5rem;
      border-radius: 1rem;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
      text-align: center;
    }

    .checkup-card h5 {
      font-size: 1.25rem;
      font-weight: 600;
      color: #3b82f6;
      margin-bottom: 1rem;
    }

    .checkup-card p {
      font-size: 1rem;
      color: #6b7280;
      margin-bottom: 1rem;
    }

    .checkup-card .price {
      font-size: 1.25rem;
      font-weight: 700;
      color: #ef4444;
    }
  </style>

  <script>
    
    function showDetails(planId) {
      
      const allPlans = document.querySelectorAll('.plan-card');
      const planDetails = document.querySelectorAll('.checkups-container');

      
      allPlans.forEach(plan => {
        if (plan.id !== planId) {
          plan.classList.add('blurred');
        } else {
          plan.classList.remove('blurred');
        }
      });

      
      planDetails.forEach(details => {
        if (details.id === planId + '-checkups') {
          details.classList.add('show');
        } else {
          details.classList.remove('show');
        }
      });
    }

    
    function closeDetails(planId) {
      const allPlans = document.querySelectorAll('.plan-card');
      const planDetails = document.querySelectorAll('.checkups-container');

      
      allPlans.forEach(plan => {
        plan.classList.remove('blurred');
      });

    
      planDetails.forEach(details => {
        details.classList.remove('show');
      });
    }
  </script>
</head>

<body class="bg-gray-50">

 


  <section class="py-16 px-4">
    

    
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6" id="plans-container">

        
        <div class="plan-card" id="basic-plan">
          <h3 class="text-2xl font-semibold text-blue-600 mb-4">Basic Plan</h3>
          <p class="text-lg text-gray-800 mb-4">A great plan for individuals looking for essential coverage at an affordable price.</p>

          <ul class="plan-list mb-6">
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> Free Blood Tests</li>
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> 50% Discount on Ultrasound</li>
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> Basic Health Checkup</li>
          </ul>

          <p class="plan-price">$99/month</p>
          <button class="plan-button" onclick="showDetails('basic-plan')">Learn More</button>
        </div>

        
        <div id="basic-plan-checkups" class="checkups-container">
          <h4 class="text-xl font-semibold text-gray-800 mb-4">Available Checkups for Basic Plan</h4>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="checkup-card">
              <h5>Blood Pressure Check</h5>
              <p>A quick blood pressure check to monitor heart health.</p>
              <p class="price">$25</p>
            </div>
            <div class="checkup-card">
              <h5>Cholesterol Test</h5>
              <p>Monitor your cholesterol levels for heart disease prevention.</p>
              <p class="price">$30</p>
            </div>
          </div>
          <button class="close-button mt-6" onclick="closeDetails('basic-plan')">Close</button>
        </div>

      
        <div class="plan-card" id="premium-plan">
          <h3 class="text-2xl font-semibold text-blue-600 mb-4">Premium Plan</h3>
          <p class="text-lg text-gray-800 mb-4">For those who want more comprehensive coverage with added benefits.</p>

          <ul class="plan-list mb-6">
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> Free Blood Tests</li>
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> 70% Discount on Ultrasound</li>
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> Comprehensive Health Checkup</li>
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> Annual Vaccination</li>
          </ul>

          <p class="plan-price">$199/month</p>
          <button class="plan-button" onclick="showDetails('premium-plan')">Learn More</button>
        </div>

      
        <div id="premium-plan-checkups" class="checkups-container">
          <h4 class="text-xl font-semibold text-gray-800 mb-4">Available Checkups for Premium Plan</h4>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="checkup-card">
              <h5>Full Blood Test</h5>
              <p>A complete blood test for overall health screening.</p>
              <p class="price">$50</p>
            </div>
            <div class="checkup-card">
              <h5>Liver Function Test</h5>
              <p>Test to check for liver conditions like hepatitis.</p>
              <p class="price">$35</p>
            </div>
          </div>
          <button class="close-button mt-6" onclick="closeDetails('premium-plan')">Close</button>
        </div>

      
        <div class="plan-card" id="ultimate-plan">
          <h3 class="text-2xl font-semibold text-blue-600 mb-4">Ultimate Plan</h3>
          <p class="text-lg text-gray-800 mb-4">The best plan for families or individuals looking for full coverage and exclusive benefits.</p>

          <ul class="plan-list mb-6">
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> Free Blood Tests</li>
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> 100% Discount on Ultrasound</li>
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> Comprehensive Health Checkup</li>
            <li class="plan-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M13.854 4.146a.5.5 0 0 0-.708-.708L7 9.793 3.854 6.646a.5.5 0 1 0-.708.708L7 11.707l7.854-7.854z" />
              </svg> Annual Vaccination + Extra Benefits</li>
          </ul>

          <p class="plan-price">$299/month</p>
          <button class="plan-button" onclick="showDetails('ultimate-plan')">Learn More</button>
        </div>

      
        <div id="ultimate-plan-checkups" class="checkups-container">
          <h4 class="text-xl font-semibold text-gray-800 mb-4">Available Checkups for Ultimate Plan</h4>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="checkup-card">
              <h5>ECG Test</h5>
              <p>Check your heart's electrical activity with an ECG.</p>
              <p class="price">$45</p>
            </div>
            <div class="checkup-card">
              <h5>MRI Scan</h5>
              <p>Comprehensive scan for in-depth body examination.</p>
              <p class="price">$150</p>
            </div>
          </div>
          <button class="close-button mt-6" onclick="closeDetails('ultimate-plan')">Close</button>
        </div>

      </div>
    </div>
  </section>

  

</body>

</html>
