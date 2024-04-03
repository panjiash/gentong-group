<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT XYZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center pt-5">
            <h1 class="text-center">Welcome to PT XYZ</h1>
            @if (Route::has("login"))
            @auth
            <div class="col-2 d-grid">
                <a href="/home" class="btn btn-primary">Dashboard</a>
            </div>
            @else
            <div class="col-2 d-grid">
                <a href="/login" class="btn btn-primary">Login</a>
            </div>
            <!-- <div class="col-2 d-grid">
                <a href="/register" class="btn btn-primary">Register</a>
            </div> -->
            @endauth
            @endif
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>