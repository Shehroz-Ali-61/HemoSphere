<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HemoSphere - Edit Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <style>
    /* ------------------------------ */
    /*          GLOBAL STYLES         */
    /* ------------------------------ */
      :root {
        --hemo-red: #c00a0a;
        --hemo-dark: #0a0a1a;
        --hemo-light: #f1f1f1;
        --hemo-gradient: linear-gradient(135deg, #0a0a1a 0%, #1a0a0a 100%);
        --holographic: linear-gradient(45deg, #ff6b6b, #ff2e63, #6b46c1);

      }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    }

    body {
      background: linear-gradient(135deg, #0a0a1a 0%, #1a0a0a 100%);
      color: #ffffff;
      line-height: 1.6;
      min-height: 100vh;
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
      /* background: rgba(10, 10, 26, 0.95); */
      background: rgba(14, 14, 35, 0.95);
      backdrop-filter: blur(10px);
      z-index: 1000;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    

    .logo {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .logo span { 
      font-size: 2rem;
      font-weight: 800;
      background: var(--holographic);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      text-transform: uppercase;
    }

    .logo img {
      width: 40px;
      height: 40px;
      margin-bottom: -5px;
    }

    /* Back to dashbord btn */
    .btn {
      padding: 0.8rem 1.5rem;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.1);
      color: var(--hemo-light);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(192, 10, 10, 0.3);
    }

    /* ------------------------------ */
    /*         PROFILE CONTAINER      */
    /* ------------------------------ */
    .edit-profile-container {
      max-width: 800px;
      margin: 120px auto 40px;
      padding: 2.5rem;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      backdrop-filter: blur(10px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 2rem;
      font-size: 2.5rem;
      background: linear-gradient(45deg, #fff 0%, #ff6b6b 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      position: relative;
    }

    h1::after {
      content: '';
      display: block;
      width: 60px;
      height: 4px;
      background: #c00a0a;
      margin: 0.5rem auto;
      border-radius: 2px;
    }

    /* ------------------------------ */
    /*         FORM ELEMENTS          */
    /* ------------------------------ */
    .form-group {
      margin-bottom: 1.5rem;
      position: relative;
    }

    label {
      display: block;
      margin-bottom: 0.75rem;
      font-weight: 500;
      color: #d1d1d1;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 1rem;
      background: rgba(255, 255, 255, 0.05);
      border: 2px solid rgba(255, 255, 255, 0.1);
      border-radius: 8px;
      color: #fff;
      transition: all 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: #c00a0a;
      box-shadow: 0 0 0 3px rgba(192, 10, 10, 0.2);
    }

    /* ------------------------------ */
    /*       IMAGE UPLOAD STYLING     */
    /* ------------------------------ */
    .image-upload-wrapper {
      padding: 2rem;
      border: 2px dashed rgba(255, 255, 255, 0.2);
      border-radius: 12px;
      text-align: center;
      transition: all 0.3s ease;
      position: relative;
    }

    .image-upload-wrapper:hover {
      border-color: #c00a0a;
      background: rgba(192, 10, 10, 0.05);
    }

    .profile-image {
      width: 200px;
      height: 200px;
      border-radius: 10px;
      object-fit: cover;
      margin-bottom: 1rem;
      border: 3px solid #c00a0a;
    }

    .file-input {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      cursor: pointer;
    }

    /* ------------------------------ */
    /*         BUTTON STYLING         */
    /* ------------------------------ */
    .button-group {
      display: flex;
      gap: 1rem;
      margin-top: 2rem;
      flex-wrap: wrap;
    }

    button {
      flex: 1;
      padding: 1rem 2rem;
      border: none;
      border-radius: 8px;
      background: #c00a0a;
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      min-width: 200px;
    }

    button:hover {
      background: #a00808;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(192, 10, 10, 0.3);
    }

    .button-link {
      flex: 1;
      padding: 1rem 2rem;
      border: 2px solid #c00a0a;
      border-radius: 8px;
      background: transparent;
      color: #c00a0a;
      text-align: center;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .button-link:hover {
      background: #c00a0a;
      color: white;
      transform: translateY(-2px);
    }

    /* ------------------------------ */
    /*       RESPONSIVE DESIGN        */
    /* ------------------------------ */
    @media (max-width: 768px) {
      .edit-profile-container {
        padding: 1.5rem;
        margin: 100px 1rem 2rem;
      }

      h1 {
        font-size: 2rem;
      }

      .button-group {
        flex-direction: column;
      }

      button, .button-link {
        width: 100%;
        min-width: auto;
      }

      .profile-image {
        width: 150px;
        height: 150px;
      }
    }

    @media (max-width: 480px) {
      .image-upload-wrapper {
        padding: 1rem;
      }

      h1 {
        font-size: 1.75rem;
      }
    }
    @media (max-width: 600px) {
      .logo span { 
        font-size: 1.5rem;
      }
      .btn{
        font-size: 0.8rem;
        padding: 0.6rem 1.2rem;
      }
    }

    /* ------------------------------ */
    /*     VALIDATION & UTILITIES     */
    /* ------------------------------ */
    .password-note {
      font-size: 0.85rem;
      color: #a0a0a0;
      margin-top: 0.5rem;
      display: block;
    }

    input:invalid:not(:placeholder-shown) {
      border-color: #ff4444;
    }

    input:valid:not(:placeholder-shown) {
      border-color: #00c851;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="{{ asset('images/logo-transparent.png') }}" alt="HemoSphere Logo">
      <span>HemoSphere</span>
    </div>
    <nav>
      <a href="{{ route('account.dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
      </a>
    </nav>
  </header>

  <div class="edit-profile-container">
    <h1>Edit Profile</h1>

    <form action="{{ route('account.editUserProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group image-upload-wrapper">
        @if($user->profile_picture)
          <img src="{{ asset('storage/' . $user->profile_picture) }}" class="profile-image" alt="Profile Image">
        @else
          <div class="upload-prompt">
            <i class="fas fa-user-circle fa-3x" style="color: #c00a0a; margin-bottom: 1rem;"></i>
            <p>Click to upload profile photo</p>
          </div>
        @endif
        <input type="file" name="profile_picture" class="file-input">
        <small class="password-note">Max file size 5MB • Recommended ratio 1:1</small>
      </div>
      
      <div class="form-group">
        <label><i class="fas fa-user-tag"></i> Full Name:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter your full name">
      </div>
      
      <div class="form-group">
        <label><i class="fas fa-envelope"></i> Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="your.email@example.com">
      </div>
      
      <div class="form-group">
        <label><i class="fas fa-lock"></i> Current Password:</label>
        <input type="password" name="current_password" placeholder="Enter current password">
        <small class="password-note">Leave blank to keep unchanged</small>
      </div>
      
      <div class="form-group">
        <label><i class="fas fa-key"></i> New Password:</label>
        <input type="password" name="new_password" placeholder="Enter new password">
      </div>
      
      <div class="form-group">
        <label><i class="fas fa-key"></i> Confirm New Password:</label>
        <input type="password" name="new_password_confirmation" placeholder="Confirm new password">
      </div>
      
      <div class="button-group">
        <button type="submit">
          <i class="fas fa-save"></i> Update Profile
        </button>
        <a class="button-link" href="{{ route('account.profile') }}">
          <i class="fas fa-times"></i> Cancel
        </a>
      </div>
    </form>
  </div>
</body>
</html>