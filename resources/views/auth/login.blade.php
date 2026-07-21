@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <h2 class="mb-4 text-center">Iniciar Sesión</h2>

            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <!-- Correo -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña con botón de ver/ocultar -->
                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Contraseña</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-label="Mostrar contraseña">
                            <!-- Icono Ojo Abierto (Visible por defecto) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="icon-open">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <!-- Icono Ojo Tachado (Oculto por defecto) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="icon-closed d-none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botón principal de acción -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Ingresar a mi cuenta
                    </button>
                </div>
            </form>

            <!-- Separador visual para usuarios nuevos -->
            <div class="text-center my-4">
                <span class="bg-white px-3 text-muted small">¿Eres nuevo aquí?</span>
            </div>
            <hr class="my-0 text-muted opacity-25" style="margin-top: -10px; margin-bottom: 20px;">

            <!-- Botón llamativo y amigable para registrarse -->
            <div class="d-grid">
                <a href="{{ route('register.form') }}" class="btn btn-outline-primary btn-lg d-flex align-items-center justify-content-center py-3">
                    <!-- Icono más visible -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="me-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    <span class="fw-bold">Crear una cuenta nueva</span>
                </a>
            </div>
            
            <p class="text-center text-muted small mt-3">
                Es rápido, gratis y solo te tomará un minuto.
            </p>

        </div>
    </div>
</div>

<!-- Script para mostrar/ocultar contraseña -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Función reutilizable para alternar la visibilidad
    function setupPasswordToggle(inputId, buttonId) {
        const input = document.getElementById(inputId);
        const button = document.getElementById(buttonId);
        const iconOpen = button.querySelector('.icon-open');
        const iconClosed = button.querySelector('.icon-closed');

        button.addEventListener('click', function() {
            // Alternar el tipo de input entre 'password' y 'text'
            const isPassword = input.getAttribute('type') === 'password';
            input.setAttribute('type', isPassword ? 'text' : 'password');
            
            // Alternar la visibilidad de los iconos
            if (isPassword) {
                iconOpen.classList.add('d-none');
                iconClosed.classList.remove('d-none');
            } else {
                iconOpen.classList.remove('d-none');
                iconClosed.classList.add('d-none');
            }
        });
    }

    // Inicializar solo para el campo de contraseña del login
    setupPasswordToggle('password', 'togglePassword');
});
</script>
@endsection