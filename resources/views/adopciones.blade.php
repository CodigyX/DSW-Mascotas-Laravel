@extends('layouts.template')

@section('content')

<section class="hero text-white text-center py-5" style="background: linear-gradient(135deg, #343a40, #17a2b8);">
    <div class="container">
        <h1 class="display-4 fw-bold">Gestión de Adopciones</h1>
        <p class="lead mt-3">Administra las adopciones de las mascotas y realiza las gestiones necesarias.</p>
    </div>
</section>

<div class="container mt-5">
    <h1>Gestión de Adopciones</h1>

    <!-- Botón para abrir el modal de agregar adopción -->
    <button  
        class="btn btn-sm text-white fw-bold border-0" 
        style="background-color: #343a40; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); font-size: 1.1rem;" 
        data-bs-toggle="modal" 
        data-bs-target="#modalAdopcion" 
        onclick="limpiarModal()">
        + Agregar Adopción
    </button>
    
    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Modal para agregar o editar adopción -->
    <div class="modal fade" id="modalAdopcion" tabindex="-1" aria-labelledby="modalAdopcionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdopcionLabel">Agregar/Editar Adopción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAdopcion" method="POST" action="" onsubmit="return validarFormulario()">
                        @csrf
                        <input type="hidden" id="adopcionId" name="id">
                        
                        <!-- Selección de mascota -->
                        <div class="mb-3">
                            <label for="mascota" class="form-label">Mascota</label>
                            <select id="mascota" name="mascota_id" class="form-select">
                                @foreach($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Nombre de la mascota -->
                        <div class="mb-3">
                            <label for="nombre_mascota" class="form-label">Nombre de la Mascota</label>
                            <input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota" required>
                        </div>

                        <!-- Edad de la mascota -->
                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" class="form-control" id="edad" name="edad" required>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                        </div>

                        <!-- Imagen URL -->
                        <div class="mb-3">
                            <label for="imagen_url" class="form-label">URL de la Imagen</label>
                            <input type="url" class="form-control" id="imagen_url" name="imagen_url">
                        </div>

                        <!-- Estado de la adopción -->
                        <div class="mb-3">
                            <label for="estado_adopcion" class="form-label">Estado de la Adopción</label>
                            <select id="estado_adopcion" name="estado_adopcion" class="form-select">
                                <option value="disponible">Disponible</option>
                                <option value="adoptado">Adoptado</option>
                                <option value="reservado">Reservado</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de adopciones existentes -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre de la Mascota</th>
                <th>Edad</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adopciones as $adopcion)
                <tr>
                    <td>{{ $adopcion->nombre_mascota }}</td>
                    <td>{{ $adopcion->edad }}</td>
                    <td>{{ $adopcion->descripcion }}</td>
                    <td>
                        @if($adopcion->imagen_url)
                            <img src="{{ $adopcion->imagen_url }}" alt="Imagen de la mascota" width="100">
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>{{ ucfirst($adopcion->estado_adopcion) }}</td>
                    <td>
                        <!-- Botón para editar adopción -->
                        <button class="btn btn-warning btn-sm"
                            onclick="editarAdopcion('{{ $adopcion->id }}', '{{ $adopcion->mascota_id }}', '{{ $adopcion->nombre_mascota }}', '{{ $adopcion->edad }}', '{{ $adopcion->descripcion }}', '{{ $adopcion->imagen_url }}', '{{ $adopcion->estado_adopcion }}')">
                            <i class="bi bi-pencil-fill"></i>
                        </button>

                        <!-- Formulario para eliminar adopción -->
                        <form action="{{ route('adopciones.destroy', $adopcion->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirmarEliminacion()">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Función para editar una adopción
    function editarAdopcion(id, mascota_id, nombre_mascota, edad, descripcion, imagen_url, estado_adopcion) {
        document.getElementById('adopcionId').value = id;
        document.getElementById('mascota').value = mascota_id;
        document.getElementById('nombre_mascota').value = nombre_mascota;
        document.getElementById('edad').value = edad;
        document.getElementById('descripcion').value = descripcion;
        document.getElementById('imagen_url').value = imagen_url;
        document.getElementById('estado_adopcion').value = estado_adopcion;

        document.getElementById('modalAdopcionLabel').textContent = 'Editar Adopción';
        document.getElementById('formAdopcion').action = `/adopciones/${id}`;
        document.getElementById('formAdopcion').method = 'POST';
        var hiddenMethod = document.createElement('input');
        hiddenMethod.type = 'hidden';
        hiddenMethod.name = '_method';
        hiddenMethod.value = 'PUT';
        document.getElementById('formAdopcion').appendChild(hiddenMethod);

        var modal = new bootstrap.Modal(document.getElementById('modalAdopcion'));
        modal.show();
    }

    // Función para limpiar el modal
    function limpiarModal() {
        document.getElementById('adopcionId').value = '';
        document.getElementById('mascota').value = '';
        document.getElementById('nombre_mascota').value = '';
        document.getElementById('edad').value = '';
        document.getElementById('descripcion').value = '';
        document.getElementById('imagen_url').value = '';
        document.getElementById('estado_adopcion').value = 'disponible';

        document.getElementById('modalAdopcionLabel').textContent = 'Agregar Adopción';
        document.getElementById('formAdopcion').action = '/adopciones';
        document.getElementById('formAdopcion').method = 'POST';
    }

    // Función para confirmar eliminación
    function confirmarEliminacion() {
        return confirm('¿Estás seguro de que deseas eliminar esta adopción? Esta acción no se puede deshacer.');
    }

    // Función para validar el formulario
    function validarFormulario() {
        let nombreMascota = document.getElementById('nombre_mascota').value;
        let edad = document.getElementById('edad').value;
        let descripcion = document.getElementById('descripcion').value;

        if (!nombreMascota || !edad || !descripcion) {
            alert('Por favor, complete todos los campos obligatorios.');
            return false; // Evitar el envío del formulario
        }

        return true; // Permitir el envío del formulario
    }
</script>

@endsection
