

@extends('layouts.app')

@section('title', $destination->name . ' | Tour en Ayacucho | Car Wari')

{{-- Meta Description --}}
@section('meta-description', 'Tour a ' . $destination->name . ' en ' . $destination->location . '. Disfruta de una experiencia única con transporte seguro, guía profesional y los mejores precios. Reserva ahora.')

{{-- Meta Keywords --}}
@section('meta-keywords', 'tour ' . $destination->name . ', turismo ' . $destination->location . ', Ayacucho, viaje, aventura, naturaleza, reserva tour, transporte turístico')

{{-- Meta Author --}}
@section('meta-author', 'Tu Agencia de Viajes')

{{-- Canonical URL --}}
@section('canonical-url', url()->current())

{{-- Open Graph Tags --}}
@section('og-type', 'website')
@section('og-title', $destination->name . ' - Tour Turístico en Ayacucho')
@section('og-description', Str::limit($destination->description, 160))
@section('og-image', asset('storage/' . ($destination->image ?? 'images/og-default.jpg')))
@section('og-url', url()->current())
@section('og-site-name', 'Tu Agencia de Viajes')

{{-- Twitter Card Tags --}}
@section('twitter-card', 'summary_large_image')
@section('twitter-title', $destination->name . ' - Tour en Ayacucho')
@section('twitter-description', Str::limit($destination->description, 160))
@section('twitter-image', asset('storage/' . ($destination->image ?? 'images/og-default.jpg')))


@section('content')
{{-- Main Container with Dark Theme --}}
<div class="container-fluid py-4" style="background-color: #000;">
    <div class="container">
        <div class="row g-4">
           {{-- Left Column - Image Gallery --}}
<div class="col-lg-7">
    {{-- Main Image --}}
    <div class="position-relative mb-3">
        @if($destination->image)
            <img id="mainImage"
                 src="{{ asset('storage/' . $destination->image) }}"
                 alt="{{ $destination->name }}"
                 class="img-fluid w-100 image-clickable"
                 style="height: 500px; object-fit: cover; cursor: pointer; border-radius: 20px;"
                 onclick="openImageModal(this.src)">
        @else
            <img id="mainImage"
                 src="{{ asset('images/no-image.jpg') }}"
                 class="img-fluid w-100"
                 style="height: 500px; object-fit: cover; border-radius: 20px;">
        @endif
    </div>

    {{-- Thumbnail Images - 3 columns (mostrando TODAS las imágenes) --}}
    <div class="row g-3">
        @if($destination->image)
            <div class="col-4">
                <img src="{{ asset('storage/'.$destination->image) }}"
                     class="img-fluid gallery-thumb active-thumb w-100"
                     style="height: 140px; object-fit: cover; cursor: pointer; border-radius: 12px;"
                     onclick="changeImage(this.src, this)">
            </div>
        @endif

        @foreach($destination->images as $image)
            <div class="col-4">
                <img src="{{ asset('storage/'.$image->image) }}"
                     class="img-fluid gallery-thumb w-100"
                     style="height: 140px; object-fit: cover; cursor: pointer; border-radius: 12px;"
                     onclick="changeImage(this.src, this)">
            </div>
        @endforeach
    </div>
