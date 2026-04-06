@extends('layouts.app')

@section('title', 'Doctor Details')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <h2>{{ $doctor->user->name }}</h2>
        
        <p><strong>Email:</strong> {{ $doctor->user->email }}</p>
        <p><strong>Department:</strong> {{ $doctor->department }}</p>
        <p><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
        <p><strong>License Number:</strong> {{ $doctor->license_number }}</p>
        <p><strong>Phone:</strong> {{ $doctor->phone }}</p>

        <div style="margin-top: 2rem;">
            <a href="{{ route('doctors.edit', $doctor) }}" class="btn">Edit</a>
            <a href="{{ route('doctors.index') }}" class="btn" style="background-color: #95a5a6;">Back</a>
        </div>
    </div>
</div>
@endsection
