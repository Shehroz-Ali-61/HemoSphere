{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Data</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
    <style>
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

      /* -----------------------------
         2. General Styles
      ----------------------------- */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }
      body {
        background: var(--dark-space);
        color: var(--star-dust);
        padding: 20px;
      }

      h1 {
        text-align: center;
        margin-bottom: 1rem;
      }

      .edit-container {
        max-width: 500px;
        margin: 2rem auto;
        padding: 2rem;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 46, 99, 0.5);
      }

      /* -----------------------------
         3. Form Element Styles
      ----------------------------- */
      form {
        display: flex;
        flex-direction: column;
      }
      form input[type="text"],
      form input[type="email"],
      form input[type="password"] {
        width: 100%;
        padding: 0.75rem;
        margin-top: 0.25rem;
        margin-bottom: 1rem;
        border: 1px solid var(--neon-red);
        border-radius: 5px;
        background: rgba(255, 255, 255, 0.05);
        color: var(--star-dust);
      }
      form label {
        margin-top: 1rem;
        font-size: 0.9rem;
      }
      form button,
      form a {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.75rem 1.5rem;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        transition: 0.3s;
        border: 1px solid var(--neon-red);
        color: var(--star-dust);
        background: transparent;
      }
      form button:hover,
      form a:hover {
        background: var(--neon-red);
        color: var(--dark-space);
      }
      /* Adjust spacing for individual password sections */
      .form-group {
        margin-bottom: 1rem;
      }
    </style>
  </head>
  <body>
    <div class="edit-container">
      <h1>Edit Data</h1>

      <form action="{{ route('admin.user.update', $usersEdit->id) }}" method="post">
          @csrf
          @method('PUT')
          <input type="text" name="name" value="{{ old('name', $usersEdit->name) }}" placeholder="Name">
          <input type="email" name="email" value="{{ old('email', $usersEdit->email) }}" placeholder="Email">

          <!-- Password Update Fields -->
          <div class="form-group">
            <label for="current_password">Current Password (leave blank to keep unchanged):</label>
            <input type="password" name="current_password" id="current_password" placeholder="Current Password">
          </div>

          <div class="form-group">
            <label for="new_password">New Password (optional):</label>
            <input type="password" name="new_password" id="new_password" placeholder="New Password">
          </div>

          <div class="form-group">
            <label for="new_password_confirmation">Confirm New Password:</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm New Password">
          </div>
          
          <button type="submit">Update</button>
          <a href="{{ route('admin.panel') }}">Cancel</a>
      </form>
    </div>
  </body>
</html> --}}










