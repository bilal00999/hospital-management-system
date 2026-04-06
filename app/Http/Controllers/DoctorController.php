<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')->withTrashed()->paginate(10);
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'department' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'license_number' => 'required|string|unique:doctors,license_number',
            'phone' => 'required|string|max:20',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'doctor',
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'department' => $data['department'],
            'specialization' => $data['specialization'],
            'license_number' => $data['license_number'],
            'phone' => $data['phone'],
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully');
    }

    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $doctor->user_id,
            'department' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'license_number' => 'required|string|unique:doctors,license_number,' . $doctor->id,
            'phone' => 'required|string|max:20',
        ]);

        $doctor->user()->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $doctor->update([
            'department' => $data['department'],
            'specialization' => $data['specialization'],
            'license_number' => $data['license_number'],
            'phone' => $data['phone'],
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }

    public function restore($id)
    {
        $doctor = Doctor::withTrashed()->findOrFail($id);
        $doctor->restore();
        return redirect()->route('doctors.index')->with('success', 'Doctor restored successfully');
    }
}
