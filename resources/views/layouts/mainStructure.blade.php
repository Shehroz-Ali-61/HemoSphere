<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hemosphere - Modern Blood Bank</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* Paste all your CSS here */
        /* -----------------------------
       1. Custom Variables
    ----------------------------- */
      :root {
        --neon-red: #ff2e63;
        --cyber-purple: #6b46c1;
        --dark-space: #0a0a12;
        --star-dust: #e2e8f0;
        --holographic: linear-gradient(45deg, #ff6b6b, #ff2e63, #6b46c1);
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        background: var(--dark-space);
        color: var(--star-dust);
        overflow-x: hidden;
      }

      /* -----------------------------
       2. Glowing Preloader
    ----------------------------- */
      .preloader {
        position: fixed;
        width: 100%;
        height: 100vh;
        /* background: var(--dark-space); */
        display: grid;
        place-items: center;
        z-index: 1000;
      }
      .pulse {
        /* width: 80px;
        height: 80px;
        background: var(--neon-red);
        border-radius: 50%;
        animation: pulse 1.2s infinite; */
      }
      @keyframes pulse {
        0% {
          box-shadow: 0 0 0 0 rgba(255, 46, 99, 0.7);
        }
        70% {
          box-shadow: 0 0 0 25px rgba(255, 46, 99, 0);
        }
        100% {
          box-shadow: 0 0 0 0 rgba(255, 46, 99, 0);
        }
      }

      /* -----------------------------
       3. Navigation
    ----------------------------- */
    /* Profile Dropdown */
    .profile-container {
        position: relative;
        /* margin-left: 1rem; */
    }

    .profile-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.3s ease;
        border: 2px solid rgba(255, 46, 99, 0.3);
    }

    .profile-circle:hover {
        transform: scale(1.1);
    }

    .profile-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-dropdown {
        position: absolute;
        right: 0;
        top: 50px;
        background: rgba(10, 10, 18, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 46, 99, 0.2);
        border-radius: 8px;
        padding: 1rem;
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .profile-dropdown.active {
        opacity: 1;
        visibility: visible;
        top: 55px;
    }

    .dropdown-link {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        color: var(--star-dust);
        padding: 0.8rem 1rem;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .dropdown-link:hover {
        background: rgba(255, 46, 99, 0.1);
        color: var(--neon-red);
    }

    .dropdown-link i {
        width: 20px;
        text-align: center;
    }



      /*  Ancers Navigation */
      .nav-container {
        position: fixed;
        top: 0;
        width: 100%;
        padding: 1.3rem 2%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: rgba(10, 10, 18, 0.95);
        backdrop-filter: blur(10px);
        z-index: 999;
        border-bottom: 1px solid rgba(255, 46, 99, 0.2);
      }
      .nav-container img{
        width: 40px;
        height: 40px;
        margin-bottom: -10px;
      }
      .logo {
        font-size: 2rem;
        font-weight: 800;
        /* Gradient Text */
        background: var(--holographic);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        color: transparent;
      }

      .nav-links {
        display: flex;
        gap: 1rem;
        /* background: rgba(23, 23, 152, 0.95); */
      }

      #links, .profile-container{
        margin-top: 10px;
      }

      .nav-link {
        color: var(--star-dust);
        text-decoration: none;
        font-weight: 500;
        position: relative;
        padding: 0.5rem 1rem;
        transition: 0.3s;
      }
      .nav-link::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background: var(--neon-red);
        transition: 0.3s;
      }
      .nav-link:hover::after {
        width: 100%;
      }

      /* -----------------------------
       4. Hero Section
    ----------------------------- */
      .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 0 5%;
        position: relative;
        overflow: hidden;
      }
      .hero::before {
        content: "";
        position: absolute;
        width: 600px;
        height: 600px;
        background: var(--holographic);
        border-radius: 50%;
        filter: blur(150px);
        opacity: 0.3;
        animation: float 6s infinite;
        top: 50%;
        left: 10%;
        transform: translateY(-50%);
        z-index: 0;
      }
      @keyframes float {
        0%,
        100% {
          transform: translateY(-50%) translateX(0);
        }
        50% {
          transform: translateY(-50%) translateX(20px);
        }
      }

      .hero-content {
        position: relative;
        z-index: 1;
        max-width: 800px;
      }

      .hero-title {
        font-size: 4rem;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        background: linear-gradient(45deg, #fff, var(--neon-red));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        color: transparent;
      }

      .hero-subtitle {
        font-size: 1.1rem;
        max-width: 600px;
        margin-bottom: 2rem;
        color: #cbd5e0;
      }

      .cta-container {
        display: flex;
        gap: 1.5rem;
        margin-top: 2rem;
      }

      .cta-btn {
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
        position: relative;
        overflow: hidden;
        display: inline-block;
      }
      .primary-cta {
        background: var(--holographic);
        color: white;
        border: 2px solid transparent;
      }
      .secondary-cta {
        border: 2px solid var(--neon-red);
        color: var(--neon-red);
      }
      .cta-btn::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        left: -100%;
        top: 0;
        transition: 0.3s;
      }
      .cta-btn:hover::after {
        left: 0;
      }

      /* Parallax-like effect (on mouse move) */
      /* We'll fix the transform usage here */
      /* The hero element will move slightly */
      @media (hover: none) {
        /* Disable parallax on touch devices for better performance */
        .hero {
          transform: none !important;
        }
      }

      /* -----------------------------
       5. "Donate Blood" Cards
          (2 or 3 featured cards below hero)
    ----------------------------- */
      .donate-cards-section {
        padding: 4rem 5%;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        background: rgba(255, 255, 255, 0.02);
      }
      .donate-card {
        position: relative;
        /* background: url('blood-donation(5).jpg') no-repeat center center / cover; */
        border-radius: 15px;
        padding: 2rem;
        transition: 0.3s;
        overflow: hidden;
      }
      .donate-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
      }
      .donate-card > * {
        position: relative;
        z-index: 2;
      }

      #first-card {
        background: url("/images/blood-donation(1).jpg") no-repeat center center / cover;
      }
      #second-card {
        background: url("/images/blood-donation(2).jpg") no-repeat center center / cover;
      }
      #third-card {
        background: url("/images/blood-donation(3).jpg") no-repeat center center / cover;
      }

      /* .donate-cards-section {
      padding: 4rem 5%;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
      background: rgba(255, 255, 255, 0.02);
    }
    .donate-card {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      padding: 2rem;
      border: 1px solid rgba(255, 46, 99, 0.1);
      transition: 0.3s;
    } */

      .donate-card:hover {
        transform: translateY(-5px);
        /* background: rgba(0, 0, 0, 0.9); */
        background: transparent;
      }
      .donate-card h3 {
        color: var(--neon-red);
        margin-bottom: 1rem;
      }
      .donate-card p {
        line-height: 1.5;
        margin-bottom: 1.5rem;
      }
      .donate-card .card-btn {
        margin-top: 1rem;
        display: inline-block;
        background: var(--neon-red);
        color: #fff;
        padding: 0.7rem 1.2rem;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
      }
      .donate-card .card-btn:hover {
        background: #ff5880;
      }

      /* -----------------------------
       6. Step-By-Step Guide 
    ----------------------------- */
      .process-section {
        padding: 4rem 5%;
      }
      .section-title {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
        background: linear-gradient(
          45deg,
          var(--neon-red),
          var(--cyber-purple)
        );
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        color: transparent;
      }
      .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 2rem;
      }
      .process-card {
        background: rgba(255, 255, 255, 0.05);
        padding: 2rem;
        border-radius: 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: 0.3s;
        border: 1px solid rgba(255, 46, 99, 0.1);
      }
      .process-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 46, 99, 0.1);
      }
      .process-number {
        position: absolute;
        top: -20px;
        right: -20px;
        font-size: 4rem;
        font-weight: 800;
        color: rgba(255, 255, 255, 0.05);
      }
      .process-icon {
        font-size: 2.5rem;
        color: var(--neon-red);
        margin: 1rem 0;
      }
      .process-card h3 {
        margin-bottom: 1rem;
        color: var(--neon-red);
      }

      /* -----------------------------
       7. "Donate Blood With HemoSphere"
          (Two-column layout: image + text)
    ----------------------------- */
      .donate-with-hemosphere {
        padding: 4rem 5%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        /* height: 100vh; */
        gap: 2rem;
        align-items: center;
        background: rgba(255, 255, 255, 0.02);
      }
      .donate-with-hemosphere img {
        width: 100%;
        border-radius: 10px;
        object-fit: cover;
      }
      .donate-info h2 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: var(--neon-red);
      }
      .donate-info p {
        line-height: 1.6;
        margin-bottom: 1.5rem;
      }
      @media (max-width: 992px) {
        .donate-with-hemosphere {
          grid-template-columns: 1fr;
        }
      }



      /* -----------------------------
       8. Eligibility Criteria
    ----------------------------- */
    .eligibility {
        padding: 4rem 5%;
        background: rgba(255, 255, 255, 0.02);
      }
      .eligibility-list {
        max-width: 800px;
        margin: 0 auto;
        list-style: inside;
        line-height: 1.8;
        margin-top: 2rem;
      }
      .eligibility-list li {
        margin-bottom: 1rem;
        padding-left: 0.5rem;
      }
      .eligibility h2{
        font-size: 2.5rem;

      }


      /* -----------------------------
       9. "Why Should You Donate Blood?"
    ----------------------------- */
      /* Two-column layout for "Why Should You Donate Blood?" */
      .why-donate-blood {
      padding: 0rem 5%;
      display: grid;
      /* background-color: red; */
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      align-items: center;
      /* background: rgba(255, 255, 255, 0.02); */
      /* background-color: greenyellow; */

    }
    .why-donate-blood img {
      width: 100%;
      border-radius: 10px;
      object-fit: cover;
    }
    .why-donate-content .pre-heading {
      font-size: 0.9rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 0.5rem;
      color: #c53030; /* or pick a color that fits your theme */
    }
    .why-donate-content h2 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: var(--neon-red);
    }
    .why-donate-content p {
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }
    @media (max-width: 992px) {
      .why-donate-blood {
        grid-template-columns: 1fr;
      }
      .why-donate-blood img {
        height: 90%;
      }
      .why-donate-content{
        margin-top: -50px;
      }
    }

      

      /* -----------------------------
       10. Final CTA 
    ----------------------------- */
      .final-cta {
        text-align: center;
        padding: 4rem 5%;
      }
      .final-cta h2 {
        font-size: 2.5rem;
        background: linear-gradient(45deg, #fff, var(--neon-red));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        color: transparent;
        margin-bottom: 1rem;
      }
      .final-cta p {
        max-width: 600px;
        margin: 0.5rem auto 2rem auto;
        line-height: 1.6;
      }
      .final-cta .cta-btn {
        font-size: 1.1rem;
      }

      /* -----------------------------
       11. Footer
    ----------------------------- */
      .cyber-footer {
        background: rgba(10, 10, 18, 0.95);
        border-top: 2px solid var(--neon-red);
        margin-top: 3rem;
      }
      .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 4rem 5%;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 3rem;
      }
      .footer-section {
        padding: 1rem;
      }
      .footer-heading {
        color: var(--neon-red);
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        position: relative;
        padding-bottom: 0.5rem;
      }
      .footer-heading::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 2px;
        background: var(--neon-red);
      }
      .footer-links li {
        margin: 1rem 0;
      }
      .footer-links a {
        color: var(--star-dust);
        text-decoration: none;
        transition: 0.3s;
      }
      .footer-links a:hover {
        color: var(--neon-red);
        padding-left: 0.5rem;
      }
      .contact-info li {
        margin: 1rem 0;
        display: flex;
        align-items: center;
        gap: 1rem;
      }
      .social-links {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
      }
      .social-icon {
        width: 40px;
        height: 40px;
        border: 1px solid var(--neon-red);
        border-radius: 50%;
        display: grid;
        place-items: center;
        color: var(--neon-red);
        transition: 0.3s;
      }
      .social-icon:hover {
        background: var(--neon-red);
        color: var(--dark-space);
      }
      .newsletter-form {
        margin-top: 1.5rem;
        display: flex;
        gap: 0.5rem;
      }
      .newsletter-form input {
        flex: 1;
        padding: 0.8rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--neon-red);
        color: var(--star-dust);
        border-radius: 30px;
      }
      .newsletter-form button {
        padding: 0.8rem 1.5rem;
        background: var(--neon-red);
        border: none;
        border-radius: 30px;
        color: white;
        cursor: pointer;
        transition: 0.3s;
      }
      .newsletter-form button:hover {
        transform: translateY(-2px);
      }
      .footer-bottom {
        text-align: center;
        padding: 2rem 5%;
        border-top: 1px solid rgba(255, 46, 99, 0.2);
      }
      .legal-links {
        margin-top: 1rem;
        display: flex;
        justify-content: center;
        gap: 2rem;
      }
      .legal-links a {
        color: var(--star-dust);
        text-decoration: none;
        font-size: 0.9rem;
      }

      /* -----------------------------
       12. Floating Emergency Button
    ----------------------------- */
      .emergency-float {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: var(--neon-red);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: grid;
        place-items: center;
        box-shadow: 0 0 25px rgba(255, 46, 99, 0.5);
        animation: pulse 1.5s infinite;
        cursor: pointer;
        z-index: 9999;
      }

      /* -----------------------------
       13. Responsive Tweaks
    ----------------------------- */
      @media (max-width: 768px) {
        .hero-title {
          font-size: 2.5rem;
        }
        .hero {
          min-height: 80vh;
        }
        .nav-links {
          display: none;
        }
        .donate-with-hemosphere {
          grid-template-columns: 1fr;
        }
      }
    </style>




