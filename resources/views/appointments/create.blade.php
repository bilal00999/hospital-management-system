@extends('layouts.app')

@section('title', 'Schedule Appointment')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <h2>Schedule Appointment</h2>
        
        <form method="POST" action="{{ route('appointments.store') }}">
            @csrf

            <div class="form-group">
                <label for="patient_id">Patient</label>
                <select id="patient_id" name="patient_id" required>
                    <option value="">Select Patient</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                            {{ $patient->user->name }}
                        </option>
                    @endforeach
                </select>
                @error('patient_id')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="doctor_id">Doctor</label>
                <select id="doctor_id" name="doctor_id" required>
                    <option value="">Select Doctor</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->user->name }} - {{ $doctor->specialization }}
                        </option>
                    @endforeach
                </select>
                @error('doctor_id')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="appointment_date">Date</label>
                <input type="date" id="appointment_date" name="appointment_date" value="{{ old('appointment_date') }}" required>
                @error('appointment_date')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="appointment_time">Time</label>
                <input type="time" id="appointment_time" name="appointment_time" value="{{ old('appointment_time') }}" required>
                @error('appointment_time')<div class="error-message">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes">{{ old('notes') }}</textarea>
            </div>

            <button type="submit" class="btn" style="width: 100%;">Schedule Appointment</button>
        </form>
    </div>
</div>
@endsection
