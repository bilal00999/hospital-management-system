@extends('layouts.app')

@section('title', 'Patients')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h1>Patients</h1>
    <a href="{{ route('patients.create') }}" class="btn">Add Patient</a>
</div>

<div class="card">
    @if($patients->count())
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Blood Type</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->user->name }}</td>
                        <td>{{ $patient->user->email }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->blood_type ?? 'N/A' }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>
                            <a href="{{ route('patients.show', $patient) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.875rem;">View</a>
                            <a href="{{ route('patients.edit', $patient) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Edit</a>
                            <form method="POST" action="{{ route('patients.destroy', $patient) }}" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Delete</button>
                            </form>
                            @if($patient->deleted_at)
                                <form method="POST" action="{{ route('patients.restore', $patient->id) }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Restore</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $patients->links() }}
    @else
        <p>No patients found</p>
    @endif
</div>
@endsection