</div>

            {{-- Right Column - Tour Details --}}
            <div class="col-lg-5">
                <div class="tour-sidebar">
                    {{-- Badge --}}
                    <p class="mb-2" style="color: #FFC107; font-size: 0.875rem; font-weight: 600;">
                        Detalle de tour
                    </p>
                    
                    {{-- Title --}}
                    <h1 class="display-4 fw-bold mb-3 text-white">
                        {{ $destination->name }}
                    </h1>

                    {{-- Location, Duration, Difficulty --}}
                    <div class="d-flex align-items-center gap-2 mb-3" style="color: #888; font-size: 0.9rem;">
                        <i class="bi bi-geo-alt-fill" style="color: #888;"></i>
                        <span>{{ $destination->location }}</span>
                        <span style="color: #444;">·</span>
                        <span>full day</span>
                        <span style="color: #444;">·</span>
                        <span>Full Aventuras</span>
                    </div>

                    {{-- Rating --}}
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div style="color: #FFC107;">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <span style="color: #888; font-size: 0.9rem;">128 reviews</span>
                    </div>

                    {{-- Price --}}
                    <h2 class="display-5 fw-bold mb-4" style="color: #FFC107;">
                        S/ {{ number_format($destination->price, 2) }} <span style="font-size: 1.5rem;">por persona</span>
                    </h2>

                    {{-- Action Buttons --}}
                    <div class="d-flex gap-3 mb-5">
                        @auth
                            <a href="{{ route('reservas.create', ['destino_id' => $destination->id]) }}" 
                               class="btn flex-grow-1 py-3 fw-bold" 
                               style="background-color: #FFC107; color: #000; border: none; border-radius: 25px;">
                                Reservar ahora
                            </a>
                        @else
                            <a href="{{ route('login.form') }}" 
                               class="btn flex-grow-1 py-3 fw-bold" 
                               style="background-color: #FFC107; color: #000; border: none; border-radius: 25px;">
                                Reservar ahora
                            </a>
                        @endauth
                        
                        {{-- Botón Compartir --}}
                            <button class="btn px-4 py-3" 
                                    onclick="showShareModal()"
                                    style="border: 2px solid #FFC107; color: #FFC107; background: transparent; border-radius: 25px;">
                                <i class="bi bi-share me-2"></i>Compartir
                            </button>

                    </div>

                    {{-- Tabs Navigation - Pill Style --}}
                    <ul class="nav nav-pills mb-4 gap-2 flex-wrap" id="tourTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active tab-btn"
                                    id="descripcion-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#descripcion"
                                    type="button"
                                    role="tab"
                                    aria-controls="descripcion"
                                    aria-selected="true"
                                    style="background-color: #FFC107; color: #000; border-radius: 20px; font-weight: 600;">
                                Descripción
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tab-btn"
                                    id="itinerario-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#itinerario"
                                    type="button"
                                    role="tab"
                                    aria-controls="itinerario"
                                    aria-selected="false"
                                    style="background: transparent; color: #888; font-weight: 600;">
                                Itinerario
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tab-btn"
                                    id="incluye-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#incluye"
                                    type="button"
                                    role="tab"
                                    aria-controls="incluye"
                                    aria-selected="false"
                                    style="background: transparent; color: #888; font-weight: 600;">
                                Incluye
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tab-btn"
                                    id="faq-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#faq"
                                    type="button"
                                    role="tab"
                                    aria-controls="faq"
                                    aria-selected="false"
                                    style="background: transparent; color: #888; font-weight: 600;">
                                FAQ
                            </button>
                        </li>
                    </ul>

                    {{-- Tab Content --}}
                    <div class="tab-content" id="tourTabsContent">
                        {{-- Descripción --}}
                        <div class="tab-pane fade show active" id="descripcion" role="tabpanel" aria-labelledby="descripcion-tab">
                            <h4 class="text-white mb-3 fw-bold">Descripción</h4>
                            <p class="mb-0" style="color: #aaa; line-height: 1.7;">
                                {{ $destination->description }}
                            </p>
                        </div>

                        {{-- Itinerario --}}
                        <div class="tab-pane fade" id="itinerario" role="tabpanel" aria-labelledby="itinerario-tab">
                            <h4 class="text-white mb-3 fw-bold">Itinerario</h4>
                            <div style="color: #aaa; line-height: 1.8;">
                                <div class="d-flex align-items-start mb-3">
                                    <i class="bi bi-clock-fill me-2" style="color: #FFC107; font-size: 1.1rem;"></i>
                                    <div>
                                        <strong style="color: #FFC107;">08:30</strong>
                                        <span class="ms-2">Salida · aventuras</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start mb-3">
                                    <i class="bi bi-signpost-split-fill me-2" style="color: #FFC107; font-size: 1.1rem;"></i>
                                    <div>
                                        <strong style="color: #FFC107;">10:00</strong>
                                        <span class="ms-2">Caminata guiada hacia el lugar mágico</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start mb-3">
                                    <i class="bi bi-camera-fill me-2" style="color: #FFC107; font-size: 1.1rem;"></i>
                                    <div>
                                        <strong style="color: #FFC107;">11:00</strong>
                                        <span class="ms-2">Tiempo fotográfico libre</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start mb-3">
                                    <i class="bi bi-cup-hot-fill me-2" style="color: #FFC107; font-size: 1.1rem;"></i>
                                    <div>
                                        <strong style="color: #FFC107;">12:30</strong>
                                        <span class="ms-2">Almuerzo típico</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-house-door-fill me-2" style="color: #FFC107; font-size: 1.1rem;"></i>
                                    <div>
                                        <strong style="color: #FFC107;">16:00</strong>
                                        <span class="ms-2">Retorno al punto de origen</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Incluye --}}
                        <div class="tab-pane fade" id="incluye" role="tabpanel" aria-labelledby="incluye-tab">
                            <h4 class="text-white mb-3 fw-bold">Incluye</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3 d-flex align-items-start" style="color: #aaa;">
                                    <i class="bi bi-check-circle-fill me-2" style="color: #FFC107; font-size: 1.1rem;"></i>
                                    <span>Transporte ida y vuelta</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start" style="color: #aaa;">
                                    <i class="bi bi-check-circle-fill me-2" style="color: #FFC107; font-size: 1.1rem;"></i>
                                    <span>Guía turístico</span>
                                </li>
                              {{-- Incluye  <li class="mb-3 d-flex align-items-start" style="color: #aaa;">
                                    <i class="bi bi-check-circle-fill me-2" style="color: #FFC107; font-size: 1.1rem;"></i>
                                    <span>Desayuno y almuerzo en ruta</span>
                                </li>--}} 
                                <li class="mb-3 d-flex align-items-start" style="color: #aaa;">
                                    <i class="bi bi-check-circle-fill me-2" style="color: #FFC107; font-size: 1.1rem;"></i>
                                    <span>Botiquín de primeros auxilios</span>
                                </li>
                                <li class="d-flex align-items-start" style="color: #aaa;">
                                    <i class="bi bi-check-circle-fill me-2" style="color: #FFC107; font-size: 1.1rem;"></i>
                                    <span>Seguro de viaje</span>
                                </li>
                            </ul>
                        </div>

                        {{-- FAQ --}}
                        <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                            <h4 class="text-white mb-3 fw-bold">Preguntas frecuentes</h4>
                            <div class="accordion accordion-flush" id="faqAccordion">
                                <div class="accordion-item bg-transparent border-bottom" style="border-color: #333 !important;">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-transparent text-white"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq1"
                                                style="padding: 1rem 0;">
                                            ¿Qué debo llevar?
                                        </button>
                                    </h2>
                                    <div id="faq1"
                                         class="accordion-collapse collapse"
                                         data-bs-parent="#faqAccordion">
                                        <div class="accordion-body p-0 pb-3" style="color: #aaa;">
                                            Ropa cómoda, zapatos de trekking, bloqueador solar, gorra, lentes de sol, cámara fotográfica y agua.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent border-bottom" style="border-color: #333 !important;">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-transparent text-white"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq2"
                                                style="padding: 1rem 0;">
                                            ¿Se suspende por lluvia?
                                        </button>
                                    </h2>
                                    <div id="faq2"
                                         class="accordion-collapse collapse"
                                         data-bs-parent="#faqAccordion">
                                        <div class="accordion-body p-0 pb-3" style="color: #aaa;">
                                            Dependiendo de las condiciones climáticas, la agencia informará con 24 horas de anticipación si es necesario reprogramar.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent border-bottom" style="border-color: #333 !important;">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-transparent text-white"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq3"
                                                style="padding: 1rem 0;">
                                            ¿Puedo cancelar mi reserva?
                                        </button>
                                    </h2>
                                    <div id="faq3"
                                         class="accordion-collapse collapse"
                                         data-bs-parent="#faqAccordion">
                                        <div class="accordion-body p-0 pb-3" style="color: #aaa;">
                                            Sí, puedes cancelar hasta 48 horas antes del viaje y te reembolsamos el 100% de tu pago.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent" style="border-color: #333 !important;">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-transparent text-white"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq4"
                                                style="padding: 1rem 0;">
                                            ¿Hay límite de edad?
                                        </button>
                                    </h2>
                                    <div id="faq4"
                                         class="accordion-collapse collapse"
                                         data-bs-parent="#faqAccordion">
                                        <div class="accordion-body p-0 pb-3" style="color: #aaa;">
                                            No hay límite de edad, pero se recomienda tener buena condición física. Menores de edad deben ir acompañados.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Image Modal --}}
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 position-relative">
                <button type="button"
                        class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        style="z-index: 1050;"></button>
                
                {{-- Contenedor de zoom --}}
                <div id="zoomContainer" 
                     class="position-relative d-flex align-items-center justify-content-center"
                     style="min-height: 90vh; overflow: hidden; background: #000;">
                    
                    <img id="modalImage"
                         src=""
                         alt="Imagen destino"
                         class="img-fluid"
                         style="max-height: 90vh; 
                                max-width: 100%; 
                                object-fit: contain;
                                transition: transform 0.2s ease;
                                cursor: zoom-in;
                                transform-origin: center center;
                                user-select: none;
                                -webkit-user-drag: none;">
                </div>
                
                {{-- Botones de navegación (izquierda/derecha) --}}
                <button type="button"
                        class="btn position-absolute top-50 start-0 translate-middle-y ms-3 nav-btn"
                        onclick="previousImage()"
                        style="background: rgba(255,193,7,0.9); border: none; border-radius: 50%; width: 45px; height: 45px; z-index: 1050;">
                    <i class="bi bi-chevron-left text-dark fs-5"></i>
                </button>
                
                <button type="button"
                        class="btn position-absolute top-50 end-0 translate-middle-y me-3 nav-btn"
                        onclick="nextImage()"
                        style="background: rgba(255,193,7,0.9); border: none; border-radius: 50%; width: 45px; height: 45px; z-index: 1050;">
                    <i class="bi bi-chevron-right text-dark fs-5"></i>
                </button>
                
                {{-- Botones de zoom (abajo) --}}
                <button type="button"
                        class="btn zoom-btn zoom-in"
                        onclick="zoomIn()"
                        title="Acercar"
                        style="background: rgba(255,193,7,0.9); border: none; border-radius: 50%; width: 45px; height: 45px; z-index: 1050;">
                    <i class="bi bi-plus-lg text-dark fs-5"></i>
                </button>
                
                <button type="button"
                        class="btn zoom-btn zoom-out"
                        onclick="zoomOut()"
                        title="Alejar"
                        style="background: rgba(255,193,7,0.9); border: none; border-radius: 50%; width: 45px; height: 45px; z-index: 1050;">
                    <i class="bi bi-dash-lg text-dark fs-5"></i>
                </button>
                
                <button type="button"
                        class="btn zoom-btn zoom-reset"
                        onclick="resetZoom()"
                        title="Resetear zoom"
                        style="background: rgba(255,193,7,0.9); border: none; border-radius: 50%; width: 45px; height: 45px; z-index: 1050;">
                    <i class="bi bi-arrows-angle-contract text-dark fs-5"></i>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Estilos del modal con zoom --}}
