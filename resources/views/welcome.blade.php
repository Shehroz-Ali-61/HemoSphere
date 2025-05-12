{{--
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laravel - The PHP Framework For Web Artisans</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    /* ------------------------------ */
    /*          GLOBAL STYLES         */
    /* ------------------------------ */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
      background: linear-gradient(135deg, #1a1c22 0%, #2d3038 100%);
      color: #ffffff;
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
      transition: all 0.3s ease;
    }

    /* ------------------------------ */
    /*           HEADER NAV           */
    /* ------------------------------ */
    header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.5rem 5%;
      background: rgba(26, 28, 34, 0.95);
      backdrop-filter: blur(10px);
      z-index: 1000;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-weight: 700;
      font-size: 1.5rem;
      color: #ff2d20;
    }

    .nav-links a {
      margin-left: 2rem;
      font-weight: 500;
      position: relative;
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 2px;
      background: #ff2d20;
      transition: width 0.3s ease;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    /* ------------------------------ */
    /*         HERO / MAIN BODY       */
    /* ------------------------------ */
    .hero {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
      padding: 120px 5% 60px;
      gap: 40px;
      min-height: 100vh;
    }

    /* Left Side Text */
    .hero-content {
      max-width: 560px;
      animation: slideInLeft 1s ease;
    }

    .hero-content h2 {
      font-size: 3.5rem;
      margin-bottom: 1.5rem;
      line-height: 1.2;
      background: linear-gradient(45deg, #fff 0%, #ff9b9b 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hero-content p {
      font-size: 1.25rem;
      margin-bottom: 2rem;
      color: #c3c4d3;
    }

    .hero-content ul {
      list-style: none;
      margin-bottom: 2.5rem;
    }

    .hero-content ul li {
      margin: 1rem 0;
      padding: 1rem;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 8px;
      transition: transform 0.3s ease;
    }

    .hero-content ul li:hover {
      transform: translateX(10px);
    }

    .hero-content ul li a {
      display: flex;
      align-items: center;
      gap: 1rem;
      color: #ffffff;
      font-weight: 500;
    }

    .hero-content ul li a i {
      color: #ff2d20;
      font-size: 1.2rem;
    }

    .deploy-btn {
      display: inline-flex;
      align-items: center;
      gap: 0.8rem;
      background: #ff2d20;
      color: #ffffff;
      padding: 1rem 2rem;
      border: none;
      border-radius: 50px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(255, 45, 32, 0.3);
    }

    .deploy-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(255, 45, 32, 0.4);
    }

    /* Right Side Image */
    .hero-image-container {
      position: relative;
      width: 50%;
      max-width: 600px;
      animation: float 3s ease-in-out infinite;
    }

    .hero-image-container img {
      width: 100%;
      height: auto;
      filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.3));
    }

    /* ------------------------------ */
    /*          ANIMATIONS           */
    /* ------------------------------ */
    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-50px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-20px);
      }
    }

    /* ------------------------------ */
    /*          RESPONSIVENESS        */
    /* ------------------------------ */
    @media (max-width: 768px) {
      .hero {
        flex-direction: column;
        padding: 100px 5% 60px;
        text-align: center;
      }

      .hero-content h2 {
        font-size: 2.5rem;
      }

      .hero-image-container {
        width: 100%;
        max-width: 400px;
      }

      .nav-links {
        display: none;
      }
    }
  </style>
</head>

<body>
  <!-- HEADER / NAVIGATION -->
  <header>
    <div class="logo">Laravel</div>
    <nav class="nav-links">
      <a href="#">Documentation</a>
      <a href="#">Log in</a>
      <a href="#">Register</a>
    </nav>
  </header>

  <!-- HERO SECTION -->
  <section class="hero">
    <!-- Left Side Text Content -->
    <div class="hero-content">
      <h2>Build Something Amazing</h2>
      <p>
        Laravel is a web application framework with expressive, elegant syntax.
        We've already laid the foundation — freeing you to create without sweating the small things.
      </p>
      <ul>
        <li>
          <a href="#">
            <i class="fas fa-book-open"></i>
            <span>Read the Documentation</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-video"></i>
            <span>Watch Laracasts Tutorials</span>
          </a>
        </li>
      </ul>
      <button class="deploy-btn">
        <i class="fas fa-rocket"></i>
        Deploy Now
      </button>
    </div>

    <!-- Right Side Image / Artwork -->
    <div class="hero-image-container">
      <img
        src="https://images.unsplash.com/photo-1603491285520-10e88b8623e8?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        width="100%" height="100%" alt="Laravel Artwork" />
    </div>
  </section>
