<div class="stats">
    <div class="stat-card">
        <h3>Total Patients</h3>
        <div class="number">{{ $stats['total_patients'] }}</div>
    </div>
    <div class="stat-card">
        <h3>Total Doctors</h3>
        <div class="number">{{ $stats['total_doctors'] }}</div>
    </div>
    <div class="stat-card">
        <h3>Total Appointments</h3>
        <div class="number">{{ $stats['total_appointments'] }}</div>
    </div>
    <div class="stat-card">
        <h3>Pending Appointments</h3>
        <div class="number">{{ $stats['pending_appointments'] }}</div>
    </div>
</div>

<div class="card">
    <h2>Quick Actions</h2>
    <a href="{{ route('patients.create') }}" class="btn">Add Patient</a>
    <a href="{{ route('doctors.create') }}" class="btn">Add Doctor</a>
    <a href="{{ route('appointments.create') }}" class="btn">Schedule Appointment</a>
</div>