<style>
/* Fondo negro del modal */
#imageModal .modal-content {
    background: #000 !important;
}

#imageModal .modal-body {
    background: #000 !important;
}

/* Contenedor de zoom */
#zoomContainer {
    cursor: grab;
}

#zoomContainer:active {
    cursor: grabbing;
}

/* Imagen con zoom */
#modalImage.zoomed {
    cursor: move;
    transition: none;
}

/* Botones de zoom */
.zoom-btn {
    position: absolute;
    bottom: 30px;
    transition: all 0.3s ease;
}

.zoom-btn:hover {
    background: rgba(255, 193, 7, 1) !important;
    transform: scale(1.1);
}

.zoom-btn:active {
    transform: scale(0.95);
}

.zoom-in {
    right: 120px;
}

.zoom-out {
    right: 70px;
}

.zoom-reset {
    right: 20px;
}

/* Botones de navegación */
.nav-btn {
    transition: all 0.3s ease;
}

.nav-btn:hover {
    background: rgba(255, 193, 7, 1) !important;
    transform: translateY(-50%) scale(1.1);
}

/* Responsive - Móviles */
@media (max-width: 768px) {
    .zoom-btn {
        width: 40px !important;
        height: 40px !important;
        bottom: 20px;
    }
    
    .zoom-btn i {
        font-size: 18px !important;
    }
    
    .zoom-in {
        right: 100px;
    }
    
    .zoom-out {
        right: 55px;
    }
    
    .zoom-reset {
        right: 10px;
    }
    
    .nav-btn {
        width: 40px !important;
        height: 40px !important;
    }
    
    .nav-btn i {
        font-size: 20px !important;
    }
}
</style>

