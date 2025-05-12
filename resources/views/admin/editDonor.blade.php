<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Donor</title>
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
         2. Global Styles
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

      /* -----------------------------
         3. Container for the Form
      ----------------------------- */
      .edit-donor-container {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 46, 99, 0.5);
      }

      /* -----------------------------
         4. Form Element Styles
      ----------------------------- */
      form {
        display: flex;
        flex-direction: column;
      }
      form input[type="text"],
      form input[type="email"],
      form input[type="file"] {
        width: 100%;
        padding: 0.75rem;
        margin: 0.5rem 0;
        border: 1px solid var(--neon-red);
        border-radius: 5px;
        background: rgba(255, 255, 255, 0.05);
        color: var(--star-dust);
      }
      form label {
        margin-top: 1rem;
        font-size: 0.9rem;
      }
      .form-group {
        margin-bottom: 1rem;
      }
      form small {
        display: block;
        margin-top: 5px;
        font-size: 0.8rem;
        color: var(--star-dust);
      }

      /* -----------------------------
         5. Error Message Styles
      ----------------------------- */
      .alert {
        background: rgba(255, 46, 99, 0.1);
        padding: 1rem;
        border: 1px solid var(--neon-red);
        border-radius: 5px;
        margin: 1rem 0;
      }

      /* -----------------------------
         6. Button and Link Styles
      ----------------------------- */
      button,
      a.button-link {
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
      button:hover,
      a.button-link:hover {
        background: var(--neon-red);
        color: var(--dark-space);
      }
      button {
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="edit-donor-container">
      <h1>Edit Donor</h1>
      <form action="{{ route('admin.donor.update', $donorsEdit->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <input type="text" name="fullName" value="{{ old('fullName', $donorsEdit->fullName) }}" placeholder="Full Name">
        <input type="text" name="phone" value="{{ old('phone', $donorsEdit->phone) }}" placeholder="Phone">
        <input type="text" name="age" value="{{ old('age', $donorsEdit->age) }}" placeholder="Age">
        <input type="text" name="bloodType" value="{{ old('bloodType', $donorsEdit->bloodType) }}" placeholder="Blood Type">
        <input type="text" name="address" value="{{ old('address', $donorsEdit->address) }}" placeholder="Address">
        <input type="text" name="city" value="{{ old('city', $donorsEdit->city) }}" placeholder="City">
        <input type="text" name="message" value="{{ old('message', $donorsEdit->message) }}" placeholder="Message">

        <!-- Existing Image Display -->
        <div class="form-group">
          <label>Current Image:</label><br>
          @if($donorsEdit->image)
            <img src="{{ asset('storage/' . $donorsEdit->image) }}" alt="Donor Image" style="max-width:200px; display:block; margin:10px 0;">
          @else
            <p>No image uploaded</p>
          @endif
          <input type="file" name="image" class="form-control">
          <small>Leave blank to keep existing image</small>
        </div>

        <!-- Existing Medical Certificate Display -->
        <div class="form-group">
          <label>Current Medical Certificate:</label><br>
          @if($donorsEdit->medicalCertificate)
            <img src="{{ asset('storage/' . $donorsEdit->medicalCertificate) }}" alt="Medical Certificate" style="max-width:200px; display:block; margin:10px 0;">
          @else
            <p>No certificate uploaded</p>
          @endif
          <input type="file" name="medicalCertificate" class="form-control">
          <small>Leave blank to keep existing certificate</small>
        </div>

        @if($errors->any())
          <div class="alert">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        
        <button type="submit">Update</button>
        <a href="{{ route('admin.panel') }}" class="button-link">Cancel</a>
      </form>
    </div>
  </body>
</html>
