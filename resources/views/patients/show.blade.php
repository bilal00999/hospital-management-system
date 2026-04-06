@extends('layouts.app')

@section('title', 'Patient Details')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <h2>{{ $patient->user->name }}</h2>
        
        <p><strong>Email:</strong> {{ $patient->user->email }}</p>
        <p><strong>Date of Birth:</strong> {{ $patient->date_of_birth->format('M d, Y') }}</p>
        <p><strong>Gender:</strong> {{ $patient->gender }}</p>
        <p><strong>Blood Type:</strong> {{ $patient->blood_type ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $patient->phone }}</p>
        <p><strong>Medical History:</strong></p>
        <p>{{ $patient->medical_history ?? 'No history recorded' }}</p>

        <div style="margin-top: 2rem;">
            <a href="{{ route('patients.edit', $patient) }}" class="btn">Edit</a>
            <a href="{{ route('patients.index') }}" class="btn" style="background-color: #95a5a6;">Back</a>
        </div>
    </div>
</div>
@endsection
