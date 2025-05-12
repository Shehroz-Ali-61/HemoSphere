{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Blood Donor | HemoSphere</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family:'Arial', sans-serif;
            min-height: 100vh;
            background: url('blood-donation(5).jpg') no-repeat center center / cover;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            opacity: 1;
            animation: fadeIn 1s ease-in forwards;
            
        }
        

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .donor-form-container {
            max-width: 600px;
            margin: 130px auto 40px auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(218, 211, 211, 0.4);
            opacity: 0;
            transform: translateY(20px);
            animation: formFade 0.8s ease-out 0.3s forwards;
            transition: 0.3s ease;

        }

        @keyframes formFade {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .donor-form-container:hover {
            box-shadow: 0 0 20px rgba(218, 211, 211, 0.9);
            transition: 0.3s ease;
        }

        h2 {
            color: #cc0000;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.2em;
        }

        .form-group {
            margin-bottom: 20px;
        }

    

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #cc0000;
            outline: none;
        }

        button {
            background: #cc0000;
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #a30000;
        }

        @media (max-width: 768px) {
            .donor-form-container {
                padding: 20px;
            }
            h2 {
                font-size: 1.8em;
            }
        }

        @media (max-width: 620px) {
            .donor-form-container {
                margin: 130px 10px 40px 10px;
                padding: 20px;
            }
            h2 {
                font-size: 1.8em;
            }
        }

    </style>
</head>
<body>
</body>
</html>





@extends('layouts.mainStructure')

@section('title', 'Become a Blood Donor | HemoSphere')

@section('content')
    <div class="container">
        <div class="donor-form-container">
            <h2>Become a Blood Donor</h2>
            <form id="donorForm" method="POST">
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" min="18" required>
                </div>

                <div class="form-group">
                    <label for="bloodType">Blood Type</label>
                    <select id="bloodType" name="bloodType" required>
                        <option value="">Select Blood Type</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="O-">O-</option>
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <select id="city" name="city" required>
                        <option value="">Select City</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="Pindi">Pindi</option>
                        <option value="SohawaJhelum">SohawaJhelum</option>
                        <option value="Jhelum">Jhelum</option>
                        <option value="Kharian">Kharian</option>
                        <option value="Gujrat">Gujrat</option>
                        <option value="Gujranwala">Gujranwala</option>
                        <option value="Kamoki">Kamoki</option>
                        <option value="Lahore">Lahore</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Additional Message</label>
                    <textarea id="message" name="message" rows="4"></textarea>
                </div>

                <button type="submit">Submit Donation Listing</button>
            </form>
        </div>
    </div>

    @include('home.sections.3_guidline-donor')
    @include('home.sections.6_why-donate')
    @include('home.sections.5_eligibility')
@endsection


@section('scripts')
    <script>
        // Form submission
        document.getElementById('donorForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            const formData = new FormData(this);
            console.log(Object.fromEntries(formData));
            alert('Thank you for your donation submission!');
            this.reset();
        });
    </script>
@endsection --}}










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Blood Donor | HemoSphere</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .donation-section {
            padding: 4rem 5%;
            display: flex;
            align-items: center;
            min-height: 100vh;
            background: var(--dark-space);
        }

        .donation-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            width: 100%;
            max-width: 1200px;
            margin: 50px auto 0px auto;

            opacity: 0;
            transform: translateY(20px);
            animation: formFade 0.8s ease-out 0.3s forwards;
            transition: 0.3s ease;

        }

        @keyframes formFade {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        .donation-image {
            border-radius: 15px;
            overflow: hidden;
        }


        .donation-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;

        }

        .donor-form-container {
            padding: 2.5rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            position: relative;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 46, 99, 0.3);
            box-shadow: 0 0 30px rgba(255, 46, 99, 0.1);

        }

        .donor-form-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: var(--holographic);


            z-index: -1;
            border-radius: 15px;
            animation: gradient-border 4s linear infinite;
        }

        #city option,
        #bloodType option {
            color: black;
        }

        @keyframes gradient-border {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .donor-form-container h2 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
            color: var(--neon-red);
            text-shadow: 0 0 15px rgba(255, 46, 99, 0.4);


        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            color: var(--star-dust);
            margin-bottom: 0.5rem;
            display: block;
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 46, 99, 0.3);
            border-radius: 8px;
            color: var(--star-dust);
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--neon-red);
            box-shadow: 0 0 10px rgba(255, 46, 99, 0.2);
        }

        button[type="submit"] {
            background: var(--holographic);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        select option {
            color: bl;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 46, 99, 0.4);
        }

        @media (max-width: 992px) {
            .donation-container {
                grid-template-columns: 1fr;
            }

            .donation-image {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .donation-section {
                padding: 2rem 5%;
            }

            .donor-form-container {
                padding: 1.5rem;
            }

            .donor-form-container h2 {
                font-size: 2rem;
            }

            .donation-container {
                margin-top: 100px;
            }
        }
    </style>

</head>

<body>

</body>

</html>







@extends('layouts.mainStructure')

@section('title', 'Become a Blood Donor | HemoSphere')

@section('content')
<section class="donation-section">
    <div class="donation-container">
        <div class="donation-image">
            <img src="{{ asset('images/blood-donation(8).png') }}" alt="Blood Donation">
        </div>

        <div class="donor-form-container">
            <h2>Become a Life Saver</h2>
            <form action="{{ route('account.processDonate') }}" id="donorForm" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Your form fields here -->

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" placeholder="Upload Your Image" required>
                </div>

                <div class="form-group">
                    <label for="fullName">User Name: {{auth()->user()->name}}</label>
                    <br>
                    <label for="fullName">Full Name:</label>
                    <input type="text" id="fullName" name="fullName" required>
                </div>            

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" min="18" required>
                </div>

                <div class="form-group">
                    <label for="bloodType">Blood Type</label>
                    <select id="bloodType" name="bloodType" required>
                        <option value="">Select Blood Type</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="O-">O-</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <select id="city" name="city" required>
                        <option value="">Select City</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="Pindi">Pindi</option>
                        <option value="SohawaJhelum">SohawaJhelum</option>
                        <option value="Jhelum">Jhelum</option>
                        <option value="Kharian">Kharian</option>
                        <option value="Gujrat">Gujrat</option>
                        <option value="Gujranwala">Gujranwala</option>
                        <option value="Kamoki">Kamoki</option>
                        <option value="Lahore">Lahore</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Additional Message</label>
                    <textarea id="message" name="message" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="medicalCertificate">Medical Certificate</label>
                    <input type="file" id="medicalCertificate" name="medicalCertificate" placeholder="Upload Your medicalCertificate" required>
                </div>

                <button type="submit">Join Donor Network</button>
            </form>
        </div>
    </div>

</section>
@include('home.sections.3_guidline-donor')
@include('home.sections.6_why-donate')
@include('home.sections.5_eligibility')
@endsection

@section('scripts')
<!-- Keep your existing script section -->
@endsection