</body>

</html> --}}































<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HemoSphere - Life in Every Drop</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    /* ------------------------------ */
    /*          GLOBAL STYLES         */
    /* ------------------------------ */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
      background: linear-gradient(135deg, #0a0a1a 0%, #1a0a0a 100%);
      color: #ffffff;
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
      transition: all 0.3s ease;
    }

    /* ------------------------------ */
    /*           HEADER NAV           */
    /* ------------------------------ */
    header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.5rem 5%;
      background: rgba(10, 10, 26, 0.95);
      backdrop-filter: blur(10px);
      z-index: 1000;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-weight: 700;
      font-size: 1.5rem;
      color: #c00a0a;
      text-transform: uppercase;
    }

    .nav-links a {
      margin-left: 2rem;
      font-weight: 500;
      position: relative;
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 2px;
      background: #c00a0a;
      transition: width 0.3s ease;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    .emergency-btn {
      background: #c00a0a;
      padding: 0.8rem 1.5rem;
      border-radius: 50px;
      margin-left: 2rem;
      animation: pulse 2s infinite;
    }

    /* ------------------------------ */
    /*         HERO / MAIN BODY       */
    /* ------------------------------ */
    .hero {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
      padding: 150px 5% 60px;
      gap: 40px;
      min-height: 100vh;
    }

    /* Left Side Text */
    .hero-content {
      max-width: 560px;
      animation: slideInLeft 1s ease;
    }

    .hero-content h2 {
      font-size: 3.5rem;
      margin-bottom: 1.5rem;
      line-height: 1.2;
      background: linear-gradient(45deg, #fff 0%, #ff6b6b 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hero-content p {
      font-size: 1.25rem;
      margin-bottom: 2rem;
      color: #d1d1d1;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1.5rem;
      margin-bottom: 2.5rem;
    }

    .feature-card {
      padding: 1.5rem;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 10px;
      transition: transform 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .feature-card i {
      font-size: 1.8rem;
      color: #c00a0a;
      margin-bottom: 1rem;
    }

    .emergency-btn-lg {
      display: inline-flex;
      align-items: center;
      gap: 0.8rem;
      background: #c00a0a;
      color: #ffffff;
      padding: 1.2rem 2.5rem;
      border: none;
      border-radius: 50px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
      animation: pulse 2s infinite;
    }

    /* Right Side Image */
    .hero-image-container {
      position: relative;
      width: 50%;
      max-width: 600px;
      animation: float 3s ease-in-out infinite;
    }

    .hero-image-container img {
      width: 100%;
      height: auto;
      filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.3));
      border-radius: 10px;

    }


    /* ------------------------------ */
    /*          Footer          */
    /* ------------------------------ */
    footer {
      text-align: center;
      color: #d1d1d1;
      padding: 20px 0px;
      /* background: rgba(10, 10, 26, 0.95); */
    }

    /* ------------------------------ */
    /*          ANIMATIONS           */
    /* ------------------------------ */
    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-50px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-20px);
      }
    }

    @keyframes pulse {
      0% {
        box-shadow: 0 0 0 0 rgba(192, 10, 10, 0.5);
      }

      70% {
        box-shadow: 0 0 0 15px rgba(192, 10, 10, 0);
      }

      100% {
        box-shadow: 0 0 0 0 rgba(192, 10, 10, 0);
      }
    }

    /* ------------------------------ */
    /*          RESPONSIVENESS        */
    /* ------------------------------ */
    @media (max-width: 768px) {
      .hero {
        flex-direction: column;
        padding: 120px 5% 60px;
        text-align: center;
      }

      .hero-content h2 {
        font-size: 2.5rem;
      }

      .features-grid {
        grid-template-columns: 1fr;
      }

      .hero-image-container {
        display: none;
      }
    }

    .logo img {
      width: 40px;
      height: 40px;
      margin-bottom: -10px;
    }



    /* ------------------------------ */
    /*     TRUSTED FEATURES STRIP     */
    /* ------------------------------ */
    .trusted-features {
      background: #1e1e1e;
      /* Dark gray background for contrast */
      padding: 2rem 5%;
    }

    .trusted-features .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .features-list {
      list-style: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 1.5rem;
    }

    .features-list li {
      display: flex;
      flex-direction: column;
      align-items: center;
      flex: 1 1 150px;
      color: #f1f1f1;
      text-align: center;
    }

    .features-list li i {
      font-size: 2rem;
      margin-bottom: 0.5rem;
      /* white icons */
      color: #e74c3c;
    }

    .features-list li span {
      font-size: 1rem;
      font-weight: 500;
      line-height: 1.3;
      color: #ccc;
      /* Softer text than pure white */
    }

    /* Responsive: stack on small */
    @media (max-width: 600px) {
      .features-list {
        flex-direction: column;
        gap: 0rem;
      }

      .features-list li {
        width: 100%;
      }
    }




    /* ------------------------------ */
    /*    REQUEST CHANNELS SECTION    */
    /* ------------------------------ */
    .request-channels {
      padding: 4rem 5%;
      background: #0a0a1a;
    }

    .request-channels .container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      gap: 3rem;
    }

    .channels-image {
      flex: 1;
      /* removed float animation to keep image static */
    }

    .channels-image img {
      width: 100%;
      max-width: 500px;
      border-radius: 10px;
      filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.3));
    }

    .channels-content {
      flex: 1;
      animation: slideInLeft 1s ease;
    }

    .channels-content h2 {
      font-size: 2.75rem;
      margin-bottom: 0.5rem;
      background: linear-gradient(45deg, #fff 0%, #ff6b6b 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .channels-content .underline {
      width: 60px;
      height: 3px;
      background: #c00a0a;
      border: none;
      margin: 1rem 0;
    }

    .channels-content p {
      color: #d1d1d1;
      font-size: 1.1rem;
      margin-bottom: 2rem;
    }

    .channels-list {
      list-style: none;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1.5rem 2rem;
    }

    .channels-list li {
      display: flex;
      align-items: flex-start;
      gap: 1rem;
      color: #fff;
    }

    .channels-list li i {
      font-size: 1.8rem;
      color: #c00a0a;
      margin-top: 4px;
    }

    .channels-list li strong {
      font-weight: 600;
    }

    .channels-list li br {
      content: '';
      margin-bottom: 0.25rem;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
      .request-channels .container {
        flex-direction: column-reverse;
        text-align: center;
      }

      .channels-list {
        grid-template-columns: 1fr;
      }

      .channels-list li {
        justify-content: center;
        text-align: center;
      }
    }



    /* ------------------------------ */
    /*      FULL WIDTH IMAGE SECTION  */
    /* ------------------------------ */
    .full-width-section {
      width: 100%;
      /* margin: 4rem 0; */
    }

    /* .image-container {
      width: 100%;
      height: auto;
      overflow: hidden;
    }

    .image-container img {
      width: 100%;
      height: auto;
      display: block;
      object-fit: cover;
      min-height: 400px;
      max-height: 600px;
    }

    @media (max-width: 768px) {
      .image-container img {
        min-height: 300px;
        max-height: 400px;
      }
    }

    @media (max-width: 480px) {
      .image-container img {
        min-height: 200px;
        max-height: 300px;
      }
    } */

    .image-container {
      width: 100%;
      height: auto;
      overflow: hidden;
      position: relative;
    }

    .image-container img {
      width: 100%;
      height: auto;
      display: block;
      object-fit: cover;
      min-height: 400px;
      max-height: 600px;
    }

    .top-blur-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to bottom,
          rgba(10, 10, 26, 0.95) 0%,
          rgba(10, 10, 26, 0.6) 30%,
          rgba(10, 10, 26, 0.3) 60%,
          transparent 100%);
      backdrop-filter: blur(3px);
      z-index: 1;
    }

    .content-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      z-index: 2;
      min-width: 500px;
      padding: 0 10px;
      /* background-color: #c00a0a; */
      color: white;
    }

    .content-overlay h2 {
      font-size: 2.75rem;
      margin-bottom: 1.5rem;
      background: linear-gradient(45deg, #fff 0%, #ff6b6b 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .content-overlay p {
      font-size: 1.1rem;
      margin-bottom: 1.5rem;
      line-height: 1.6;
      color: #f0f0f0;
    }

    .cta-button {
      display: inline-flex;
      align-items: center;
      gap: 0.8rem;
      background: #c00a0a;
      color: #ffffff;
      padding: 1rem 2rem;
      border-radius: 50px;
      font-weight: 600;
      margin-top: 1.5rem;
      transition: transform 0.3s ease;
      animation: pulse 2s infinite;
    }

    .cta-button:hover {
      transform: translateY(-3px);
    }

    @media (max-width: 768px) {
      .content-overlay h2 {
        font-size: 2rem;
        margin-bottom: 1rem;


      }

      .content-overlay p {
        font-size: 1rem;
        margin-bottom: 1rem;

      }

      .cta-button {
        padding: 0.8rem 1.5rem;
      }

      .image-container img {
        min-height: 300px;
        max-height: 400px;
      }

      .cta-button {
        margin-top: 0.3rem;
      }
    }

    @media (max-width: 480px) {
      .image-container img {
        min-height: 200px;
        max-height: 300px;
      }

      .content-overlay h2 {
        font-size: 2rem;
        margin-bottom: 0.8rem;
      }

      .content-overlay p {
        font-size: 1rem;
        margin-bottom: 0.8rem;
      }
    }


    /* HOW IT WORKS STYLES */
    .how-it-works {
      padding: 4rem 5%;
      background: #0a0a1a;
    }

    .how-it-works .container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      gap: 3rem;
    }

    .content-left {
      flex: 1;
      animation: slideInLeft 1s ease;
    }

    .content-left .underline {
      width: 60px;
      height: 3px;
      background: #c00a0a;
      border: none;
      margin: 1rem 0;
    }

    .content-left h2 {
      font-size: 2.75rem;
      background: linear-gradient(45deg, #fff 0%, #ff6b6b 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .steps-list {
      list-style: none;
      counter-reset: step-counter;
      padding: 2rem 0;
    }

    .steps-list li {
      counter-increment: step-counter;
      margin-bottom: 2rem;
      padding: 1.5rem;
      background: rgba(255, 255, 255, 0.05);
      border-left: 3px solid #c00a0a;
    }

    .steps-list li::before {
      content: counter(step-counter);
      font-size: 1.5rem;
      font-weight: 700;
      color: #c00a0a;
      margin-right: 1rem;
    }

    .steps-list li i {
      font-size: 1.8rem;
      color: #c00a0a;
      margin-right: 1rem;
    }

    .steps-list h3 {
      font-size: 1.3rem;
      margin-bottom: 0.5rem;

    }

    .animated-img {
      animation: float 3s ease-in-out infinite;
      filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.3));
    }

    @media (max-width: 992px) {
      .how-it-works .container {
        flex-direction: column;
      }

      .image-right {
        order: -1;
      }

      .steps-list li {
        padding: 1rem;
      }
    }

    @media (max-width: 768px) {
      .how-it-works {
        padding: 2rem 5%;
      }

      .steps-list li {
        margin-bottom: 1.5rem;
      }

      .steps-list h3 {
        font-size: 1.1rem;
      }

      .steps-list p {
        font-size: 0.9rem;
      }
    }
  </style>
