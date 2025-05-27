<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class DonorController extends Controller
{
    public function donateForm()
    {
        return view('donateBlood');
    }

     public function needhelp()
    {
        return view('help');
    }


    public function processDonate(Request $request)
    {
        // Validate the request
        $request->validate([
            'fullName' => 'required|string|max:255',

            'phone' => 'required|string',
            'age' => 'required|integer|min:18',
            'bloodType' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'image' => 'required|file|image', // or your preferred validation
            'medicalCertificate' => 'required|file|image', // could be pdf or image
        ]);

        // Handle the file uploads
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('donor_images', 'public');
        }

        $certificatePath = null;
        if ($request->hasFile('medicalCertificate')) {
            $certificatePath = $request->file('medicalCertificate')->store('medical_certificates', 'public');
        }

        // Create a new donor record
        // Create a new donor record
        $donor = Donor::create([
            'fullName' => $request->fullName,
            'phone' => $request->phone,
            'age' => $request->age,
            'bloodType' => $request->bloodType,
            'address' => $request->address,
            'city' => $request->city,
            'message' => $request->message,
            'image' => $imagePath,
            'medicalCertificate' => $certificatePath,
            'user_id' => auth()->id(),
        ]);

        // Retrieve all users (modify this query according to your application requirements)
        $users = \App\Models\User::all();

        // Send the notification to each user (using queue if your mail driver supports it)
        foreach ($users as $user) {
            \Mail::to($user->email)->queue(new \App\Mail\NewDonorNotification($donor));
        }

        return redirect()->back()->with('success', 'Thank you for joining our donor network!');
    }

    

    public function getBloodPost(Request $request)
    {
        try {
            $query = Donor::query()->orderBy('created_at', 'desc');

            // Apply filters if present
            if ($request->filled('bloodType')) {
                $query->where('bloodType', $request->bloodType);
            }

            if ($request->filled('city')) {
                $query->where('city', $request->city);
            }

            if ($request->filled('search')) {
                $searchTerm = $request->search;
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('fullName', 'LIKE', "%$searchTerm%")
                        ->orWhere('email', 'LIKE', "%$searchTerm%")
                        ->orWhere('phone', 'LIKE', "%$searchTerm%");
                });
            }

            $donors = $query->paginate(15)->withQueryString();

            return view('bloodPosts', [
                'donors' => $donors,
                'bloodTypes' => ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'],
                'cities' => ['Islamabad', 'Pindi', 'Sohawa', 'Jhelum', 'Kharian', 'Gujrat', 'Gujranwala', 'Kamoki', 'Lahore'],
                'selectedBloodType' => $request->bloodType,
                'selectedCity' => $request->city
            ]);

        } catch (\Exception $e) {
            \Log::error('Error fetching blood posts: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Could not retrieve donor data. Please try again later.');
        }
    }
   

}
