<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            padding: 2rem;
        }
        .panel-title {
            text-align: center;
            margin-bottom: 1rem;
            font-weight: bold;
            font-size: 1.75rem; /* Slightly larger font */
            color: #aa3e50; /* Elegant dark shade */
            padding: 0.5rem 1rem;
          
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-nav .nav-link {
            font-size: 1.2rem;
         
            text-transform: uppercase;
            color: #fff !important;
        }
        .navbar-nav .nav-link:hover {
            color: #d4d4d4 !important;
        }
        .footer {
            text-align: center;
            padding: 1rem;
            background-color: #333;
            color: white;
            width: 100%;
        }
        
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg mb-3">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projects DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Project Gallaries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="content container-fluid flex-grow-1">
        <!-- Title Above Panels -->
        @yield('content')
    
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Mandera County Government. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
