{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
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
      h1,
      h2 {
        text-align: center;
        margin-bottom: 1rem;
      }

      .admin-panel-container {
        width: 90%;
        max-width: 1200px;
        margin: auto;
        padding: 2rem;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 46, 99, 0.5);
      }

      /* -----------------------------
         3. Table Styles
      ----------------------------- */
      table {
        width: 100%;
        border-collapse: collapse;
        margin: 1rem 0;
        background: rgba(255, 255, 255, 0.05);
      }
      th,
      td {
        border: 1px solid var(--neon-red);
        padding: 0.75rem;
        text-align: center;
      }
      th {
        background: rgba(255, 46, 99, 0.1);
      }
      td img {
        max-width: 100px;
        border-radius: 5px;
      }

      /* -----------------------------
         4. Link & Button Styles
      ----------------------------- */
      a {
        color: var(--neon-red);
        text-decoration: none;
        margin: 0 5px;
        transition: 0.3s;
      }
      a:hover {
        text-decoration: underline;
      }

      /* Optionally, you might add a button style if needed */
      .btn {
        padding: 0.5rem 1rem;
        border: 1px solid var(--neon-red);
        border-radius: 5px;
        background: transparent;
        color: var(--star-dust);
        cursor: pointer;
        transition: 0.3s;
      }
      .btn:hover {
        background: var(--neon-red);
        color: var(--dark-space);
      }
    </style>
  </head>
  <body>
    <div class="admin-panel-container">
      <h1>Admin Panel</h1>

      @php
          // Filter the users collection for admin and non-admin users
          $adminUsers = $users->filter(function($user) {
              return $user->role === 'admin';
          });
          $nonAdminUsers = $users->filter(function($user) {
              return $user->role !== 'admin';
          });
      @endphp

      @if($adminUsers->count() > 0)
          <h2>Admin Users</h2>
          <table>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Operation</th>
              </tr>
              @foreach($adminUsers as $user)
              <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
                  <td>
                      <!-- Usually we do not allow deletion of admin users -->
                      <a href="{{ route('admin.user.edit', $user->id) }}">Edit</a>
                  </td>
              </tr>
              @endforeach
          </table>
          <br><br>
      @endif

      @if($nonAdminUsers->count() > 0)
          <h2>Other Users</h2>
          <table>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Operation</th>
              </tr>
              @foreach($nonAdminUsers as $user)
              <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
                  <td>
                      @if($user->role !== 'admin')
                          <a href="{{ route('admin.delete', $user->id) }}">Delete</a> |
                      @endif
                      <a href="{{ route('admin.user.edit', $user->id) }}">Edit</a>
                  </td>
              </tr>
              @endforeach
          </table>
          <br><br>
      @endif

      <h2>Donors</h2>
      <table>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Age</th>
              <th>Address</th>
              <th>City</th>
              <th>Blood Type</th>
              <th>Message</th>
              <th>Image</th>
              <th>Medical Certificate</th>
              <th>Operation</th>
          </tr>
          @foreach($donors as $donor)
          <tr>
              <td>{{ $donor->id }}</td>
              <td>{{ $donor->fullName }}</td>
              <td>{{ $donor->phone }}</td>
              <td>{{ $donor->age }}</td>
              <td>{{ $donor->address }}</td>
              <td>{{ $donor->city }}</td>
              <td>{{ $donor->bloodType }}</td>
              <td>{{ $donor->message }}</td>
              <td>
                  @if($donor->image)
                      <img src="{{ asset('storage/' . $donor->image) }}" alt="Donor Image">
                  @else
                      No Image
                  @endif
              </td>
              <td>
                  @if($donor->medicalCertificate)
                      <img src="{{ asset('storage/' . $donor->medicalCertificate) }}" alt="Medical Certificate">
                  @else
                      No Certificate
                  @endif
              </td>
              <td>
                  <a href="{{ route('admin.dDelete', $donor->id) }}">Delete</a> |
                  <a href="{{ route('admin.donor.edit', $donor->id) }}">Edit</a>
              </td>
          </tr>
          @endforeach
      </table>
    </div>
  </body>
</html> --}}

















