<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescue Pet - Tu Aliado en el Cuidado Animal</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://unpkg.com/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav id="main-nav" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Logo de Rescue Pet -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="https://png.pngtree.com/png-vector/20230124/ourmid/pngtree-pet-care-logo-png-image_6571337.png" 
                     alt="Logo Rescue Pet" 
                     style="width: 75px; height: 75px;" 
                     class="me-2">
                <span class="fw-bold text-white" style="font-size: 2rem;">Rescue Pet</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/nosotros') }}">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/mascotas') }}">Mascotas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/servicios') }}">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/citas') }}">Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/adopciones') }}">Adopciones</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p>Síguenos en nuestras redes sociales:</p>
            <div class="d-flex justify-content-center">
                <a href="https://www.facebook.com" target="_blank" class="text-white mx-2">
                    <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://www.twitter.com" target="_blank" class="text-white mx-2">
                    <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://www.instagram.com" target="_blank" class="text-white mx-2">
                    <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://www.github.com" target="_blank" class="text-white mx-2">
                    <i class="bi bi-github" style="font-size: 1.5rem;"></i>
                </a>
            </div>
            <p class="mt-3">&copy; 2024 Rescue Pet. Todos los derechos reservados.</p>
        </div>
    </footer>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
