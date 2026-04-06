<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $stats = [
                'total_patients' => Patient::count(),
                'total_doctors' => Doctor::count(),
                'total_appointments' => Appointment::count(),
                'pending_appointments' => Appointment::where('status', 'pending')->count(),
            ];
            return view('dashboard.admin', compact('stats'));
        }

        if ($user->isDoctor()) {
            $doctor = Doctor::where('user_id', $user->id)->first();
            $appointments = $doctor ? $doctor->appointments()->latest()->limit(10)->get() : [];
            return view('dashboard.doctor', compact('appointments'));
        }

        if ($user->isPatient()) {
            $patient = Patient::where('user_id', $user->id)->first();
            $appointments = $patient ? $patient->appointments()->latest()->limit(10)->get() : [];
            return view('dashboard.patient', compact('appointments'));
        }

        return view('dashboard.index');
    }
}
