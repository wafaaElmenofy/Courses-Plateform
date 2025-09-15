@extends('layouts.main')

@section('content')
<div class="container">
    <h2>{{ $course->title }}</h2>

    <p><strong>Description:</strong> {{ $course->description }}</p>
    <p><strong>Start Date:</strong> {{ $course->start_date }}</p>
    <p><strong>Max Students:</strong> {{ $course->max_students }}</p>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
</div>
@endsection
