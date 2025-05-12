<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HemoSphere - Login</title>
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

    .login-container {
      background: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    .login-header {
      text-align: center;
      margin-bottom: 2rem;
    }

    .login-header h2 {
      color: #c00a0a;
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }

    .login-header p {
      color: #666;
    }

    .form-group {
      margin-bottom: 1.2rem;
      position: relative;
      max-width: 100%;
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
      z-index: 2;
      justify-self: right;
    }

    input {
      width: 100%;
      padding: 12px 15px 12px 40px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: 0.3s ease;
      padding-right: 40px;
    }

    input:focus {
      outline: none;
      border-color: #c00a0a;
      box-shadow: 0 0 0 3px rgba(192, 10, 10, 0.1);
    }

    .login-btn {
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

    .login-btn:hover {
      background: #a00808;
    }

    .additional-links {
      display: flex;
      justify-content: space-between;
      margin-top: 1.5rem;
      color: #666;
    }

    .link {
      color: #c00a0a;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s ease;
    }

    .link:hover {
      opacity: 0.9;
    }

    @media (max-width: 480px) {
      .login-container {
        margin: 1rem;
        padding: 1.5rem;
      }

      .login-header h2 {
        font-size: 1.5rem;
      }

      .additional-links {
        flex-direction: column;
        gap: 0.8rem;
        text-align: center;
      }
    }

    .logo img {
      width: 40px;
      height: 40px;
      margin-bottom: -10px;
    }

    footer {
      text-align: center;
      color: #d1d1d1;
      /* margin-top: 20px; */
      position: relative;
      top: 10px;
    }
  </style>
 
</head>

<body>
  <div class="login-container">
    <div class="login-header">
      {{-- <h2>Welcome Back</h2> --}}
      <h2>
        <div class="logo">
          <img src="{{ asset('images/logo-transparent.png') }}" alt="Laravel Logo">
          Welcome Back
        </div>
      </h2>
      <p>Sign in to continue saving lives</p>
    </div>

    <form action="{{ route('account.authenticate') }}" class="login-form" method="POST">
      @csrf
      <div class="form-group">
        <i class="fas fa-envelope"></i>
        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}">
        @error('email')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <i class="fas fa-lock"></i>
        <input type="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password" name="password" id="password">
        @error('password')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <i class="fas fa-eye password-toggle" id="togglePassword"></i>
      </div>
      @if(Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}"></div>
      @endif

      @if(Session::has('error'))
      <div class="alert alert-danger">{{ Session::get('error') }}"></div>
      @endif

      <button type="submit" class="login-btn">
        <i class="fas fa-sign-in-alt"></i>
        Sign In
      </button>


      <div class="additional-links">
        <a href="{{ route('account.password.request') }}" class="link">Forgot Password?</a>
        <a href="{{ route('account.register') }}" class="link">Create New Account</a>
      </div>
    </form>

    <footer>
      <p>&copy; 2025 HemoSphere. All rights reserved.</p>
    </footer>
  </div>
</body>

<script>
  // History manipulation
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

@auth
  <script>
    window.location.href = "{{ route('account.dashboard') }}";
  </script>
@endauth

<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function(e) {
    // Toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    // Toggle the eye icon
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
  });
</script>

</html>