{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hemosphere Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* -----------------------------
           1. Custom Variables & Base Styles
        ----------------------------- */
        :root {
            --neon-red: #ff2e63;
            --cyber-purple: #6b46c1;
            --dark-space: #0a0a12;
            --star-dust: #e2e8f0;
            --holographic: linear-gradient(45deg, #ff6b6b, #ff2e63, #6b46c1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--dark-space);
            color: var(--star-dust);
            line-height: 1.6;
        }

        /* -----------------------------
           2. Admin Container & Headings
        ----------------------------- */
        .admin-panel-container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(10, 10, 18, 0.95);
            border-radius: 15px;
            border: 1px solid rgba(255,46,99,0.2);
            box-shadow: 0 0 30px rgba(255,46,99,0.1);
        }

        h1, h2 {
            color: var(--neon-red);
            margin: 2rem 0;
            position: relative;
            padding-left: 1rem;
        }

        h1::before, h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 70%;
            background: var(--holographic);
        }

        /* -----------------------------
           3. Enhanced Table Styles
        ----------------------------- */
        .table-wrapper {
            overflow-x: auto;
            margin: 2rem 0;
            border-radius: 10px;
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,46,99,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(255,46,99,0.1);
        }

        th {
            background: rgba(255,46,99,0.1);
            color: var(--neon-red);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        tr:hover {
            background: rgba(255,46,99,0.03);
        }

        /* -----------------------------
           4. Media & Image Handling
        ----------------------------- */
        .media-preview {
            width: 100px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid rgba(255,46,99,0.3);
            transition: transform 0.3s;
        }

        .media-preview:hover {
            transform: scale(1.8);
            z-index: 100;
            position: relative;
        }

        /* -----------------------------
           5. Action Buttons & Links
        ----------------------------- */
        .action-btns {
            display: flex;
            gap: 0.8rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
            text-decoration: none;
            font-size: 0.9em;
        }

        .btn-edit {
            background: rgba(107, 70, 193, 0.1);
            color: var(--cyber-purple);
            border: 1px solid var(--cyber-purple);
        }

        .btn-delete {
            background: rgba(255, 46, 99, 0.1);
            color: var(--neon-red);
            border: 1px solid var(--neon-red);
        }

        .btn:hover {
            filter: brightness(1.2);
            transform: translateY(-1px);
        }

        /* -----------------------------
           6. Responsive Design
        ----------------------------- */
        @media (max-width: 1200px) {
            .admin-panel-container {
                margin: 1rem;
                padding: 1rem;
            }
        }

        @media (max-width: 768px) {
            th, td {
                padding: 0.8rem;
                font-size: 0.9em;
            }

            .action-btns {
                flex-direction: column;
                gap: 0.5rem;
            }

            .btn {
                padding: 0.4rem 0.8rem;
                justify-content: center;
            }
        }

        /* -----------------------------
           7. Status Indicators
        ----------------------------- */
        .status-indicator {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8em;
        }

        .status-active {
            background: rgba(0, 255, 165, 0.1);
            color: #00ffa5;
        }

        .status-pending {
            background: rgba(255, 165, 0, 0.1);
            color: #ffa500;
        }

        /* -----------------------------
           8. Scrollbar Styling
        ----------------------------- */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--neon-red);
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="admin-panel-container">
        <h1>Hemosphere Admin Dashboard</h1>

        <!-- User Management Sections -->
        @php
            $adminUsers = $users->filter(fn($user) => $user->role === 'admin');
            $nonAdminUsers = $users->filter(fn($user) => $user->role !== 'admin');
        @endphp

        @if($adminUsers->count() > 0)
            <h2>Administrators</h2>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminUsers as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="action-btns">
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if($nonAdminUsers->count() > 0)
            <h2>Registered Users</h2>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nonAdminUsers as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="status-indicator status-active">{{ $user->role }}</span></td>
                            <td>
                                <div class="action-btns">
                                    @if($user->role !== 'admin')
                                        <a href="{{ route('admin.delete', $user->id) }}" class="btn btn-delete">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Donors Section -->
        <h2>Blood Donors</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Donor</th>
                        <th>Contact</th>
                        <th>Details</th>
                        <th>Documents</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donors as $donor)
                    <tr>
                        <td>#{{ $donor->id }}</td>
                        <td>
                            <strong>{{ $donor->fullName }}</strong><br>
                            <small>{{ $donor->bloodType }}</small>
                        </td>
                        <td>
                            {{ $donor->phone }}<br>
                            {{ $donor->city }}
                        </td>
                        <td>
                            Age: {{ $donor->age }}<br>
                            {{ Str::limit($donor->address, 20) }}
                        </td>
                        <td>
                            @if($donor->image)
                                <img src="{{ asset('storage/' . $donor->image) }}" class="media-preview" alt="Donor Image">
                            @endif
                            @if($donor->medicalCertificate)
                                <img src="{{ asset('storage/' . $donor->medicalCertificate) }}" class="media-preview" alt="Medical Cert">
                            @endif
                        </td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('admin.dDelete', $donor->id) }}" class="btn btn-delete">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                                <a href="{{ route('admin.donor.edit', $donor->id) }}" class="btn btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Add confirmation for delete actions
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', (e) => {
                if (!confirm('Are you sure you want to delete this record?')) {
                    e.preventDefault();
                }
            });
        });

        // Add hover effect for media previews
        document.querySelectorAll('.media-preview').forEach(img => {
            img.addEventListener('mouseleave', () => {
                img.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html> --}}




















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoSphere - Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
    /* ------------------------------ */
    /*          GLOBAL STYLES         */
    /* ------------------------------ */
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
    }

    /* ------------------------------ */
    /*           ADMIN HEADER         */
    /* ------------------------------ */
    .admin-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 5%;
        background: rgba(10, 10, 26, 0.95);
        backdrop-filter: blur(10px);
        z-index: 1000;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .admin-logo {
        font-weight: 700;
        font-size: 1.5rem;
        color: #c00a0a;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .admin-nav {
        display: flex;
        gap: 2rem;
    }

    .admin-nav a {
        font-weight: 500;
        position: relative;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .admin-nav a:hover {
        background: rgba(192, 10, 10, 0.1);
    }

    /* ------------------------------ */
    /*         MAIN CONTENT AREA      */
    /* ------------------------------ */
    .admin-main {
        margin-top: 80px;
        padding: 2rem 5%;
    }

    /* ------------------------------ */
    /*          DATA TABLES           */
    /* ------------------------------ */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin: 2rem 0;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
        overflow: hidden;
    }

    .data-table th,
    .data-table td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .data-table th {
        background: rgba(192, 10, 10, 0.2);
        color: #c00a0a;
        font-weight: 600;
        text-transform: uppercase;
    }

    .data-table tr:hover {
        background: rgba(192, 10, 10, 0.05);
    }

    /* ------------------------------ */
    /*       ACTION BUTTONS           */
    /* ------------------------------ */
    .action-btns {
        display: flex;
        gap: 0.8rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
    }

    .btn-edit {
        background: rgba(192, 10, 10, 0.1);
        color: #c00a0a;
        border: 1px solid #c00a0a;
    }

    .btn-delete {
        background: rgba(255, 0, 0, 0.1);
        color: #ff4444;
        border: 1px solid #ff4444;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    /* ------------------------------ */
    /*       MEDIA PREVIEWS          */
    /* ------------------------------ */
    .media-preview {
        width: 100px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
        border: 1px solid rgba(192, 10, 10, 0.3);
        transition: transform 0.3s ease;
    }

    .media-preview:hover {
        transform: scale(1.8);
        z-index: 100;
        position: relative;
    }

    /* ------------------------------ */
    /*       STATUS INDICATORS       */
    /* ------------------------------ */
    .status-indicator {
        display: inline-block;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8em;
    }

    .status-active {
        background: rgba(0, 255, 165, 0.1);
        color: #00ffa5;
    }

    /* ------------------------------ */
    /*       RESPONSIVE DESIGN        */
    /* ------------------------------ */
    @media (max-width: 768px) {
        .admin-nav {
            display: none;
        }

        .data-table {
            display: block;
            overflow-x: auto;
        }

        .action-btns {
            flex-direction: column;
        }
        
        .admin-main {
            padding: 1rem;
        }
    }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="admin-logo">
            <img src="{{ asset('images/logo-transparent.png') }}" alt="HemoSphere Logo" style="width: 35px; height: 35px;">
            HemoSphere Admin
        </div>
        {{-- <nav class="admin-nav">
            <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#"><i class="fas fa-users"></i> Users</a>
            <a href="#"><i class="fas fa-tint"></i> Donors</a>
            <a href="{{ route('admin.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav> --}}
    </header>

    <main class="admin-main">
        <!-- User Management Sections -->
        @php
            $adminUsers = $users->filter(fn($user) => $user->role === 'admin');
            $nonAdminUsers = $users->filter(fn($user) => $user->role !== 'admin');
        @endphp

        <section class="admin-section">
            <h2>Administrators</h2>
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminUsers as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="action-btns">
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <section class="admin-section">
            <h2>Registered Users</h2>
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nonAdminUsers as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="status-indicator status-active">{{ $user->role }}</span></td>
                            <td>
                                <div class="action-btns">
                                    @if($user->role !== 'admin')
                                        <a href="{{ route('admin.delete', $user->id) }}" class="btn btn-delete">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <section class="admin-section">
            <h2>Blood Donors</h2>
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Donor</th>
                            <th>Contact</th>
                            <th>Details</th>
                            <th>Documents</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donors as $donor)
                        <tr>
                            <td>#{{ $donor->id }}</td>
                            <td>
                                <strong>{{ $donor->fullName }}</strong><br>
                                <small>{{ $donor->bloodType }}</small>
                            </td>
                            <td>
                                {{ $donor->phone }}<br>
                                {{ $donor->city }}
                            </td>
                            <td>
                                Age: {{ $donor->age }}<br>
                                {{ Str::limit($donor->address, 20) }}
                            </td>
                            <td>
                                @if($donor->image)
                                    <img src="{{ asset('storage/' . $donor->image) }}" class="media-preview" alt="Donor Image">
                                @endif
                                @if($donor->medicalCertificate)
                                    <img src="{{ asset('storage/' . $donor->medicalCertificate) }}" class="media-preview" alt="Medical Cert">
                                @endif
                            </td>
                            <td>
                                <div class="action-btns">
                                    <a href="{{ route('admin.dDelete', $donor->id) }}" class="btn btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                    <a href="{{ route('admin.donor.edit', $donor->id) }}" class="btn btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script>
        // Delete confirmation
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', (e) => {
                if (!confirm('Are you sure you want to delete this record?')) {
                    e.preventDefault();
                }
            });
        });

        // Image hover reset
        document.querySelectorAll('.media-preview').forEach(img => {
            img.addEventListener('mouseleave', () => {
                img.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>