{{-- JavaScript para zoom y navegación --}}
<script>
// Variables de zoom
let currentZoom = 1;
let currentTranslateX = 0;
let currentTranslateY = 0;
let isDragging = false;
let startX = 0;
let startY = 0;
let allImages = [];
let currentImageIndex = 0;

// Configuración de zoom
const ZOOM_STEP = 0.25;
const MIN_ZOOM = 1;
const MAX_ZOOM = 5;

// Inicializar galería
function initializeGallery() {
    allImages = [];
    
    const mainImage = document.getElementById('mainImage');
    if (mainImage && mainImage.src) {
        allImages.push(mainImage.src);
    }
    
    const thumbnails = document.querySelectorAll('.gallery-thumb');
    thumbnails.forEach(thumb => {
        if (thumb.src && !allImages.includes(thumb.src)) {
            allImages.push(thumb.src);
        }
    });
}

// Abrir modal con imagen
function openImageModal(imageSrc) {
    initializeGallery();
    currentImageIndex = allImages.indexOf(imageSrc);
    if (currentImageIndex === -1) currentImageIndex = 0;
    
    resetZoom();
    document.getElementById('modalImage').src = imageSrc;
    
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
    
    // Agregar event listeners después de abrir el modal
    setTimeout(() => {
        addZoomEventListeners();
    }, 100);
}

