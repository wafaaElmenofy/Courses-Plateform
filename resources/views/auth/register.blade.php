<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ٌRegister</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error) 
                   <li>{{error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<form method="PoST" action="/register">
    @csrf
    <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="">Select Role</option>
                <option value="student" {{ old('role')=='student'?'selected':'' }}>Student</option>
                <option value="instructor" {{ old('role')=='instructor'?'selected':'' }}>Instructor</option>
            </select>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Register</button>

</form>

<p class="mt-3 text-center">
        Already have an account? <a href="/login">Login</a>
</p>

    
</body>
</html>