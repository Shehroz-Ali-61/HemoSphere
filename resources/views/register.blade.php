<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HemoSphere - Registration</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .registration-container {
      background: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 500px;
    }

    .registration-header {
      text-align: center;
      margin-bottom: 2rem;
    }

    .registration-header h2 {
      color: #c00a0a;
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }

    .registration-header p {
      color: #666;
    }

    .form-group {
      margin-bottom: 1.2rem;
      position: relative;
    }

    .form-group i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #c00a0a;
    }

    .password-toggle {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #666;
      cursor: pointer;
      justify-self: right;
    }

    input, select {
      width: 100%;
      padding: 12px 15px 12px 40px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: 0.3s ease;
    }

    input:focus, select:focus {
      outline: none;
      border-color: #c00a0a;
      box-shadow: 0 0 0 3px rgba(192,10,10,0.1);
    }

    .register-btn {
      background: #c00a0a;
      color: white;
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s ease;
      margin-top: 1rem;
    }

    .register-btn:hover {
      background: #a00808;
    }

    .existing-account {
      text-align: center;
      margin-top: 1.5rem;
      color: #666;
    }

    .login-link {
      color: #c00a0a;
      font-weight: 500;
      text-decoration: none;
    }

    @media (max-width: 480px) {
      .registration-container {
        margin: 1rem;
        padding: 1.5rem;
      }
      
      .registration-header h2 {
        font-size: 1.5rem;
      }
    }

    .logo img{
      width: 40px;
      height: 40px;
      margin-bottom: -10px;
    }

    footer{
        text-align: center;
        color: #d1d1d1;
        position: relative;
        top: 10px;
    }

    .profile-img {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 1rem;
    }

    .profile-img input[type="file"] {
      display: none;
    }

    .profile-img label {
      padding: 10px 20px;
      background: #c00a0a;
      color: white;
      cursor: pointer;
      border-radius: 5px;
    }

    .profile-img img {
      max-width: 100px;
      max-height: 100px;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="registration-container">
    <div class="registration-header">
      <h2>
        <div class="logo">
          <img src="{{ asset('images/logo-transparent.png') }}" alt="Laravel Logo">
          Join HemoSphere
        </div>
      </h2>
      <p>Create your account</p>
    </div>

    <!-- Profile Picture Field -->
    <form action="{{ route('account.processRegister') }}" class="registration-form" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="profile-img">
        <label for="profile_picture">Upload Profile Picture</label>
        <input type="file" name="profile_picture" id="profile_picture">
        <!-- Optionally, you can display a preview image here -->
        <img id="profilePreview" src="" alt="Profile Preview" style="display: none;">
      </div>

      <div class="form-group">
        <i class="fas fa-user"></i>
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="User Name" name="name" value="{{ old('name') }}">
        @error('name')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <i class="fas fa-envelope"></i>
        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}">
        @error('email')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <i class="fas fa-lock"></i>
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password">
        @error('password')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <i class="fas fa-eye password-toggle" id="togglePassword"></i>
      </div>
      
      <div class="form-group">
        <i class="fas fa-lock"></i>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
        @error('password_confirmation')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <i class="fas fa-eye password-toggle" id="toggleConfirmPassword"></i>
      </div>

      <button type="submit" class="register-btn">
        <i class="fas fa-heartbeat"></i>
        Register Now
      </button>

      <p class="existing-account">
        Already have an account? <a href="{{ route('account.login') }}" class="login-link">Sign In</a>
      </p>
    </form>
    <footer>
      <p>&copy; 2025 HemoSphere. All rights reserved.</p>
    </footer>
  </div>

<script>
  // Toggle for password field
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');
  const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
  const confirmPassword = document.querySelector('#password_confirmation');

  togglePassword.addEventListener('click', function() {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
  });

  toggleConfirmPassword.addEventListener('click', function() {
    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPassword.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
  });

  // Optional: Preview selected profile picture
  const profileInput = document.getElementById('profile_picture');
  const profilePreview = document.getElementById('profilePreview');

  profileInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      profilePreview.src = URL.createObjectURL(file);
      profilePreview.style.display = 'block';
    } else {
      profilePreview.style.display = 'none';
    }
  });
</script>

</body>
</html>
