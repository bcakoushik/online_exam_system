@extends('teachers.layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')
    <div class="row">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <p>Email: {{ Auth::user()->email }}</p>
    </div>
@endsection
