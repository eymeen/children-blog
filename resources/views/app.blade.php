<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <!-- Navigation -->
        <nav>
            <a href="{{ route('posts.index') }}">Home</a>
            <a href="{{ route('posts.create') }}">Create Post</a>
        </nav>
        <hr>

        <!-- Content Section -->
        @yield('content')
    </div>
</body>
</html>
