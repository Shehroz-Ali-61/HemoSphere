<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }

    public function adminPanel()
    {
        $userData = User::all();
        $donorData = Donor::all();
        return view('admin.panel', ['users' => $userData, 'donors' => $donorData]);
    }

    public function usersDelete($id)
    {
        $isDeleted = User::destroy($id);
        if ($isDeleted) {
            return redirect()->route('admin.panel');
        }
    }

    public function usersEdit($id)
    {
        $userEdit = User::find($id);
        return view('admin.editData', ['usersEdit' => $userEdit]);
    }

    public function editUsers(Request $request, $id)
{
    // Validate input data with extra password validation rules
    $request->validate([
        'name'               => 'required|string|max:255',
        'email'              => 'required|email|unique:users,email,' . $id,
        'current_password'   => 'nullable|required_with:new_password|string',
        'new_password'       => 'nullable|string|min:8|confirmed',
    ]);

    $updateUser = User::findOrFail($id);
    $updateUser->name = $request->name;
    $updateUser->email = $request->email;

    if ($request->filled('new_password')) {
        // Check if the provided current password is correct
        if (!Hash::check($request->current_password, $updateUser->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        // Update the password
        $updateUser->password = Hash::make($request->new_password);
    }

    if ($updateUser->save()) {
        return redirect()->route('admin.panel')->with('success', 'User updated successfully');
    }

    return back()->with('error', 'Update failed');
}

    /// Donor Edit
    public function donorsDelete($id)
    {
        $isDonorDeleted = Donor::destroy($id);
        if ($isDonorDeleted) {
            return redirect()->route('admin.panel');
        }
    }

    public function donorsEdit($id)
    {
        $donorEdit = Donor::find($id);
        return view('admin.editDonor', ['donorsEdit' => $donorEdit]);
    }

    public function editDonors(Request $request, $id)
    {
        // Validate input including new file fields
        $request->validate([
            'fullName'           => 'required|string|max:255',
            'phone'              => 'required|numeric',
            'age'                => 'required|integer|min:18|max:65',
            'bloodType'          => 'required|string|max:3',
            'address'            => 'required|string|max:255',
            'city'               => 'required|string|max:100',
            'message'            => 'nullable|string',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'medicalCertificate' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Find the donor record
        $donor = Donor::findOrFail($id);
    
        // Retrieve all request data except token and method
        $data = $request->except(['_token', '_method']);
    
        // Update image if a new file is uploaded, else keep the current image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('donor_images', 'public');
        } else {
            $data['image'] = $donor->image;
        }
    
        // Update medical certificate if a new file is uploaded, else keep the current certificate
        if ($request->hasFile('medicalCertificate')) {
            $data['medicalCertificate'] = $request->file('medicalCertificate')->store('medical_certificates', 'public');
        } else {
            $data['medicalCertificate'] = $donor->medicalCertificate;
        }
    
        try {
            $donor->update($data);
            return redirect()->route('admin.panel')->with('success', 'Donor updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }
    
}