// Cambiar imagen principal
function changeImage(imageSrc, element) {
    document.getElementById('mainImage').src = imageSrc;
    
    document.querySelectorAll('.gallery-thumb').forEach(thumb => {
        thumb.classList.remove('active-thumb');
    });
    if (element) {
        element.classList.add('active-thumb');
    }
}

// ============================================
// FUNCIONES DE ZOOM
// ============================================

function addZoomEventListeners() {
    const img = document.getElementById('modalImage');
    const container = document.getElementById('zoomContainer');
    
    if (!img || !container) return;
    
    // Zoom con rueda del mouse (PC)
    container.addEventListener('wheel', handleWheel, { passive: false });
    
    // Zoom con gestos touch (Celular)
    let initialPinchDistance = null;
    
    container.addEventListener('touchstart', handleTouchStart, { passive: false });
    container.addEventListener('touchmove', handleTouchMove, { passive: false });
    container.addEventListener('touchend', handleTouchEnd, { passive: false });
    
    // Drag para mover la imagen cuando hay zoom
    container.addEventListener('mousedown', handleDragStart);
    container.addEventListener('mousemove', handleDragMove);
    container.addEventListener('mouseup', handleDragEnd);
    container.addEventListener('mouseleave', handleDragEnd);
}

// Zoom con rueda del mouse
function handleWheel(e) {
    e.preventDefault();
    
    if (e.deltaY < 0) {
        zoomIn();
    } else {
        zoomOut();
    }
}

// Zoom con touch (pinch)
function handleTouchStart(e) {
    if (e.touches.length === 2) {
        // Pinch gesture
        initialPinchDistance = getPinchDistance(e.touches);
    } else if (e.touches.length === 1 && currentZoom > MIN_ZOOM) {
        // Drag gesture
        isDragging = true;
        startX = e.touches[0].clientX - currentTranslateX;
        startY = e.touches[0].clientY - currentTranslateY;
        document.getElementById('modalImage').classList.add('zoomed');
    }
}

function handleTouchMove(e) {
    e.preventDefault();
    
    if (e.touches.length === 2 && initialPinchDistance) {
        // Pinch zoom
        const currentDistance = getPinchDistance(e.touches);
        const scale = currentDistance / initialPinchDistance;
        const newZoom = currentZoom * scale;
        
        if (newZoom >= MIN_ZOOM && newZoom <= MAX_ZOOM) {
            currentZoom = newZoom;
            updateImageTransform();
        }
        
        initialPinchDistance = currentDistance;
    } else if (e.touches.length === 1 && isDragging) {
        // Drag move
        currentTranslateX = e.touches[0].clientX - startX;
        currentTranslateY = e.touches[0].clientY - startY;
        updateImageTransform();
    }
}

function handleTouchEnd(e) {
    isDragging = false;
    initialPinchDistance = null;
    document.getElementById('modalImage').classList.remove('zoomed');
}

function getPinchDistance(touches) {
    const dx = touches[0].clientX - touches[1].clientX;
    const dy = touches[0].clientY - touches[1].clientY;
    return Math.sqrt(dx * dx + dy * dy);
}

// Drag con mouse
function handleDragStart(e) {
    if (currentZoom > MIN_ZOOM) {
        isDragging = true;
        startX = e.clientX - currentTranslateX;
        startY = e.clientY - currentTranslateY;
        document.getElementById('modalImage').classList.add('zoomed');
    }
}

function handleDragMove(e) {
    if (isDragging) {
        currentTranslateX = e.clientX - startX;
        currentTranslateY = e.clientY - startY;
        updateImageTransform();
    }
}

function handleDragEnd() {
    isDragging = false;
    document.getElementById('modalImage').classList.remove('zoomed');
}

