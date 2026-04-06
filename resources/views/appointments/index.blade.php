@extends('layouts.app')

@section('title', 'Appointments')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h1>Appointments</h1>
    <a href="{{ route('appointments.create') }}" class="btn">Schedule Appointment</a>
</div>

<div class="card">
    @if($appointments->count())
        <table>
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient->user->name }}</td>
                        <td>{{ $appointment->doctor->user->name }}</td>
                        <td>{{ $appointment->appointment_date->format('M d, Y') }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>{{ ucfirst($appointment->status) }}</td>
                        <td>
                            <a href="{{ route('appointments.show', $appointment) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.875rem;">View</a>
                            <a href="{{ route('appointments.edit', $appointment) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Edit</a>
                            <form method="POST" action="{{ route('appointments.destroy', $appointment) }}" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Delete</button>
                            </form>
                            @if($appointment->deleted_at)
                                <form method="POST" action="{{ route('appointments.restore', $appointment->id) }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Restore</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $appointments->links() }}
    @else
        <p>No appointments scheduled</p>
    @endif
</div>
@endsection
