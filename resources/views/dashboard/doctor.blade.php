<div class="card">
    <h2>My Appointments</h2>
    
    @if($appointments->count())
        <table>
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient->user->name }}</td>
                        <td>{{ $appointment->appointment_date->format('M d, Y') }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>{{ ucfirst($appointment->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No appointments scheduled</p>
    @endif
</div>