// Funciones de zoom con botones
function zoomIn() {
    if (currentZoom < MAX_ZOOM) {
        currentZoom = Math.min(currentZoom + ZOOM_STEP, MAX_ZOOM);
        updateImageTransform();
    }
}

function zoomOut() {
    if (currentZoom > MIN_ZOOM) {
        currentZoom = Math.max(currentZoom - ZOOM_STEP, MIN_ZOOM);
        if (currentZoom === MIN_ZOOM) {
            resetZoom();
        } else {
            updateImageTransform();
        }
    }
}

function resetZoom() {
    currentZoom = 1;
    currentTranslateX = 0;
    currentTranslateY = 0;
    updateImageTransform();
}

function updateImageTransform() {
    const img = document.getElementById('modalImage');
    if (img) {
        img.style.transform = `translate(${currentTranslateX}px, ${currentTranslateY}px) scale(${currentZoom})`;
    }
}

// ============================================
// NAVEGACIÓN DE IMÁGENES
// ============================================

function previousImage() {
    currentImageIndex = (currentImageIndex - 1 + allImages.length) % allImages.length;
    updateModalImage();
}

function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % allImages.length;
    updateModalImage();
}

function updateModalImage() {
    if (allImages.length > 0) {
        resetZoom();
        document.getElementById('modalImage').src = allImages[currentImageIndex];
    }
}

// Navegación con teclado
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('imageModal');
    if (modal && modal.classList.contains('show')) {
        if (e.key === 'ArrowLeft') {
            previousImage();
        } else if (e.key === 'ArrowRight') {
            nextImage();
        } else if (e.key === 'Escape') {
            const bsModal = bootstrap.Modal.getInstance(modal);
            if (bsModal) {
                bsModal.hide();
            }
        } else if (e.key === '+' || e.key === '=') {
            zoomIn();
        } else if (e.key === '-') {
            zoomOut();
        } else if (e.key === '0') {
            resetZoom();
        }
    }
});

// Inicializar al cargar
document.addEventListener('DOMContentLoaded', function() {
    initializeGallery();
});
</script>

{{-- Share Modal --}}
<div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-0 rounded-4" style="background-color: #1a1a1a;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title text-white fw-bold">Compartir destino</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4">
                {{-- Preview del destino --}}
                <div class="card bg-transparent border-0 mb-4">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . ($destination->image ?? 'images/no-image.jpg')) }}" 
                                 class="img-fluid rounded-start" 
                                 alt="{{ $destination->name }}"
                                 style="height: 100px; object-fit: cover;">
                        </div>
                        <div class="col-8">
                            <div class="card-body py-2 ps-3">
                                <h6 class="card-title text-white fw-bold mb-1">{{ $destination->name }}</h6>
                                <p class="card-text text-muted small mb-2">{{ Str::limit($destination->description, 80) }}</p>
                                <p class="card-text text-warning fw-bold mb-0">S/ {{ number_format($destination->price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Opciones de compartir --}}
                <div class="row g-3">
                    <div class="col-6">
                        <button onclick="shareToFacebook()" class="btn w-100 py-3 rounded-3" style="background-color: #1877F2; color: white;">
                            <i class="bi bi-facebook fs-4"></i>
                            <div class="small mt-1">Facebook</div>
                        </button>
                    </div>
                    <div class="col-6">
                        <button onclick="shareToTwitter()" class="btn w-100 py-3 rounded-3" style="background-color: #1DA1F2; color: white;">
                            <i class="bi bi-twitter fs-4"></i>
                            <div class="small mt-1">Twitter</div>
                        </button>
                    </div>
                    <div class="col-6">
                        <button onclick="shareToWhatsApp()" class="btn w-100 py-3 rounded-3" style="background-color: #25D366; color: white;">
                            <i class="bi bi-whatsapp fs-4"></i>
                            <div class="small mt-1">WhatsApp</div>
                        </button>
                    </div>
                    <div class="col-6">
                        <button onclick="shareToTelegram()" class="btn w-100 py-3 rounded-3" style="background-color: #0088cc; color: white;">
                            <i class="bi bi-telegram fs-4"></i>
                            <div class="small mt-1">Telegram</div>
                        </button>
                    </div>
                    <div class="col-12">
                        <button onclick="copyLink()" class="btn w-100 py-3 rounded-3 border" style="border-color: #FFC107 !important; color: #FFC107; background: transparent;">
                            <i class="bi bi-link-45deg me-2"></i>
                            Copiar enlace
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Toast Notification --}}
<div class="position-fixed bottom-0 start-50 translate-middle-x mb-4" style="z-index: 1050;">
    <div id="shareToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="bi bi-check-circle me-2"></i>
                <span id="toastMessage">Enlace copiado</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<style>
