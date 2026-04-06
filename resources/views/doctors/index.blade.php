@extends('layouts.app')

@section('title', 'Doctors')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h1>Doctors</h1>
    <a href="{{ route('doctors.create') }}" class="btn">Add Doctor</a>
</div>

<div class="card">
    @if($doctors->count())
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Specialization</th>
                    <th>License Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->user->name }}</td>
                        <td>{{ $doctor->user->email }}</td>
                        <td>{{ $doctor->department }}</td>
                        <td>{{ $doctor->specialization }}</td>
                        <td>{{ $doctor->license_number }}</td>
                        <td>
                            <a href="{{ route('doctors.show', $doctor) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.875rem;">View</a>
                            <a href="{{ route('doctors.edit', $doctor) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Edit</a>
                            <form method="POST" action="{{ route('doctors.destroy', $doctor) }}" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Delete</button>
                            </form>
                            @if($doctor->deleted_at)
                                <form method="POST" action="{{ route('doctors.restore', $doctor->id) }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Restore</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $doctors->links() }}
    @else
        <p>No doctors found</p>
    @endif
</div>
@endsection
