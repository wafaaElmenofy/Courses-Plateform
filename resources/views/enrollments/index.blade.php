<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Available Courses</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      min-height: 100vh;
      background: linear-gradient(120deg, #1c92d2, #f2fcfe);
      font-family: 'Poppins', sans-serif;
      padding-bottom: 60px;
    }
    .container-box {
      margin-top: 120px;
      border-radius: 25px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
      padding: 30px;
      background: rgba(255,255,255,0.15);
      backdrop-filter: blur(20px);
      animation: fadeSlideIn 1s ease-in-out;
    }
    .course-card {
      background: rgba(255,255,255,0.3);
      border: none;
      border-radius: 15px;
      padding: 20px;
      transition: 0.3s;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .course-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 12px rgba(0,0,0,0.2);
    }
    .btn-enroll {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 20px;
      text-align: center;
      transition: background-color 0.3s ease;
      font-weight: bold;
    }
    .btn-enroll:hover {
      background-color: #0056b3;
    }
    .footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #343a40;
      color: white;
    }
    .navbar {
      background: rgba(255,255,255,0.2);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-graduation-cap"></i> EduPlatform
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="/register" class="btn btn-outline-light me-2 px-3">Register</a>
          </li>
          <li class="nav-item">
            <a href="/login" class="btn btn-outline-light px-3">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container container-box">
    <h2 class="text-white text-center mb-4">Available Courses</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <div class="row">
      @foreach($courses as $course)
        <div class="col-md-4 mb-4">
          <div class="course-card h-100 d-flex flex-column justify-content-between">
            <div>
              <h5 class="fw-bold">{{ $course->title }}</h5>
              <p>{{ $course->description }}</p>
              <p>Start: {{ $course->start_date }}</p>
              <p>Enrolled: {{ $course->students->count() }}/{{ $course->max_students }}</p>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0">
    @if(session('user_id'))
        @if(session('user_role') === 'student')
            @if($course->is_enrolled)
                <p class="text-success fw-bold">Enrolled</p>
                <form action="{{ route('courses.unenroll', $course->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-warning w-100">Unenroll</button>
                </form>
            @else
                <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-enroll w-100">Enroll</button>
                </form>
            @endif
        @else
            @endif
    @else
        <a href="{{ route('login') }}" class="btn-enroll w-100 text-decoration-none">Login to Enroll</a>
    @endif
</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <footer class="footer text-center text-white py-3">
    &copy; 2025 EduPlatform. All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
