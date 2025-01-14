<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dog Responses</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-..." crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="col-md-8 text-center">
                <h1 class="mb-4">Welcome to Dog Responses</h1>
                <p class="mb-4">Explore HTTP status codes with adorable dog images!</p>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 gap-3">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">Register</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>
