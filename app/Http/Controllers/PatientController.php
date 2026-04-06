<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('user')->withTrashed()->paginate(10);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:M,F,Other',
            'blood_type' => 'nullable|string',
            'phone' => 'required|string|max:20',
            'medical_history' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'patient',
        ]);

        Patient::create([
            'user_id' => $user->id,
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'blood_type' => $data['blood_type'],
            'phone' => $data['phone'],
            'medical_history' => $data['medical_history'],
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient created successfully');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $patient->user_id,
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:M,F,Other',
            'blood_type' => 'nullable|string',
            'phone' => 'required|string|max:20',
            'medical_history' => 'nullable|string',
        ]);

        $patient->user()->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $patient->update([
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'blood_type' => $data['blood_type'],
            'phone' => $data['phone'],
            'medical_history' => $data['medical_history'],
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully');
    }

    public function restore($id)
    {
        $patient = Patient::withTrashed()->findOrFail($id);
        $patient->restore();
        return redirect()->route('patients.index')->with('success', 'Patient restored successfully');
    }
}
