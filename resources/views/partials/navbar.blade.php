{{-- <!-- Navigation -->
<nav class="nav-container">
      
    <div class="logo"><img src="{{ asset('images/logo-transparent.png') }}" alt="Laravel Logo">
      HEMOSPHERE</div>
    <div class="nav-links">
      <a href="#" class="nav-link">User: {{Auth::user()->name}}</a>

      <a href="{{ route('account.logout') }}" class="nav-link">LogOut</a>
      <a href="{{ route('account.dashboard') }}" class="nav-link">Home</a>
      <a href="#" class="nav-link">Help Needed</a>
      <a href="{{route('account.getBloodPost') }}" class="nav-link ">Need Blood</a>
      <a href="{{route('account.donateForm') }}"  class="nav-link ">Donate Blood</a>

      
    </div>
  </nav> --}}





  <nav class="nav-container">
    <div class="logo"><a href="{{ route('account.dashboard') }}"><img src="{{ asset('images/logo-transparent.png') }}" alt="Laravel Logo">HEMOSPHERE</a></div>
    <div class="nav-links">
        <!-- Existing links -->
        {{-- <a href="#" class="nav-link">User: {{Auth::user()->name}}</a> --}}
        {{-- <a href="{{ route('account.logout') }}" class="nav-link">LogOut</a> --}}
        <a href="{{ route('account.dashboard') }}" id="links" class="nav-link">Home</a>
        <a href="#" id="links" class="nav-link">Help Needed</a>
        <a href="{{route('account.getBloodPost') }}" id="links" class="nav-link">Need Blood</a>
        <a href="{{route('account.donateForm') }}" id="links" class="nav-link">Donate Blood</a>

        <!-- Profile Section -->
        <div class="profile-container">
            <div class="profile-circle">
                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Photo" class="profile-img">
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