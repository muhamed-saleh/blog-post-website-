<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BlogSpace')</title>
    
    {{-- This correctly links to YOUR custom stylesheet --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    {{-- This links to Font Awesome for icons, from your original file --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <div class="nav-brand">
                <a href="{{ url('/') }}">
                    <h1><i class="fas fa-blog"></i> BlogSpace</h1>
                </a>
            </div>
            <nav class="nav-menu">
                <a href="/" class="nav-link">Home</a>
                
                @auth
                    {{-- This content shows ONLY if the user is logged in --}}
                    <a href="{{ route('posts.create') }}" class="nav-link">Write</a>                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    
                    {{-- Logout is a form for security --}}
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link logout-btn">Logout</button>
                    </form>
                @else
                    {{-- This content shows ONLY if the user is a guest --}}
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="main-container">
        {{-- This is the placeholder for your page content --}}
        @yield('content')
    </main>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>