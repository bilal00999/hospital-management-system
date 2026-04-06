@extends('layouts.app')

@section('title', 'Appointment Details')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <h2>Appointment Details</h2>
        
        <p><strong>Patient:</strong> {{ $appointment->patient->user->name }}</p>
        <p><strong>Doctor:</strong> {{ $appointment->doctor->user->name }}</p>
        <p><strong>Date:</strong> {{ $appointment->appointment_date->format('M d, Y') }}</p>
        <p><strong>Time:</strong> {{ $appointment->appointment_time }}</p>
        <p><strong>Status:</strong> {{ ucfirst($appointment->status) }}</p>
        <p><strong>Notes:</strong></p>
        <p>{{ $appointment->notes ?? 'No notes' }}</p>

        <div style="margin-top: 2rem;">
            <a href="{{ route('appointments.edit', $appointment) }}" class="btn">Edit</a>
            <a href="{{ route('appointments.index') }}" class="btn" style="background-color: #95a5a6;">Back</a>
        </div>
    </div>
</div>
@endsection
