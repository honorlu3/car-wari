@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
        <div class="card-header bg-primary text-white text-center">
            <h4><i class="bi bi-person-circle"></i> Mi Perfil</h4>
        </div>

        <div class="card-body text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
                 alt="Avatar" 
                 class="rounded-circle mb-3" 
                 width="120" height="120">

            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
            <p class="text-muted mb-1">{{ Auth::user()->email }}</p>
            <p class="text-muted mb-3">{{ Auth::user()->phone }}</p>

            <p class="small text-muted">
                <i class="bi bi-calendar-check"></i> Registrado el {{ Auth::user()->created_at->format('d/m/Y') }}
            </p>

            <hr>

            <a href="{{ route('reservas.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-journal-bookmark"></i> Mis Reservas
            </a>

            <a href="{{ route('logout') }}" 
               class="btn btn-outline-danger ms-2"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <i class="bi bi-box-arrow-right"></i> Cerrar sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
