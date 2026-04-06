@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>

@if(auth()->user()->isAdmin())
    @include('dashboard.admin')
@elseif(auth()->user()->isDoctor())
    @include('dashboard.doctor')
@elseif(auth()->user()->isPatient())
    @include('dashboard.patient')
@endif
@endsection
