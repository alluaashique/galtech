<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS here -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
  
    @yield('content')

    <!-- JS here -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>