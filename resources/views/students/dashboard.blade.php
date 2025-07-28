@extends('students.layouts.app')

@section('title', 'Student Dashboard')

@section('content')
    <div class="row">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <p>Email: {{ Auth::user()->email }}</p>
    </div>
@endsection
