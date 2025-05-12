<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HemoSphere - Edit Donor</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
      padding: 20px;
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
    /*         EDIT DONOR FORM        */
    /* ------------------------------ */
    .edit-donor-container {
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
    form {
      display: grid;
      grid-gap: 1.5rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
      position: relative;
    }

    label {
      display: block;
      margin-bottom: 0.75rem;
      font-weight: 500;
      color: #d1d1d1;
      display: flex;
      align-items: center;
      gap: 0.8rem;
    }

    input[type="text"],
    input[type="file"] ,
    input[type="number"], select, textarea{
      width: 100%;
      padding: 1rem;
      background: rgba(255, 255, 255, 0.05);
      border: 2px solid rgba(255, 255, 255, 0.1);
      border-radius: 8px;
      color: #fff;
      transition: all 0.3s ease;
    }
    select option{
      background: black;
    }
    
    

    input:focus, select:focus, textarea:focus {
      outline: none;
      border-color: #c00a0a;
      box-shadow: 0 0 0 3px rgba(192, 10, 10, 0.2);
    }

    /* ------------------------------ */
    /*       IMAGE UPLOAD STYLING     */
    /* ------------------------------ */
    .file-upload-section {
      padding: 2rem;
      border: 2px dashed rgba(255, 255, 255, 0.2);
      border-radius: 12px;
      text-align: center;
      margin: 1.5rem 0;
    }

    .file-upload-section:hover {
      border-color: #c00a0a;
      background: rgba(192, 10, 10, 0.05);
    }

    img {
      max-width: 250px;
      border-radius: 10px;
      margin: 1rem auto;
      border: 3px solid #c00a0a;
    }

    small {
      display: block;
      color: #a0a0a0;
      font-size: 0.85rem;
      margin-top: 0.5rem;
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
      animation: pulse 2s infinite;
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
      .edit-donor-container {
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

      img {
        max-width: 200px;
      }
    }

    @keyframes pulse {
      0% { box-shadow: 0 0 0 0 rgba(192, 10, 10, 0.5); }
      70% { box-shadow: 0 0 0 15px rgba(192, 10, 10, 0); }
      100% { box-shadow: 0 0 0 0 rgba(192, 10, 10, 0); }
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

  <div class="edit-donor-container">
    <h1>Edit Donor Profile</h1>

    <form action="{{ route('account.updateDonor', $donor->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label><i class="fas fa-user"></i> Full Name:</label>
        <input type="text" name="fullName" value="{{ old('fullName', $donor->fullName) }}">
      </div>

      
      <div class="form-group">
        <label><i class="fas fa-calendar-alt"></i> Age:</label>
        <input type="number" min="18" max="70" name="age" value="{{ old('age', $donor->age) }}">
      </div>
      

      <div class="form-group">
        <label><i class="fas fa-phone"></i> Phone:</label>
        <input type="text" name="phone" value="{{ old('phone', $donor->phone) }}">
      </div>

      
      <div class="form-group">
        <label for="bloodType"><i class="fas fa-tint"></i> Blood Type:</label>
        <select id="bloodType" name="bloodType">
          <option value="">Select Blood Type</option>
          <option value="A+" {{ $donor->bloodType === 'A+' ? 'selected' : '' }}>A+</option>
          <option value="A-" {{ $donor->bloodType === 'A-' ? 'selected' : '' }}>A-</option>
          <option value="B+" {{ $donor->bloodType === 'B+' ? 'selected' : '' }}>B+</option>
          <option value="B-" {{ $donor->bloodType === 'B-' ? 'selected' : '' }}>B-</option>
          <option value="AB+" {{ $donor->bloodType === 'AB+' ? 'selected' : '' }}>AB+</option>
          <option value="AB-" {{ $donor->bloodType === 'AB-' ? 'selected' : '' }}>AB-</option>
          <option value="O-" {{ $donor->bloodType === 'O-' ? 'selected' : '' }}>O-</option>
          <option value="O+" {{ $donor->bloodType === 'O+' ? 'selected' : '' }}>O+</option>
        </select>
      </div>

      <div class="form-group">
        <label><i class="fas fa-map-marker-alt"></i> Address:</label>
        <input type="text" name="address" value="{{ old('address', $donor->address) }}">
      </div>

      <div class="form-group">
        <label for="city"><i class="fas fa-city"></i> City:</label>
        <select id="city" name="city">
          <option value="">Select City</option>
          <option value="Islamabad" {{ $donor->city === 'Islamabad' ? 'selected' : '' }}>Islamabad</option>
          <option value="Pindi" {{ $donor->city === 'Pindi' ? 'selected' : '' }}>Pindi</option>
          <option value="SohawaJhelum" {{ $donor->city === 'SohawaJhelum' ? 'selected' : '' }}>SohawaJhelum</option>
          <option value="Jhelum" {{ $donor->city === 'Jhelum' ? 'selected' : '' }}>Jhelum</option>
          <option value="Kharian" {{ $donor->city === 'Kharian' ? 'selected' : '' }}>Kharian</option>
          <option value="Gujrat" {{ $donor->city === 'Gujrat' ? 'selected' : '' }}>Gujrat</option>
          <option value="Gujranwala" {{ $donor->city === 'Gujranwala' ? 'selected' : '' }}>Gujranwala</option>
          <option value="Kamoki" {{ $donor->city === 'Kamoki' ? 'selected' : '' }}>Kamoki</option>
          <option value="Lahore" {{ $donor->city === 'Lahore' ? 'selected' : '' }}>Lahore</option>
        </select>
      </div>

      <div class="form-group">
        <label><i class="fas fa-comment"></i> Message:</label>
        <textarea name="message" rows="4">{{ old('message', $donor->message) }}</textarea>
        {{-- <input type="text" name="message" value="{{ old('message', $donor->message) }}"> --}}
      </div>

      <!-- Image Upload -->
      <div class="file-upload-section">
        <label><i class="fas fa-image"></i> Profile Image:</label>
        @if($donor->image)
          <img src="{{ asset('storage/' . $donor->image) }}" alt="Donor Image">
        @else
          <p>No image uploaded</p>
        @endif
        <input type="file" name="image">
        <small>Max 5MB • JPEG/PNG format</small>
      </div>

      <!-- Medical Certificate -->
      <div class="file-upload-section">
        <label><i class="fas fa-file-medical"></i> Medical Certificate:</label>
        @if($donor->medicalCertificate)
          <img src="{{ asset('storage/' . $donor->medicalCertificate) }}" alt="Medical Certificate">
        @else
          <p>No certificate uploaded</p>
        @endif
        <input type="file" name="medicalCertificate">
        <small>PDF/Image format • Max 10MB</small>
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