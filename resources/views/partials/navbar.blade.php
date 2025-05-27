<nav class="nav-container">
    <div class="logo"><a href="{{ route('account.dashboard') }}"><img src="{{ asset('images/logo-transparent.png') }}"
                alt="Laravel Logo">HEMOSPHERE</a></div>

    <!-- Hamburger Menu Button -->
    <button class="nav-toggle" aria-label="Toggle navigation">
        <span class="hamburger"></span>
    </button>

    <div class="nav-links">
        <!-- Existing links -->
        {{-- <a href="#" class="nav-link">User: {{Auth::user()->name}}</a> --}}
        {{-- <a href="{{ route('account.logout') }}" class="nav-link">LogOut</a> --}}
        <a href="{{ route('account.dashboard') }}" id="links" class="nav-link">Home</a>
        <a href="{{ route('account.help') }}" id="links" class="nav-link">Help Needed</a>
        <a href="{{route('account.getBloodPost') }}" id="links" class="nav-link">Need Blood</a>
        <a href="{{route('account.donateForm') }}" id="links" class="nav-link">Donate Blood</a>

        <!-- Profile Section -->
        <div class="profile-container">
            <div class="profile-circle">
                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Photo"
                        class="profile-img">
                @else
                    <img src="{{ asset('images/profile-pic.png') }}" alt="Default Profile Photo" class="profile-img">
                @endif
            </div>
            <div class="profile-dropdown">
                <a href="{{ route('account.profile') }}" class="dropdown-link">
                    <i class="fas fa-user"></i> My Profile
                </a>
                <a href="{{ route('account.logout') }}" class="dropdown-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Add these styles to your CSS */
    .nav-toggle {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 10px;
        position: absolute;
        right: 20px;
        top: 20px;
        z-index: 1000;
    }

    .hamburger {
        display: block;
        width: 25px;
        height: 3px;
        background: lightslategray;
        position: relative;
        transition: all 0.3s ease;
    }

    .hamburger::before,
    .hamburger::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: inherit;
        transition: all 0.3s ease;
    }

    .hamburger::before {
        top: -8px;
    }

    .hamburger::after {
        top: 8px;
    }

    /* Active state for hamburger */
    .nav-toggle.active .hamburger {
        background: #333;
    }

    .nav-toggle.active .hamburger::before {
        transform: rotate(45deg);
        top: 0;
    }

    .nav-toggle.active .hamburger::after {
        transform: rotate(-45deg);
        top: 0;
    }

    @media (max-width: 768px) {
        .nav-toggle {
            display: block;
        }

        .nav-links {
            position: fixed;
            top: 0;
            right: -100%;
            height: 100vh;
            width: 250px;
            background: lightblue;
            flex-direction: column;
            padding: 80px 20px 20px;
            transition: all 0.3s ease;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .nav-links.active {
            right: 0;
        }

        .profile-container {
            margin-top: auto;
            padding-top: 20px;
        }
    }
</style>

<script>
    // Add this JavaScript
    document.addEventListener('DOMContentLoaded', function () {
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelector('.nav-links');

        navToggle.addEventListener('click', function () {
            this.classList.toggle('active');
            navLinks.classList.toggle('active');
        });

        // Close menu when clicking outside on mobile
        document.addEventListener('click', function (event) {
            if (window.innerWidth <= 768) {
                if (!navLinks.contains(event.target) && !navToggle.contains(event.target)) {
                    navToggle.classList.remove('active');
                    navLinks.classList.remove('active');
                }
            }
        });

        // Close menu when clicking a nav link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    navToggle.classList.remove('active');
                    navLinks.classList.remove('active');
                }
            });
        });
    });
</script>


{{-- <nav class="nav-container">
    <div class="logo"><a href="{{ route('account.dashboard') }}"><img src="{{ asset('images/logo-transparent.png') }}"
                alt="Laravel Logo">HEMOSPHERE</a></div>
    <div class="nav-links">
        <!-- Existing links -->

        <a href="{{ route('account.dashboard') }}" id="links" class="nav-link">Home</a>
        <a href="{{ route('account.help') }}" id="links" class="nav-link">Help Needed</a>
        <a href="{{route('account.getBloodPost') }}" id="links" class="nav-link">Need Blood</a>
        <a href="{{route('account.donateForm') }}" id="links" class="nav-link">Donate Blood</a>


        <div class="profile-container">
            <div class="profile-circle">
                @if(Auth::user()->profile_picture)
                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Photo"
                    class="profile-img">
                @else
                <img src="{{ asset('images/profile-pic.png') }}" alt="Default Profile Photo" class="profile-img">
                @endif
            </div>
            <div class="profile-dropdown">
                <a href="{{ route('account.profile') }}" class="dropdown-link">
                    <i class="fas fa-user"></i> My Profile
                </a>
                <a href="{{ route('account.logout') }}" class="dropdown-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

    </div>
</nav> --}}