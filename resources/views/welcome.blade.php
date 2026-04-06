@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="card">
    <h1>Welcome to Hospital Management System</h1>
    <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.5rem;">
        A comprehensive system for managing hospital operations including patients, doctors, and appointments.
    </p>
    
    @if(!auth()->check())
        <div style="margin-top: 2rem;">
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn" style="background-color: #27ae60;">Register</a>
        </div>
    @endif

    <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #ddd;">
        <h3>Features:</h3>
        <ul style="margin-left: 1.5rem; line-height: 1.8;">
            <li>User Authentication (Admin, Doctor, Patient)</li>
            <li>Patient Management</li>
            <li>Doctor Management</li>
            <li>Appointment Scheduling</li>
            <li>Soft Delete Support</li>
            <li>Form Validation</li>
            <li>SQLite Database</li>
        </ul>
    </div>
</div>
@endsection