</head>
<body>

{{-- <div class="hero"></div> --}}
    <!-- Preloader -->
    <div class="preloader">
        <div class="pulse"></div>
    </div>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Emergency Float -->
    <div class="emergency-float">
        <i class="fas fa-bolt"></i>
    </div>

    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      // Initialize animations
      AOS.init({
        duration: 1000,
        once: true,
      });

      // Remove preloader once page loads
      window.addEventListener("load", () => {
        document.querySelector(".preloader").style.display = "none";
      });

      // Parallax effect on mouse move
      document.addEventListener("mousemove", (e) => {
        const hero = document.querySelector(".hero");
        // The further away from center, the greater the offset
        const x = (window.innerWidth / 2 - e.pageX) / 60;
        const y = (window.innerHeight / 2 - e.pageY) / 60;
        hero.style.transform = `translate(${x}px, ${y}px)`;
      });

      // Newsletter form submission
      document
        .querySelector(".newsletter-form")
        .addEventListener("submit", (e) => {
          e.preventDefault();
          const email = e.target.querySelector("input").value;
          alert("Thank you for subscribing!");
          e.target.reset();
        });

      // Example tooltip init (if using Tippy.js)
      // tippy('.social-icon', {
      //   content: (reference) => reference.querySelector('i').className.replace('fab fa-', ''),
      //   placement: 'bottom'
      // });




        /* Profile Dropdown */
      document.addEventListener('DOMContentLoaded', function() {
        const profileContainer = document.querySelector('.profile-container');
        const profileDropdown = document.querySelector('.profile-dropdown');

        // Toggle dropdown
        profileContainer.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!profileContainer.contains(e.target)) {
                profileDropdown.classList.remove('active');
            }
        });

        // Close dropdown when clicking a link
        document.querySelectorAll('.dropdown-link').forEach(link => {
            link.addEventListener('click', () => {
                profileDropdown.classList.remove('active');
            });
        });
    });
    </script>
</body>
</html>