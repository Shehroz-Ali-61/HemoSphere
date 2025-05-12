<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HemoSphere - Forgot Password</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    /* Keep existing styles from login form */
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

    .forgot-container {
      background: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    .forgot-header {
      text-align: center;
      margin-bottom: 2rem;
    }

    .forgot-header h2 {
      color: #c00a0a;
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }

    .forgot-header p {
      color: #666;
      line-height: 1.5;
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

    input {
      width: 100%;
      padding: 12px 15px 12px 40px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: #c00a0a;
      box-shadow: 0 0 0 3px rgba(192, 10, 10, 0.1);
    }

    .reset-btn {
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

    .reset-btn:hover {
      background: #a00808;
    }

    .back-login {
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
      .forgot-container {
        margin: 1rem;
        padding: 1.5rem;
      }

      .forgot-header h2 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>

<body>
  <div class="forgot-container">
    <div class="forgot-header">
      <h2>Reset Your Password</h2>
      <p>Enter your email address and we'll send you a link to reset your password</p>
    </div>

    <form action="{{route('account.password.email')}}" class="forgot-form" method="post">
      @csrf
      <div class="form-group">
        <i class="fas fa-envelope"></i>
        <!-- Add name attribute to email input -->
        <input type="email" name="email" placeholder="Enter your email address" required>
      </div>

      <button type="submit" class="reset-btn">
        <i class="fas fa-paper-plane"></i>
        Send Reset Link
      </button>

      <p class="back-login">
        Remember your password? <a href="{{ route('account.login') }}" class="login-link">Sign In</a>
      </p>
    </form>
  </div>
</body>

</html>