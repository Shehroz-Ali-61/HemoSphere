

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Blood Donor | HemoSphere</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <style>
        :root {
        --neon-red: #ff2e63;
        --cyber-purple: #6b46c1;
        --dark-space: #0a0a12;
        --star-dust: #e2e8f0;
        --gradient-btn: linear-gradient(45deg, #ff416c, #ff4b2b);
      }
      body {
        background-color: var(--dark-space);
        color: var(--star-dust);
        font-family: "Poppins", sans-serif;
        overflow-x: hidden;
      }
      /* Section Title */
      .section-title {
        font-size: 2.8rem;
        font-weight: 800;
        background: linear-gradient(45deg, #fff, var(--neon-red));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
      }
      /* Gradient Button */
      .cta-btn {
        background: var(--gradient-btn);
        border: none;
        border-radius: 50px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #fff;
        text-decoration: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .cta-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(255, 65, 108, 0.5);
      }
      /* Help Cards */
      .help-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 46, 99, 0.2);
        border-radius: 15px;
        padding: 2rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        opacity: 0;
      }
      .help-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 15px rgba(255, 46, 99, 0.3);
      }
      .help-card.animate {
        opacity: 1;
      }
      .card-icon {
        font-size: 3rem;
        color: var(--neon-red);
        margin-bottom: 1rem;
      }
      /* Donor Card Background */
      .donor-card {
        /* background: url('Blood_Bank_Project/1_Home_Page/attractive_background_blood.jpg') no-repeat center center; */
        background-size: cover;
        position: relative;
      }
      .donor-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(10, 10, 18, 0.7);
        border-radius: 15px;
        z-index: 0;
      }
      .donor-card > * {
        position: relative;
        z-index: 1;
      }
      /* Patient Card Background */
      .patient-card {
        /* background: url('Blood_Bank_Project/1_Home_Page/1_main_photo.avif') no-repeat center center; */
        background-size: cover;
        position: relative;
      }
      .patient-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(10, 10, 18, 0.7);
        border-radius: 15px;
        z-index: 0;
      }
      .patient-card > * {
        position: relative;
        z-index: 1;
      }
      /* Chatbot Section */
      .chatbot {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 46, 99, 0.2);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        margin-top: 2rem;
        opacity: 0;
      }
      .chatbot.animate {
        opacity: 1;
      }
      /* FAQ Accordion */
      .accordion-button {
        background: rgba(233, 160, 160, 0.4);
        font-weight: 500;
      }
      .accordion-button:not(.collapsed) {
        color: var(--neon-red);
        background: rgba(255, 46, 99, 0.1);
      }
      .accordion-body {
        background: rgba(255, 255, 255, 0.03);
      }
      /* Testimonial Photos */
      .testimonial-photo {
        margin-left: auto;
        margin-right: auto;
        transition: transform 0.3s ease;
      }
      .testimonial-photo:hover {
        transform: scale(1.05);
      }
      .testimonial {
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 10px;
      }
      .testimonial::before {
        content: "";
        position: absolute;
        top: 0;
        left: -50px;
        width: 100px;
        height: 100%;
        background: rgba(255, 46, 99, 0.1);
        transform: skewX(-15deg);
      }
      .testimonial p {
        font-style: italic;
        position: relative;
        z-index: 1;
      }
      .testimonial .author {
        font-weight: 600;
        margin-top: 0.5rem;
        position: relative;
        z-index: 1;
      }
      /* Contact Form */
      .contact-form input,
      .contact-form textarea {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 46, 99, 0.3);
        color: var(--star-dust);
      }
      .contact-form input:focus,
      .contact-form textarea:focus {
        box-shadow: 0 0 10px rgba(255, 46, 99, 0.5);
      }
    </style>

</head>
<body>

</body>
</html>


@extends('layouts.mainStructure')

@section('title', 'Help Needed | HemoSphere')

@section('content')

