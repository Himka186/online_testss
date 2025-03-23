<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>605-11 Himochkin</title>
</head>
<body>
    <div class="container" style="margin-top: 80px">
        @error('email')
        <div class="alert alert-warning" role="alert">
            {{ $message }}
        </div>
        @enderror
        @error('password')
        <div class="alert alert-warning" role="alert">
            {{ $message }}
        </div>
        @enderror
        @error('error')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
