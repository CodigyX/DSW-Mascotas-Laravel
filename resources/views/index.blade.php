@extends('layouts.template')

@section('content')
<div class="container">

    <!-- Hero Section -->
    <header class="hero text-white text-center py-5" style="background: linear-gradient(135deg, #343a40, #007bff);">
        <div class="container">
            <h1 class="display-4 fw-bold">Bienvenido a Rescue Pet</h1>
            <p class="lead mt-3">¡Un refugio lleno de amor para tus amigos de cuatro patas!</p>
            <a href="{{ url('/mascotas') }}" class="btn btn-light btn-lg mt-3">Explorar Mascotas</a>
        </div>
    </header>

    <!-- Features Section -->
    <section class="features py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Lo Que Nos Hace Únicos</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://www.abc-aufkleber.de/bilder/produkte/content/hundeaufkleber-save-life-adopt-a-pet-aa719.jpg" alt="Dog" class="card-img-top">
                        <div class="card-body text-center">
                            <h3 class="card-title">Adopta un Amigo</h3>
                            <p class="card-text">Encuentra a tu próximo compañero fiel en nuestro refugio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://static.vecteezy.com/system/resources/previews/015/153/759/original/veterinary-care-logo-outline-style-vector.jpg" alt="Veterinary Care" class="card-img-top">
                        <div class="card-body text-center">
                            <h3 class="card-title">Cuidados Especializados</h3>
                            <p class="card-text">Recibe consejos y apoyo de profesionales en bienestar animal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://s3-sa-east-1.amazonaws.com/projetos-artes/fullsize/2018/12/03/15/Logo-249787_141343_155118822_335989301.jpg" alt="Cat" class="card-img-top">
                        <div class="card-body text-center">
                            <h3 class="card-title">Conéctate</h3>
                            <p class="card-text">Únete a una comunidad que comparte tu amor por los animales.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
