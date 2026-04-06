@extends('layouts.app')

@section('title', 'Add Patient')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <h2>Add Patient</h2>
        
        <form method="POST" action="{{ route('patients.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                @error('date_of_birth')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="blood_type">Blood Type</label>
                <input type="text" id="blood_type" name="blood_type" value="{{ old('blood_type') }}" placeholder="e.g., O+">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="medical_history">Medical History</label>
                <textarea id="medical_history" name="medical_history">{{ old('medical_history') }}</textarea>
            </div>

            <button type="submit" class="btn" style="width: 100%;">Add Patient</button>
        </form>
    </div>
</div>
@endsection