/* ============================================
   ESTILOS GENERALES DE LA GALERÍA
   ============================================ */

/* Image hover effect */
.image-clickable {
    transition: transform 0.3s ease;
}

.image-clickable:hover {
    transform: scale(1.01);
}

/* Thumbnail styles */
.gallery-thumb {
    transition: all 0.3s ease;
    border: 3px solid transparent;
    opacity: 1;
}

.gallery-thumb:hover {
    opacity: 1;
    transform: translateY(-2px);
}

.active-thumb {
    border-color: #FFC107;
    opacity: 1;
}

/* ============================================
   MODAL DE IMAGEN - FONDO NEGRO COMPLETO
   ============================================ */

/* Fondo oscuro del modal (backdrop) - 100% opaco */
#imageModal {
    background-color: rgba(0, 0, 0, 1) !important;
}

/* Contenido del modal */
#imageModal .modal-content {
    background-color: #000000 !important;
    border: none !important;
    box-shadow: none !important;
}

/* Body del modal sin padding extra */
#imageModal .modal-body {
    background-color: #000000 !important;
    padding: 0 !important;
}

/* Imagen centrada y completa */
#imageModal .modal-body img {
    max-height: 90vh;
    max-width: 100%;
    object-fit: contain;
    display: block;
    margin: 0 auto;
}

/* Botón cerrar más visible */
#imageModal .btn-close-white {
    filter: invert(1) grayscale(100%) brightness(200%);
    z-index: 1050;
    opacity: 0.8;
    transition: opacity 0.3s;
}

#imageModal .btn-close-white:hover {
    opacity: 1;
}

/* Botones de navegación */
#imageModal .nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 193, 7, 0.9);
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 1050;
}

#imageModal .nav-btn:hover {
    background: rgba(255, 193, 7, 1);
    transform: translateY(-50%) scale(1.1);
}

#imageModal .nav-btn i {
    color: #000;
    font-size: 24px;
}

#imageModal .nav-btn.prev {
    left: 20px;
}

#imageModal .nav-btn.next {
    right: 20px;
}

/* ============================================
   SIDEBAR Y COMPONENTES ADICIONALES
   ============================================ */

/* Sticky sidebar */
.tour-sidebar {
    position: sticky;
    top: 20px;
}

/* Tab button styles */
.tab-btn {
    padding: 0.5rem 1.2rem !important;
    transition: all 0.3s ease;
}

.tab-btn:hover {
    color: #FFC107 !important;
}

.tab-btn.active {
    background-color: #FFC107 !important;
    color: #000 !important;
}

/* Accordion styles */
.accordion-button:not(.collapsed) {
    color: #FFC107 !important;
    background-color: transparent !important;
    box-shadow: none !important;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: transparent;
}

.accordion-button::after {
    filter: brightness(0) invert(1);
}

/* ============================================
   MODAL DE COMPARTIR
   ============================================ */

#shareModal .modal-content {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
}

#shareModal .btn:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
}

#shareModal .card {
    border: 1px solid #333;
}

/* ============================================
   ANIMACIONES
   ============================================ */

/* Smooth fade for tabs */
.tab-pane {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Toast animation */
.toast {
    animation: slideUp 0.3s ease;
}

@keyframes slideUp {
    from {
        transform: translateY(100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* ============================================
   RESPONSIVE
   ============================================ */

@media (max-width: 991px) {
    .tour-sidebar {
        position: static;
        margin-top: 2rem;
    }
    
    #mainImage {
        height: 300px !important;
    }
    
    .gallery-thumb {
        height: 100px !important;
    }
}

@media (max-width: 768px) {
    #imageModal .nav-btn {
        width: 40px;
        height: 40px;
    }
    
    #imageModal .nav-btn.prev {
        left: 10px;
    }
    
    #imageModal .nav-btn.next {
        right: 10px;
    }
}
</style>

<script>
const galleryImages = [
    @if($destination->image)
        "{{ asset('storage/'.$destination->image) }}",
    @endif
    @foreach($destination->images as $image)
        "{{ asset('storage/'.$image->image) }}",
    @endforeach
];

let currentImageIndex = 0;

