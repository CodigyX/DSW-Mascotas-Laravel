<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App - Dark Pastel Theme</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-light" href="#">My Laravel App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero text-center">
        <div class="container">
            <h1>Welcome to My Laravel App</h1>
            <p class="lead">Building modern web applications made easy with Laravel and Bootstrap.</p>
            <a href="#" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </header>

    <!-- Features Section with Images -->
    <section class="feature-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 feature-box">
                    <img src="https://source.unsplash.com/300x200/?technology" alt="Tech Image" class="img-fluid rounded mb-3">
                    <h3>Fast</h3>
                    <p>Experience lightning-fast performance with optimized features.</p>
                </div>
                <div class="col-md-4 feature-box">
                    <img src="https://source.unsplash.com/300x200/?security" alt="Security Image" class="img-fluid rounded mb-3">
                    <h3>Secure</h3>
                    <p>Enhanced security features to keep your data safe.</p>
                </div>
                <div class="col-md-4 feature-box">
                    <img src="https://source.unsplash.com/300x200/?customization" alt="Customization Image" class="img-fluid rounded mb-3">
                    <h3>Customizable</h3>
                    <p>Flexible and easy to customize to your needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p>© 2024 My Laravel App | Designed with Bootstrap 5</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
