@extends('layouts.app')

@section('title','Profile')

@section('content')
<div class="dashboard-wrapper py-5">

    @if($role === 'student')
        
        <div class="card shadow-lg p-4 bg-glass">
            <h2 class="text-primary mb-4">hellow</h2>
            <p class="text-muted">the course you loging</p>

            @if(count($courses) > 0)
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-md-4 mt-3">
                            <div class="card border-info hover-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->title }}</h5>
                                    <p class="card-text text-muted">{{ $course->description }}</p>
                                    <small>the date {{ $course->start_date }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="mt-3 text-danger">you should register first</p>
            @endif
        </div>

    @elseif($role === 'instructor')
        
        <div class="card shadow-lg p-4 bg-glass">
            <h2 class="text-success mb-4">Hellow</h2>
            <p class="text-muted">your courses</p>

            @if(count($mycourses) > 0)
                <table class="table table-hover table-bordered mt-4 bg-white rounded">
                    <thead class="table-dark">
                        <tr>
                            <th>the course</th>
                            <th>the number of students:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mycourses as $course)
                            <tr class="hover-row">
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->students->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="mt-3 text-danger">you didnot register</p>
            @endif
        </div>
    @endif
</div>
@endsection