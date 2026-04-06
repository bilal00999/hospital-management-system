@extends('layouts.app')

@section('title', 'Edit Doctor')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <h2>Edit Doctor</h2>
        
        <form method="POST" action="{{ route('doctors.update', $doctor) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $doctor->user->name) }}" required>
                @error('name')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $doctor->user->email) }}" required>
                @error('email')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" id="department" name="department" value="{{ old('department', $doctor->department) }}" required>
                @error('department')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="specialization">Specialization</label>
                <input type="text" id="specialization" name="specialization" value="{{ old('specialization', $doctor->specialization) }}" required>
                @error('specialization')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="license_number">License Number</label>
                <input type="text" id="license_number" name="license_number" value="{{ old('license_number', $doctor->license_number) }}" required>
                @error('license_number')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $doctor->phone) }}" required>
                @error('phone')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn" style="width: 100%;">Update Doctor</button>
        </form>
    </div>
</div>
@endsection
