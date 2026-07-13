@extends('layouts.app')

@section('title', $destination->name)

@section('content')
<div class="destination-hero">
    {{-- Hero Image Section --}}
    <div class="position-relative overflow-hidden">
        @if($destination->image)
            <img src="{{ asset('storage/' . $destination->image) }}" 
                 alt="{{ $destination->name }}" 
                 class="hero-image w-100 image-clickable"
                 style="height: 60vh; object-fit: cover; cursor: pointer;">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="container">
                    <h1 class="display-4 fw-bold text-white mb-3">{{ $destination->name }}</h1>
                    <p class="lead text-white">
                        <i class="bi bi-geo-alt-fill"></i> {{ $destination->location }}
                    </p>
                </div>
            </div>
        @else
            <img src="{{ asset('images/no-image.jpg') }}" 
                 alt="Sin imagen" 
                 class="hero-image w-100"
                 style="height: 60vh; object-fit: cover;">
        @endif
    </div>
</div>

{{-- Main Content --}}
<div class="container py-5">
    <div class="row g-4">
        {{-- Description Column --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h2 class="h4 mb-4 fw-bold text-dark">
                        <i class="bi bi-info-circle text-primary me-2"></i>Descripción
                    </h2>
                    <p class="text-muted lh-lg" style="text-align: justify;">
                        {{ $destination->description }}
                    </p>
                    
                    {{-- Features Section --}}
                    <div class="row mt-4 g-3">
                        <div class="col-md-4">
                            <div class="feature-box text-center p-3">
                                <i class="bi bi-camera text-primary fs-2 mb-2"></i>
                                <p class="small mb-0 text-muted">Paisajes increíbles</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box text-center p-3">
                                <i class="bi bi-shield-check text-success fs-2 mb-2"></i>
                                <p class="small mb-0 text-muted">Viaje seguro</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box text-center p-3">
                                <i class="bi bi-star-fill text-warning fs-2 mb-2"></i>
                                <p class="small mb-0 text-muted">Experiencia única</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Booking Card Column --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-lg sticky-top" style="top: 20px;">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <p class="text-muted small mb-2">Precio por persona</p>
                        <h2 class="display-5 fw-bold text-success mb-0">
                            S/. {{ number_format($destination->price, 2) }}
                        </h2>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('reservas.create', ['destino_id' => $destination->id]) }}" 
                           class="btn btn-primary btn-lg py-3 fw-bold">
                            <i class="bi bi-calendar-check me-2"></i>Reservar Ahora
                        </a>
                        
                        <a href="{{ route('destinations.index') }}" 
                           class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Ver más destinos
                        </a>
                    </div>
                    
                    {{-- Additional Info --}}
                    <div class="mt-4 pt-3 border-top">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-clock text-primary me-3 fs-5"></i>
                            <div>
                                <p class="small text-muted mb-0">Duración</p>
                                <p class="mb-0 fw-semibold">Día completo</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-people text-primary me-3 fs-5"></i>
                            <div>
                                <p class="small text-muted mb-0">Grupo</p>
                                <p class="mb-0 fw-semibold">Mínimo 2 personas</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-telephone text-primary me-3 fs-5"></i>
                            <div>
                                <p class="small text-muted mb-0">Soporte 24/7</p>
                                <p class="mb-0 fw-semibold">Atención inmediata</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal para mostrar imagen completa --}}
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3" 
                        data-bs-dismiss="modal" aria-label="Close"></button>
                <img id="modalImage" src="" alt="Imagen destino" class="img-fluid rounded-3 w-100">
            </div>
        </div>
    </div>
</div>

{{-- Custom Styles --}}
<style>
    .hero-image {
        transition: transform 0.3s ease;
    }
    
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6));
    }
    
    .hero-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 3rem 0;
        z-index: 2;
    }
    
    .feature-box {
        background: #f8f9fa;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .feature-box:hover {
        background: #e9ecef;
        transform: translateY(-5px);
    }
    
    .card {
        border-radius: 16px;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }
    
    .btn-outline-secondary {
        border-radius: 12px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }
    
    .btn-outline-secondary:hover {
        background: #f8f9fa;
        border-color: #dee2e6;
        transform: translateY(-2px);
    }
    
    .shadow-lg {
        box-shadow: 0 10px 40px rgba(0,0,0,0.1) !important;
    }
    
    @media (max-width: 991px) {
        .hero-content h1 {
            font-size: 2rem;
        }
        
        .hero-image {
            height: 40vh !important;
        }
    }
</style>

{{-- Script para ampliar imagen --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const image = document.querySelector('.image-clickable');
        const modalImage = document.getElementById('modalImage');
        const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));

        if (image) {
            image.addEventListener('click', function () {
                modalImage.src = this.src;
                imageModal.show();
            });
        }
    });
</script>
@endsection