function openImageModal(src) {
    currentImageIndex = galleryImages.indexOf(src);
    if (currentImageIndex === -1) currentImageIndex = 0;
    
    document.getElementById("modalImage").src = src;
    const modal = new bootstrap.Modal(document.getElementById("imageModal"));
    modal.show();
}

function changeImage(src, element) {
    const mainImage = document.getElementById("mainImage");
    mainImage.style.opacity = '0';
    mainImage.style.transform = 'scale(0.98)';
    
    setTimeout(function() {
        mainImage.src = src;
        mainImage.style.opacity = '1';
        mainImage.style.transform = 'scale(1)';
    }, 200);

    currentImageIndex = galleryImages.indexOf(src);
    
    document.querySelectorAll(".gallery-thumb").forEach(function(img) {
        img.classList.remove("active-thumb");
    });
    
    element.classList.add("active-thumb");
}

function previousImage() {
    currentImageIndex--;
    if (currentImageIndex < 0) {
        currentImageIndex = galleryImages.length - 1;
    }
    document.getElementById("modalImage").src = galleryImages[currentImageIndex];
}

function nextImage() {
    currentImageIndex++;
    if (currentImageIndex >= galleryImages.length) {
        currentImageIndex = 0;
    }
    document.getElementById("modalImage").src = galleryImages[currentImageIndex];
}

function shareTour() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $destination->name }}',
            text: 'Mira este increíble destino: {{ $destination->name }}',
            url: window.location.href
        }).catch(console.error);
    } else {
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('Enlace copiado al portapapeles');
        });
    }
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('imageModal');
    if (modal.classList.contains('show')) {
        if (e.key === 'ArrowLeft') previousImage();
        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'Escape') {
            const bootstrapModal = bootstrap.Modal.getInstance(modal);
            bootstrapModal.hide();
        }
    }
});



// Mostrar modal de compartir
function showShareModal() {
    const modal = new bootstrap.Modal(document.getElementById('shareModal'));
    modal.show();
}

// Compartir en Facebook
function shareToFacebook() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent("{{ $destination->name }}");
    const description = encodeURIComponent("{{ Str::limit($destination->description, 100) }}");
    
    window.open(
        `https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${description}`,
        '_blank',
        'width=600,height=400'
    );
    
    bootstrap.Modal.getInstance(document.getElementById('shareModal')).hide();
    showToast('Abriendo Facebook...');
}

// Compartir en Twitter
function shareToTwitter() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent("{{ $destination->name }}");
    const description = encodeURIComponent("{{ Str::limit($destination->description, 100) }}");
    
    window.open(
        `https://twitter.com/intent/tweet?text=${title}&url=${url}&via=tu_agencia`,
        '_blank',
        'width=600,height=400'
    );
    
    bootstrap.Modal.getInstance(document.getElementById('shareModal')).hide();
    showToast('Abriendo Twitter...');
}

// Compartir en WhatsApp
function shareToWhatsApp() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent("{{ $destination->name }}");
    const description = encodeURIComponent("{{ Str::limit($destination->description, 100) }}");
    
    const text = `*${title}*\n\n${description}\n\nMás información: ${window.location.href}`;
    
    window.open(
        `https://wa.me/?text=${encodeURIComponent(text)}`,
        '_blank'
    );
    
    bootstrap.Modal.getInstance(document.getElementById('shareModal')).hide();
    showToast('Abriendo WhatsApp...');
}

// Compartir en Telegram
function shareToTelegram() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent("{{ $destination->name }}");
    const description = encodeURIComponent("{{ Str::limit($destination->description, 100) }}");
    
    window.open(
        `https://t.me/share/url?url=${url}&text=${title}%20${description}`,
        '_blank',
        'width=600,height=400'
    );
    
    bootstrap.Modal.getInstance(document.getElementById('shareModal')).hide();
    showToast('Abriendo Telegram...');
}

// Copiar enlace
function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        bootstrap.Modal.getInstance(document.getElementById('shareModal')).hide();
        showToast('¡Enlace copiado al portapapeles!');
    }).catch(function() {
        showToast('Error al copiar el enlace');
    });
}

// Mostrar toast notification
function showToast(message) {
    document.getElementById('toastMessage').textContent = message;
    const toast = new bootstrap.Toast(document.getElementById('shareToast'));
    toast.show();
}

// Función shareTour original (fallback)
function shareTour() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $destination->name }}',
            text: '{{ Str::limit($destination->description, 100) }}',
            url: window.location.href
        }).catch(console.error);
    } else {
        showShareModal();
    }
}
</script>
@endsection