@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <h2>Edit Patient</h2>
        
        <form method="POST" action="{{ route('patients.update', $patient) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $patient->user->name) }}" required>
                @error('name')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $patient->user->email) }}" required>
                @error('email')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $patient->date_of_birth->format('Y-m-d')) }}" required>
                @error('date_of_birth')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="M" {{ old('gender', $patient->gender) == 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ old('gender', $patient->gender) == 'F' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender', $patient->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="blood_type">Blood Type</label>
                <input type="text" id="blood_type" name="blood_type" value="{{ old('blood_type', $patient->blood_type) }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $patient->phone) }}" required>
                @error('phone')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="medical_history">Medical History</label>
                <textarea id="medical_history" name="medical_history">{{ old('medical_history', $patient->medical_history) }}</textarea>
            </div>

            <button type="submit" class="btn" style="width: 100%;">Update Patient</button>
        </form>
    </div>
</div>
@endsection