<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Data</title>
    <!-- Font Awesome for icons (if needed) -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts for Poppins -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
    <style>
      /* -----------------------------
         1. Custom Variables
      ----------------------------- */
      :root {
        --primary-color: #00adb5;
        --secondary-color: #393e46;
        --accent-color: #eeeeee;
        --background-dark: #222831;
        --highlight-gradient: linear-gradient(45deg, #00adb5, #008891);
      }

      /* -----------------------------
         2. Global Styles
      ----------------------------- */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      html {
        font-size: 16px;
      }
      body {
        background: var(--secondary-color);
        color: var(--accent-color);
        font-family: 'Poppins', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
      }
      h1 {
        text-align: center;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
      }

      /* -----------------------------
         3. Form Container
      ----------------------------- */
      .edit-container {
        width: 100%;
        max-width: 500px;
        background: var(--background-dark);
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        padding: 2rem;
      }

      /* -----------------------------
         4. Form Elements
      ----------------------------- */
      form {
        display: flex;
        flex-direction: column;
      }
      form input[type="text"],
      form input[type="email"],
      form input[type="password"] {
        width: 100%;
        padding: 0.75rem;
        margin-top: 0.5rem;
        margin-bottom: 1rem;
        border: 1px solid var(--primary-color);
        border-radius: 5px;
        background: var(--secondary-color);
        color: var(--accent-color);
      }
      form label {
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
      }
      .form-group {
        margin-bottom: 1.2rem;
      }
      form button,
      form a.button {
        padding: 0.75rem 1.5rem;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        transition: background 0.3s ease, color 0.3s ease;
        font-size: 1rem;
        margin-top: 1rem;
      }
      form button {
        background: var(--primary-color);
        border: none;
        color: #fff;
      }
      form button:hover {
        background: #008891;
      }
      form a.button {
        background: transparent;
        border: 1px solid var(--primary-color);
        color: var(--accent-color);
      }
      form a.button:hover {
        background: var(--primary-color);
        color: #fff;
      }

      /* -----------------------------
         5. Responsiveness
      ----------------------------- */
      @media (max-width: 600px) {
        .edit-container {
          padding: 1.5rem;
        }
        h1 {
          font-size: 1.25rem;
        }
        form button,
        form a.button {
          font-size: 0.9rem;
          padding: 0.65rem 1.2rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="edit-container">
      <h1>Edit Data</h1>

      <form action="{{ route('admin.user.update', $usersEdit->id) }}" method="post">
        @csrf
        @method('PUT')
        <input
          type="text"
          name="name"
          value="{{ old('name', $usersEdit->name) }}"
          placeholder="Name"
        />
        <input
          type="email"
          name="email"
          value="{{ old('email', $usersEdit->email) }}"
          placeholder="Email"
        />

        <!-- Password Update Fields -->
        <div class="form-group">
          <label for="current_password">Current Password (leave blank to keep unchanged):</label>
          <input
            type="password"
            name="current_password"
            id="current_password"
            placeholder="Current Password"
          />
        </div>

        <div class="form-group">
          <label for="new_password">New Password (optional):</label>
          <input
            type="password"
            name="new_password"
            id="new_password"
            placeholder="New Password"
          />
        </div>

        <div class="form-group">
          <label for="new_password_confirmation">Confirm New Password:</label>
          <input
            type="password"
            name="new_password_confirmation"
            id="new_password_confirmation"
            placeholder="Confirm New Password"
          />
        </div>

        <button type="submit">Update</button>
        <a class="button" href="{{ route('admin.panel') }}">Cancel</a>
      </form>
    </div>
  </body>
</html>















{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
    <style>
      /* -----------------------------
         1. Custom Variables
      ----------------------------- */
      :root {
        --primary: #6366f1;
        --secondary: #a855f7;
        --dark: #0f172a;
        --light: #f8fafc;
        --success: #22c55e;
        --danger: #ef4444;
        --glass: rgba(255, 255, 255, 0.05);
      }

      /* -----------------------------
         2. General Styles
      ----------------------------- */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: var(--light);
        min-height: 100vh;
        padding: 20px;
        display: grid;
        place-items: center;
      }

      h1 {
        text-align: center;
        margin-bottom: 2rem;
        font-size: 2rem;
        background: linear-gradient(to right, #fff 45%, #cbd5e1);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
      }

      .edit-container {
        width: 100%;
        max-width: 600px;
        background: var(--glass);
        backdrop-filter: blur(12px);
        border-radius: 16px;
        padding: 2.5rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        margin: 1rem;
      }

      /* -----------------------------
         3. Form Element Styles
      ----------------------------- */
      form {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
      }

      .input-group {
        position: relative;
      }

      form input {
        width: 100%;
        padding: 1rem 1rem 1rem 3rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        background: rgba(0, 0, 0, 0.1);
        color: var(--light);
        font-size: 1rem;
        transition: all 0.3s ease;
      }

      form input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
      }

      form input::placeholder {
        color: #94a3b8;
      }

      .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.6);
      }

      .password-section {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
      }

      .password-section h3 {
        margin-bottom: 1rem;
        color: var(--light);
        font-size: 1.1rem;
      }

      .button-group {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
      }

      form button,
      form a {
        flex: 1;
        padding: 1rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
      }

      form button {
        background: var(--primary);
        color: var(--light);
      }

      form button:hover {
        background: #4f46e5;
        transform: translateY(-2px);
      }

      form a {
        background: rgba(255, 255, 255, 0.1);
        color: var(--light);
        text-decoration: none;
      }

      form a:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
      }

      /* -----------------------------
         4. Error Messages
      ----------------------------- */
      .error-message {
        color: var(--danger);
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }

      /* -----------------------------
         5. Responsive Design
      ----------------------------- */
      @media (max-width: 768px) {
        .edit-container {
          padding: 1.5rem;
        }

        h1 {
          font-size: 1.75rem;
        }

        .button-group {
          flex-direction: column;
        }
      }

      @media (max-width: 480px) {
        body {
          padding: 10px;
        }

        .edit-container {
          padding: 1.25rem;
          border-radius: 12px;
        }

        form input {
          padding: 0.875rem 0.875rem 0.875rem 2.5rem;
        }

        .input-icon {
          font-size: 0.875rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="edit-container">
      <h1>Edit Profile</h1>

      <form action="{{ route('admin.user.update', $usersEdit->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <div class="input-group">
          <i class="fas fa-user input-icon"></i>
          <input type="text" name="name" value="{{ old('name', $usersEdit->name) }}" placeholder="Full Name">
          @error('name')
            <div class="error-message">
              <i class="fas fa-exclamation-circle"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="input-group">
          <i class="fas fa-envelope input-icon"></i>
          <input type="email" name="email" value="{{ old('email', $usersEdit->email) }}" placeholder="Email Address">
          @error('email')
            <div class="error-message">
              <i class="fas fa-exclamation-circle"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="password-section">
          <h3>Password Update</h3>
          
          <div class="input-group">
            <i class="fas fa-lock input-icon"></i>
            <input type="password" name="current_password" placeholder="Current Password">
            @error('current_password')
              <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="input-group">
            <i class="fas fa-key input-icon"></i>
            <input type="password" name="new_password" placeholder="New Password">
            @error('new_password')
              <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="input-group">
            <i class="fas fa-check-circle input-icon"></i>
            <input type="password" name="new_password_confirmation" placeholder="Confirm New Password">
          </div>
        </div>

        <div class="button-group">
          <button type="submit">
            <i class="fas fa-save"></i>
            Update Profile
          </button>
          <a href="{{ route('admin.panel') }}">
            <i class="fas fa-times"></i>
            Cancel
          </a>
        </div>
      </form>
    </div>
  </body>
</html> --}}