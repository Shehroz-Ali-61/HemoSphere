<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Profile - HemoSphere</title>
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
      background: var(--hemo-gradient);
      color: var(--hemo-light);
      line-height: 1.6;
      padding-top: 80px;
    }

    h1,
    h2 {
      background: linear-gradient(45deg, #fff 0%, #ff6b6b 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 2rem;
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
      padding: 1rem 5%;
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
    }

    /* ------------------------------ */
    /*         PROFILE SECTIONS       */
    /* ------------------------------ */
    .profile-section {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 2rem;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    /* ------------------------------ */
    /*          CARD DESIGNS          */
    /* ------------------------------ */
    .info-card {
      padding: 1.5rem;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 10px;
      margin-bottom: 1.5rem;
      transition: transform 0.3s ease;
    }

    .info-card:hover {
      transform: translateY(-5px);
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1.5rem;
    }

    /* ------------------------------ */
    /*          TABLE STYLES          */
    /* ------------------------------ */
    .data-table {
      width: 100%;
      border-collapse: collapse;
      background: rgba(255, 255, 255, 0.05);
      margin: 1rem 0;
    }



    .data-table th,
    .data-table td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .data-table th {
      background: rgba(192, 10, 10, 0.2);
      color: var(--hemo-red);
    }

    /* ------------------------------ */
    /*          IMAGE STYLES         */
    /* ------------------------------ */
    .thumbnail {
      width: 80px;
      height: 80px;
      border-radius: 8px;
      object-fit: cover;
      border: 2px solid var(--hemo-red);
      transition: transform 0.3s ease;
    }

    .thumbnail:hover {
      transform: scale(1.1);
    }

    /* ------------------------------ */
    /*          BUTTON STYLES         */
    /* ------------------------------ */
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

    .btn-danger {
      background: var(--hemo-red);
      color: white;
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
    /*       CHAT HISTORY STYLES      */
    /* ------------------------------ */
    .chat-card {
      padding: 1rem;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: all 0.3s ease;
    }

    .chat-card:hover {
      background: rgba(255, 255, 255, 0.1);
    }

    /* ------------------------------ */
    /*       RESPONSIVE DESIGN        */
    /* ------------------------------ */
    @media (max-width: 1186px) {
      #donate-table {
        display: block;
        overflow-x: auto;
      }
    }


    @media (max-width: 768px) {
      .profile-section {
        margin: 1rem;
        padding: 1.5rem;
      }

      .card-grid {
        grid-template-columns: 1fr;
      }

      .data-table {
        display: block;
        overflow-x: auto;
      }
    }


    @media (max-width: 600px) {
      .logo span {
        font-size: 1.5rem;
      }

      .btn {
        font-size: 0.8rem;
        padding: 0.6rem 1.2rem;
      }
    }
  </style>
</head>

<body>
  <!-- HEADER -->
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

  <!-- MAIN CONTENT -->
  <div class="profile-section">
    <h1>Your Profile</h1>

    <!-- Account Details -->
    <div class="info-card">
      <h2>Account Information</h2>
      <table class="data-table">
        <tr>
          {{-- <th>ID</th> --}}
          <th>Name</th>
          <th>Email</th>
          <th>Profile Picture</th>
          <th>Actions</th>
        </tr>
        <tr>
          {{-- <td>{{ $user->id }}</td> --}}
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if($user->profile_picture)
        <img src="{{ asset('storage/' . $user->profile_picture) }}" class="thumbnail" alt="Profile Image">
      @else
    <div class="thumbnail"
      style="background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center;">
      <i class="fas fa-user-slash"></i>
    </div>
  @endif
          </td>
          <td>
            <div style="display: flex; gap: 0.5rem;">
              <form action="{{ route('account.deleteProfile', $user->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">
                  <i class="fas fa-trash"></i> Delete
                </button>
              </form>
              <a href="{{ route('account.editProfile', $user->id) }}" class="btn btn-secondary">
                <i class="fas fa-edit"></i> Edit
              </a>
            </div>
          </td>
        </tr>
      </table>
    </div>

    <!-- Donor Information -->
    @if($donors->count() > 0)
    <div class="info-card" id="donate-table">
      <h2>Your Donor Posts</h2>
      <table class="data-table">
      <tr>
        <th>Full Name</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Blood Type</th>
        <th>Address</th>
        <th>City</th>
        <th>Message</th>
        <th>Image</th>
        <th>Certificate</th>
        <th>Actions</th>
      </tr>
      @foreach($donors as $donor)
      <tr>
      <td>{{ $donor->fullName }}</td>
      <td>{{ $donor->age }}</td>
      <td>{{ $donor->phone }}</td>
      <td>{{ $donor->bloodType }}</td>
      <td>{{ $donor->address }}</td>
      <td>{{ $donor->city }}</td>
      <td>{{ $donor->message }}</td>
      <td>
      @if($donor->image)
      <img src="{{ asset('storage/' . $donor->image) }}" class="thumbnail" alt="Donor Image">
    @else
      N/A
    @endif
      </td>
      <td>
      @if($donor->medicalCertificate)
      <img src="{{ asset('storage/' . $donor->medicalCertificate) }}" class="thumbnail" alt="Medical Certificate">
    @else
      N/A
    @endif
      </td>
      <td>
      <div style="display: flex; gap: 0.5rem;">
        <form action="{{ route('account.deleteDonor', $donor->id) }}" method="POST">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger">
        <i class="fas fa-trash"></i> Delete
        </button>
        </form>
        <a href="{{ route('account.editDonor', $donor->id) }}" class="btn btn-secondary">
        <i class="fas fa-edit"></i> Edit
        </a>
      </div>
      </td>
      </tr>
    @endforeach
      </table>
    </div>
  @endif

    <!-- Chat History -->
    <!-- Chat History -->
    <div class="info-card">
      <h2>Chat Area</h2>
      <div class="card-grid">
        @if($chattedUsers->count() > 0)
      @foreach($chattedUsers as $chattedUser)
      @if($chattedUser->id !== auth()->id())
      <div class="chat-card">
      <div>
      <h3>{{ $chattedUser->name }}</h3>
      </div>
      <a href="{{ route('chat.show', $chattedUser->id) }}" class="btn btn-danger">
      <i class="fas fa-comment"></i> Chat
      </a>
      </div>
    @endif
    @endforeach
    @else
    <p class="no-chats">No chat history available</p>
  @endif
      </div>
    </div>

  </div>
</body>

</html>