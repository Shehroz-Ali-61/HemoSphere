<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home.home-index');
    }

    public function profile()
    {
        return view('profile.userFile');
    }


    public function profilePanel()
    {
        $user = auth()->user();
        $donors = Donor::where('user_id', $user->id)->get();

        // Get unique user IDs from messages
        $sentUserIds = Message::where('sender_id', $user->id)->pluck('receiver_id');
        $receivedUserIds = Message::where('receiver_id', $user->id)->pluck('sender_id');
        $userIds = $sentUserIds->merge($receivedUserIds)->unique();

        $chattedUsers = User::whereIn('id', $userIds)->get();

        return view('profile.userFile', [
            'user' => $user,
            'donors' => $donors,
            'chattedUsers' => $chattedUsers
        ]);
    }



    ///
    public function editProfile(User $user)
    {
        // Authorization check
        if (auth()->id() !== $user->id) {
            abort(403);
        }

        return view('profile.editProfile', ['user' => $user]);
    }

    public function editUsersProfile(Request $request, User $user)
{
    // Authorization check
    if (auth()->id() !== $user->id) {
        abort(403);
    }

    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'current_password' => 'nullable|required_with:new_password',
        'new_password' => 'nullable|min:8|confirmed',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    // Update name and email
    $user->name = $request->name;
    $user->email = $request->email;

    // Handle password update
    if ($request->filled('new_password')) {
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        $user->password = Hash::make($request->new_password);
    }

    // Handle profile picture update
    if ($request->hasFile('profile_picture')) {
        // Delete the old profile picture if it exists
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Store the new profile picture and update the user's profile_picture attribute
        $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
    }

    // Save the updated user information
    $user->save();

    return redirect()->route('account.dashboard')->with('success', 'Profile updated successfully');
}


    public function deleteProfile(User $user)
    {
        // Authorization check
        if (auth()->id() !== $user->id) {
            abort(403);
        }

        $user->delete();
        return redirect()->route('account.login')->with('success', 'Account deleted successfully');
    }

    // Donor
    public function editDonor(Donor $donor)
    {
        // Check if logged-in user owns this donor post
        if (auth()->id() !== $donor->user_id) {
            abort(403, 'Unauthorized action');
        }
        return view('profile.editDonor', ['donor' => $donor]);
    }

    public function editUsersDonor(Request $request, Donor $donor)
    {
        if (auth()->id() !== $donor->user_id) {
            abort(403);
        }

        $request->validate([
            'fullName' => 'required|string|max:255',
            'phone' => 'required|string',
            'age' => 'required|integer|min:18',
            'bloodType' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'medicalCertificate' => 'nullable|file|image|mimes:pdf,jpeg,png,jpg',
        ]);

        $data = $request->except(['_token', '_method']);

        // Handle image update
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('donor_images', 'public');
        } else {
            $data['image'] = $donor->image;
        }

        // Handle medical certificate update
        if ($request->hasFile('medicalCertificate')) {
            $data['medicalCertificate'] = $request->file('medicalCertificate')->store('medical_certificates', 'public');
        } else {
            $data['medicalCertificate'] = $donor->medicalCertificate;
        }

        $donor->update($data);

        return redirect()->route('account.dashboard')->with('success', 'Donor information updated successfully');
    }

    public function deleteDonor(Donor $donor)
    {
        if (auth()->id() !== $donor->user_id) {
            abort(403, 'Unauthorized action');
        }
        $donor->delete();
        return redirect()->route('account.dashboard')->with('success', 'Post deleted');
    }
}