</head>

<body>
  <!-- HEADER / NAVIGATION -->
  <header>
    <div class="logo">
      <img src="{{ asset('images/logo-transparent.png') }}" alt="Laravel Logo">
      HemoSphere
    </div>
    <nav class="nav-links">
      <a href="{{ route('account.login') }}">Login</a>
      <a href="{{ route('account.register') }}" class="emergency-btn">Register</a>


    </nav>
  </header>

  <!-- HERO SECTION -->
  <section class="hero">
    <!-- Left Side Text Content -->
    <div class="hero-content">
      <h2>Save Lives With Every Drop</h2>
      <p>
        Join HemoSphere in our mission to ensure no life is lost due to blood shortages.
        Connect with donors, find blood banks, and be part of a life-saving community.
      </p>

      <div class="features-grid">
        <div class="feature-card">
          <i class="fas fa-tint"></i>
          <h3>Blood Donation</h3>
          <p>Become a donor and save up to 3 lives with a single donation</p>
        </div>

        <div class="feature-card">
          <i class="fas fa-search-location"></i>
          <h3>Find Donors</h3>
          <p>Quickly locate nearby blood donors in emergency situations</p>
        </div>

        <div class="feature-card">
          <i class="fas fa-hospital"></i>
          <h3>Blood Bank Locator</h3>
          <p>Find nearest blood banks with real-time stock information</p>
        </div>

        <div class="feature-card">
          <i class="fas fa-ambulance"></i>
          <h3>Emergency Request</h3>
          <p>Immediate response system for critical blood needs</p>
        </div>
      </div>

      <a href="{{ route('account.login') }}">
        <button class="emergency-btn-lg">
          <i class="fas fa-bell"></i>
          Request Emergency Blood
        </button></a>
    </div>

    <!-- Right Side Image -->
    <div class="hero-image-container">
      <img src="{{ asset('images/blood.png') }}" alt="Blood Donation Illustration">
    </div>
  </section>




  {{-- ya yih code use krlo ya below wala code use krlo --}}
  {{-- <!-- TRUSTED FEATURES SECTION -->
  <section class="trusted-features">
    <div class="container">
      <ul class="features-list">
        <li>
          <i class="fas fa-user-friends"></i>
          <span>Native Human Translators</span>
        </li>
        <li>
          <i class="fas fa-book"></i>
          <span>Expert Domain Knowledge</span>
        </li>
        <li>
          <i class="fas fa-award"></i>
          <span>Quality and Experience</span>
        </li>
        <li>
          <i class="fas fa-rocket"></i>
          <span>Fastest Translation Service</span>
        </li>
        <li>
          <i class="fas fa-chart-line"></i>
          <span>Value For Money</span>
        </li>
      </ul>
    </div>
  </section> --}}

  <!-- TRUSTED FEATURES SECTION -->
  <section class="trusted-features">
    <div class="container">
      <ul class="features-list">
        <li>
          <i class="fas fa-user-check"></i>
          <span>Verified Donor Network</span>
        </li>
        <li>
          <i class="fas fa-tint"></i>
          <span>Real‑Time Blood Stock</span>
        </li>
        <li>
          <i class="fas fa-lock"></i>
          <span>Secure Data Handling</span>
        </li>
        <li>
          <i class="fas fa-clock"></i>
          <span>24/7 Emergency Support</span>
        </li>
        <li>
          <i class="fas fa-hands-helping"></i>
          <span>Community Impact</span>
        </li>
      </ul>
    </div>
  </section>



  <!-- REQUEST CHANNELS SECTION -->
  <section class="request-channels">
    <div class="container">
      <div class="channels-image">
        <img src="{{ asset('images/multi_request.png') }}" alt="How to Request Blood">
      </div>
      <div class="channels-content">
        <h2>Multiple Request Channels</h2>
        <hr class="underline" />
        <p>
          Whether you need urgent help or want to plan ahead, HemoSphere makes it easy to reach out:
        </p>
        <ul class="channels-list">
          <li class="feature-card">
            <i class="fas fa-phone-alt"></i>
            <strong>24/7 Hotline</strong><br>
            Instant voice support from our emergency team.
          </li>
          <li class="feature-card">
            <i class="fas fa-mobile-alt"></i>
            <strong>In‑App Chat</strong><br>
            Connect with nearby verified donors directly.
          </li>
          <li class="feature-card">
            <i class="fas fa-map-marker-alt"></i>
            <strong>Location Alerts</strong><br>
            Get notified when donors are around you.
          </li>
          <li class="feature-card">
            <i class="fas fa-envelope"></i>
            <strong>Email & SMS</strong><br>
            Receive confirmations and follow‑ups instantly.
          </li>
        </ul>
      </div>
    </div>
  </section>



  <!-- FULL-WIDTH IMAGE SECTION -->
  <section class="full-width-section">
    <div class="image-container">
      <div class="content-overlay">
        <h2>Need a Blood Donor Onsite?</h2>
        <p>With HemoSphere's upcoming release, you'll soon be able to request a verified blood donor directly to your
          location—whether you're at a hospital, clinic, or in an emergency situation.</p>
        <p>Easily schedule and manage donor visits through our mobile platform, giving you peace of mind when every
          second counts.</p>
        <a href="{{route('account.getBloodPost') }}" class="cta-button">
          <i class="fas fa-bell"></i>
          Notify Me When Available
        </a>
      </div>
      <div class="top-blur-overlay"></div>
      <img src="{{ asset('images/on_site_donor.jpg') }}" alt="Community Blood Donation Event">
    </div>
  </section>


  <!-- HOW IT WORKS SECTION -->
  <section class="how-it-works">
    <div class="container">
      <div class="content-left">
        <h2>How It Works</h2>
        <hr class="underline" />
        <ol class="steps-list">
          <li class="feature-card">
            <i class="fas fa-user-plus"></i>
            <div>
              <h3>Register & Verify</h3>
              <p>Create your account and complete our quick verification process to join the donor network</p>
            </div>
          </li>
          <li class="feature-card">
            <i class="fas fa-search"></i>
            <div>
              <h3>Find Match</h3>
              <p>Use our smart search to locate compatible donors or blood banks in your area</p>
            </div>
          </li>
          <li class="feature-card">
            <i class="fas fa-handshake"></i>
            <div>
              <h3>Connect & Schedule</h3>
              <p>Coordinate directly through our secure platform to arrange donation</p>
            </div>
          </li>
          <li class="feature-card">
            <i class="fas fa-heartbeat"></i>
            <div>
              <h3>Save Lives</h3>
              <p>Complete the donation process and receive impact updates about your contribution</p>
            </div>
          </li>
        </ol>
      </div>
      <div class="image-right channels-image">
        <img src="{{ asset('images/blood-donation(2).jpg') }}" alt="Blood Donation Process" class="animated-img" style="border-radius: 10px">
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 HemoSphere. All rights reserved.</p>
  </footer>
</body>

</html>