@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <h2 class="mb-4 text-center">Crear tu Cuenta</h2>

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

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <!-- Nombre -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre completo</label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Correo -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">N° de teléfono</label>
                    <input type="tel" name="phone" id="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" value="{{ old('phone') }}" >
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña con botón de ver/ocultar -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Contraseña</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required placeholder="Mínimo 8 caracteres">
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

                <!-- Confirmar Contraseña con botón de ver/ocultar -->
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirmar Contraseña</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg">
                        <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirmation" aria-label="Mostrar confirmación de contraseña">
                            <!-- Icono Ojo Abierto -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="icon-open">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <!-- Icono Ojo Tachado -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="icon-closed d-none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Botón principal de acción -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-success btn-lg">
                        Crear mi cuenta
                    </button>
                </div>
            </form>

            <!-- Separador visual -->
            <div class="text-center my-4">
                <span class="bg-white px-3 text-muted small">¿Ya tienes una cuenta?</span>
            </div>
            <hr class="my-0 text-muted opacity-25" style="margin-top: -10px; margin-bottom: 20px;">

            <!-- Botón para ir al Login -->
            <div class="d-grid">
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg d-flex align-items-center justify-content-center py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="me-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span class="fw-bold">Iniciar Sesión</span>
                </a>
            </div>
            
            <p class="text-center text-muted small mt-3">
                Al registrarte, aceptas nuestros términos y condiciones.
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

    // Inicializar para ambos campos de contraseña
    setupPasswordToggle('password', 'togglePassword');
    setupPasswordToggle('password_confirmation', 'togglePasswordConfirmation');
});
</script>
@endsection