<!-- Main "Need Help" Section -->
<section class="container py-5">
    <div class="text-center mb-5 animate" style="animation-delay: 0.3s;">
      <h1 class="section-title">Need Help?</h1>
      <p class="lead">
        Hemosphere is a cutting-edge blood bank platform connecting generous donors with patients in need. Our website provides a safe, streamlined experience with detailed guidelines, live chat support, and a comprehensive resource center. Explore our platform to manage your donation profile, search for donors, or request blood effortlessly.
      </p>
    </div>

    <div class="row g-4">
      <!-- For Donors Card with Background Image -->
      <div class="col-md-6">
        <div class="help-card donor-card animate" style="animation-delay: 0.4s;">
          <div class="text-center">
            <i class="fas fa-hand-holding-heart card-icon"></i>
            <h3 class="mb-3" style="color: var(--neon-red)">For Donors</h3>
          </div>
          <p>
            Become a hero by donating blood. Our user-friendly platform lets you easily register, book appointments, and manage your donation history.
          </p>
          <ul class="mt-3">
            <li>Quick online registration</li>
            <li>Step-by-step donation process</li>
            <li>Profile &amp; donation history management</li>
            <li>24/7 live support and FAQs</li>
          </ul>
          <div class="text-center mt-4">
            <a href="#" class="cta-btn">Learn How to Donate</a>
          </div>
        </div>
      </div>

      <!-- For Patients Card with Background Image -->
      <div class="col-md-6">
        <div class="help-card patient-card animate" style="animation-delay: 0.5s;">
          <div class="text-center">
            <i class="fas fa-tint card-icon"></i>
            <h3 class="mb-3" style="color: var(--neon-red)">For Patients</h3>
          </div>
          <p>
            In need of blood? Access our extensive donor network, detailed profiles, and live chat support to connect with verified donors quickly.
          </p>
          <ul class="mt-3">
            <li>Advanced donor search by location</li>
            <li>Comprehensive donor profiles</li>
            <li>Instant live chat assistance</li>
            <li>Fast and secure request process</li>
          </ul>
          <div class="text-center mt-4">
            <a href="#" class="cta-btn">Find a Donor</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Chatbot Assistance Section -->
    <div class="chatbot animate" style="animation-delay: 0.6s;">
      <h3 style="color: var(--neon-red)">Hemosphere Chatbot</h3>
      <p>
        Our 24/7 chatbot provides immediate answers to your queries about blood donation, donor requests, and website usage. Chat now for instant support.
      </p>
      <a href="#" class="cta-btn">Chat Now</a>
    </div>

    <!-- Frequently Asked Questions Section -->
    <div class="mt-5 animate" style="animation-delay: 0.7s;">
      <h2 class="section-title text-center mb-4">Frequently Asked Questions</h2>
      <div class="accordion" id="faqAccordion">
        <!-- FAQ Item 1 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeadingOne">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faqCollapseOne"
              aria-expanded="true"
              aria-controls="faqCollapseOne"
            >
              How do I register as a donor on Hemosphere?
            </button>
          </h2>
          <div
            id="faqCollapseOne"
            class="accordion-collapse collapse show"
            aria-labelledby="faqHeadingOne"
            data-bs-parent="#faqAccordion"
          >
            <div class="accordion-body">
              Registration is quick and secure. Simply click on "Learn How to Donate," fill in your personal details, and complete our verification process. Once registered, you can easily schedule donation appointments and manage your profile.
            </div>
          </div>
        </div>
        <!-- FAQ Item 2 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeadingTwo">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faqCollapseTwo"
              aria-expanded="false"
              aria-controls="faqCollapseTwo"
            >
              What steps are involved in the blood donation process?
            </button>
          </h2>
          <div
            id="faqCollapseTwo"
            class="accordion-collapse collapse"
            aria-labelledby="faqHeadingTwo"
            data-bs-parent="#faqAccordion"
          >
            <div class="accordion-body">
              Our process is simple and transparent:
              <ul>
                <li>Complete an online registration and health questionnaire.</li>
                <li>Schedule your donation appointment at one of our centers.</li>
                <li>Undergo a quick health screening by our professionals.</li>
                <li>Donate blood in a comfortable and secure environment.</li>
                <li>Receive post-donation care and refreshments.</li>
              </ul>
            </div>
          </div>
        </div>
        <!-- FAQ Item 3 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeadingThree">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faqCollapseThree"
              aria-expanded="false"
              aria-controls="faqCollapseThree"
            >
              How do patients find and connect with donors?
            </button>
          </h2>
          <div
            id="faqCollapseThree"
            class="accordion-collapse collapse"
            aria-labelledby="faqHeadingThree"
            data-bs-parent="#faqAccordion"
          >
            <div class="accordion-body">
              Patients can use our advanced search feature to filter donors by location, blood type, and availability. Detailed donor profiles and instant live chat help you connect quickly for urgent requests.
            </div>
          </div>
        </div>
        <!-- FAQ Item 4 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeadingFour">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faqCollapseFour"
              aria-expanded="false"
              aria-controls="faqCollapseFour"
            >
              What support options are available if I need help?
            </button>
          </h2>
          <div
            id="faqCollapseFour"
            class="accordion-collapse collapse"
            aria-labelledby="faqHeadingFour"
            data-bs-parent="#faqAccordion"
          >
            <div class="accordion-body">
              In addition to our 24/7 live chat support via the Hemosphere Chatbot, you can access our extensive FAQ and resource center. You can also use the contact form below for personalized assistance.
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Testimonials Section -->
    <div class="mt-5 animate" style="animation-delay: 0.8s;">
      <h2 class="section-title text-center mb-4">What Our Users Say</h2>
      <div class="testimonial">
        <div class="row align-items-center">
          <div class="col-md-8">
            <p>
              "Hemosphere made donating blood so easy and stress-free. I received all the support I needed and felt truly appreciated!"
            </p>
            <div class="author">– Shehroz Ali</div>
          </div>
          <div class="col-md-4 text-center">
            <img
              src="Blood_Bank_Project/1_Home_Page/shehroz-removebg-preview.png"
              alt="Shehroz Ali"
              class="testimonial-photo"
              style="width: 220px; height: 300px; object-fit: cover; border-radius: 10px;"
            />
          </div>
        </div>
      </div>
      <div class="testimonial">
        <div class="row align-items-center">
          <div class="col-md-8">
            <p>
              "Finding a donor in an emergency was a breeze thanks to the detailed donor profiles and live chat support. Highly recommend Hemosphere!"
            </p>
            <div class="author">– Muhammad Abubakar</div>
          </div>
          <div class="col-md-4 text-center">
            <img
              src="Blood_Bank_Project/1_Home_Page/bakar-removebg-preview.png"
              alt="Muhammad Abubakar"
              class="testimonial-photo"
              style="width: 220px; height: 250px; object-fit: cover; border-radius: 10px;"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Contact Form Section -->
    <div class="mt-5 animate" style="animation-delay: 1.1s;">
      <h2 class="section-title text-center mb-4">Still Need Assistance?</h2>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <form class="contact-form">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="Your Name"
                required
              />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="name@example.com"
                required
              />
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea
                class="form-control"
                id="message"
                rows="4"
                placeholder="How can we help you?"
                required
              ></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="cta-btn">Submit Inquiry</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection


@section('scripts')
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional: JS to handle form submission -->
    <script>
      document.querySelector('.contact-form').addEventListener('submit', (e) => {
        e.preventDefault();
        alert("Thank you for contacting us! We'll get back to you shortly.");
        e.target.reset();
      });
    </script>
@endsection