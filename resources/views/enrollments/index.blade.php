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
      color: #fff;
    }
    .course-card:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0,0,0,0.3);
    }
    .btn-enroll {
      background: linear-gradient(135deg, #1c92d2, #f2fcfe);
      border: none;
      border-radius: 12px;
      padding: 8px 16px;
      font-weight: bold;
      color: #000;
      transition: 0.3s;
    }
    .btn-enroll:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    nav.navbar {
      animation: slideDown 1.5s ease forwards;
    }
    .footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #164864;
      box-shadow: 0 -4px 8px rgba(0,0,0,0.2);
    }
    @keyframes fadeSlideIn {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #164864; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#" style="font-size: 1.5rem;">
      CourseWay
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        <li class="nav-item ms-lg-3">
          <a href="/login" class="btn btn-outline-light px-3">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <!-- Courses List -->
  <div class="container container-box">
    <h2 class="text-white text-center mb-4">Available Courses</h2>

    <!-- Messages -->
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
            <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn-enroll w-100">Enroll</button>
            </form>
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
