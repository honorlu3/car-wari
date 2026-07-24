@extends('layouts.app')

@section('title','Servicios Turísticos | Car Wari')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Servicios de Car Wari - Tours turísticos, transporte privado, traslados al aeropuerto, taxi interprovincial y más en Ayacucho, Perú.">
    <title>Servicios | Car Wari - Transporte Turístico Ayacucho</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* ============================================
           VARIABLES Y CONFIGURACIÓN GLOBAL
           ============================================ */
        :root {
            --amarillo: #FFD700;
            --amarillo-hover: #FFED4E;
            --amarillo-suave: rgba(255, 215, 0, 0.1);
            --negro: #0A0A0A;
            --negro-suave: #111111;
            --blanco: #FFFFFF;
            --gris-claro: #F3F4F6;
            --gris-medio: #E5E7EB;
            --gris-oscuro: #2D2D2D;
            --gris-texto: #6B7280;
            --dorado: #D4AF37;
            --whatsapp: #25D366;
            --sombra-suave: 0 4px 20px rgba(0, 0, 0, 0.08);
            --sombra-media: 0 8px 30px rgba(0, 0, 0, 0.12);
            --sombra-fuerte: 0 16px 50px rgba(0, 0, 0, 0.15);
            --radius: 18px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--blanco);
            color: var(--negro);
            line-height: 1.7;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            line-height: 1.3;
        }

        a {
            text-decoration: none;
            transition: all 0.3s ease;
        }

        /* ============================================
           COMPONENTES REUTILIZABLES
           ============================================ */
        .btn-amarillo {
            background: var(--amarillo);
            color: var(--negro);
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 12px;
            border: none;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-amarillo:hover {
            background: var(--amarillo-hover);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.4);
            color: var(--negro);
        }

        .btn-negro {
            background: var(--negro);
            color: var(--amarillo);
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 12px;
            border: none;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-negro:hover {
            background: var(--gris-oscuro);
            transform: translateY(-3px);
            color: var(--amarillo);
        }

        .btn-whatsapp {
            background: var(--whatsapp);
            color: var(--blanco);
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 12px;
            border: none;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-whatsapp:hover {
            background: #20bd5a;
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(37, 211, 102, 0.4);
            color: var(--blanco);
        }

        .btn-outline-claro {
            background: transparent;
            color: var(--blanco);
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 12px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-outline-claro:hover {
            border-color: var(--amarillo);
            color: var(--amarillo);
        }

        .section-padding {
            padding: 100px 0;
        }

        .section-title {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 16px;
            color: var(--negro);
        }

        .section-subtitle {
            font-size: 18px;
            color: var(--gris-texto);
            max-width: 700px;
            margin: 0 auto;
        }

        .badge-seccion {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--amarillo-suave);
            border: 1px solid var(--amarillo);
            color: var(--negro);
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        /* ============================================
           1. HERO SECTION
           ============================================ */
        .hero-servicios {
            position: relative;
            min-height: 85vh;
            background: linear-gradient(rgba(10, 10, 10, 0.75), rgba(10, 10, 10, 0.85)),
                        url('https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=1920') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 120px 20px 80px;
            overflow: hidden;
        }

        .hero-servicios::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(255, 215, 0, 0.15) 0%, transparent 50%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
        }

        .hero-servicios h1 {
            font-size: 72px;
            color: var(--blanco);
            margin-bottom: 20px;
            font-weight: 800;
        }

        .hero-servicios h1 span {
            color: var(--amarillo);
        }

        .hero-servicios p {
            font-size: 22px;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 40px;
        }

        .hero-botones {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* ============================================
           2. BUSCADOR DE SERVICIOS
           ============================================ */
        .buscador-section {
            padding: 0 0 80px;
            margin-top: -60px;
            position: relative;
            z-index: 10;
        }

        .buscador-card {
            background: var(--blanco);
            border-radius: var(--radius);
            padding: 40px;
            box-shadow: var(--sombra-fuerte);
            border: 1px solid var(--gris-medio);
        }

        .buscador-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            align-items: end;
        }

        .buscador-item label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--gris-texto);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .buscador-item label i {
            color: var(--amarillo);
            margin-right: 6px;
        }

        .buscador-item input,
        .buscador-item select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--gris-medio);
            border-radius: 12px;
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: var(--gris-claro);
        }

        .buscador-item input:focus,
        .buscador-item select:focus {
            outline: none;
            border-color: var(--amarillo);
            background: var(--blanco);
            box-shadow: 0 0 0 4px var(--amarillo-suave);
        }

        .buscador-btn {
            background: var(--amarillo);
            color: var(--negro);
            border: none;
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            height: 54px;
        }

        .buscador-btn:hover {
            background: var(--amarillo-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 215, 0, 0.4);
        }

        /* ============================================
           3. SERVICIOS PRINCIPALES
           ============================================ */
        .servicios-section {
            background: var(--gris-claro);
        }

        .servicio-card {
            background: var(--blanco);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--sombra-suave);
            transition: all 0.4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid var(--gris-medio);
        }

        .servicio-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--sombra-fuerte);
        }

        .servicio-imagen {
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .servicio-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .servicio-card:hover .servicio-imagen img {
            transform: scale(1.1);
        }

        .servicio-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: var(--amarillo);
            color: var(--negro);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .servicio-destacado {
            border: 2px solid var(--amarillo);
            position: relative;
        }

        .servicio-destacado::before {
            content: '⭐ Más solicitado';
            position: absolute;
            top: 16px;
            right: 16px;
            background: var(--negro);
            color: var(--amarillo);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            z-index: 3;
        }

        .servicio-contenido {
            padding: 28px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .servicio-contenido h3 {
            font-size: 24px;
            margin-bottom: 12px;
            color: var(--negro);
        }

        .servicio-contenido p {
            color: var(--gris-texto);
            font-size: 15px;
            margin-bottom: 20px;
            flex: 1;
        }

        .servicio-beneficios {
            list-style: none;
            padding: 0;
            margin-bottom: 24px;
        }

        .servicio-beneficios li {
            padding: 8px 0 8px 28px;
            position: relative;
            color: var(--gris-oscuro);
            font-size: 14px;
            font-weight: 500;
        }

        .servicio-beneficios li::before {
            content: '✓';
            position: absolute;
            left: 0;
            top: 8px;
            width: 20px;
            height: 20px;
            background: var(--amarillo);
            color: var(--negro);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }

        .servicio-destinos {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px;
        }

        .destino-tag {
            background: var(--gris-claro);
            color: var(--negro);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-servicio {
            background: var(--negro);
            color: var(--amarillo);
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            width: 100%;
            justify-content: center;
        }

        .btn-servicio:hover {
            background: var(--amarillo);
            color: var(--negro);
            transform: translateY(-2px);
        }

        /* ============================================
           4. ¿POR QUÉ ELEGIRNOS?
           ============================================ */
        .porque-section {
            background: var(--blanco);
        }

        .porque-imagen {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--sombra-fuerte);
            height: 100%;
        }

        .porque-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .porque-lista {
            list-style: none;
            padding: 0;
        }

        .porque-lista li {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid var(--gris-medio);
            transition: all 0.3s ease;
        }

        .porque-lista li:hover {
            transform: translateX(10px);
        }

        .porque-lista li:last-child {
            border-bottom: none;
        }

        .porque-icono {
            width: 56px;
            height: 56px;
            background: var(--amarillo);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--negro);
            flex-shrink: 0;
        }

        .porque-texto h4 {
            font-size: 18px;
            margin-bottom: 4px;
            color: var(--negro);
        }

        .porque-texto p {
            color: var(--gris-texto);
            font-size: 14px;
            margin: 0;
        }

        /* ============================================
           5. DESTINOS INTERPROVINCIALES
           ============================================ */
        .destinos-section {
            background: var(--gris-claro);
        }

        .destino-card {
            background: var(--blanco);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--sombra-suave);
            transition: all 0.4s ease;
            height: 100%;
            border: 1px solid var(--gris-medio);
        }

        .destino-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--sombra-fuerte);
        }

        .destino-imagen {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .destino-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .destino-card:hover .destino-imagen img {
            transform: scale(1.1);
        }

        .destino-ruta {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.85));
            padding: 20px;
            color: var(--blanco);
        }

        .destino-ruta .ruta-texto {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 4px;
        }

        .destino-ruta h4 {
            font-size: 22px;
            margin: 0;
            color: var(--blanco);
        }

        .destino-ruta h4 i {
            color: var(--amarillo);
            margin: 0 8px;
        }

        .destino-info {
            padding: 24px;
        }

        .destino-detalles {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 20px;
        }

        .destino-detalle {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            color: var(--gris-oscuro);
        }

        .destino-detalle i {
            color: var(--amarillo);
            font-size: 18px;
            width: 20px;
        }

        .destino-detalle strong {
            color: var(--negro);
        }

        .btn-destino {
            background: var(--amarillo);
            color: var(--negro);
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            width: 100%;
            justify-content: center;
        }

        .btn-destino:hover {
            background: var(--negro);
            color: var(--amarillo);
        }

        /* ============================================
           6. FLOTA DE VEHÍCULOS
           ============================================ */
        .flota-section {
            background: var(--blanco);
        }

        .vehiculo-card {
            background: var(--blanco);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--sombra-suave);
            transition: all 0.4s ease;
            height: 100%;
            border: 1px solid var(--gris-medio);
        }

        .vehiculo-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--sombra-fuerte);
        }

        .vehiculo-imagen {
            height: 220px;
            overflow: hidden;
            background: var(--gris-claro);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .vehiculo-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .vehiculo-tipo {
            position: absolute;
            top: 16px;
            left: 16px;
            background: var(--negro);
            color: var(--amarillo);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .vehiculo-contenido {
            padding: 28px;
        }

        .vehiculo-contenido h3 {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .vehiculo-contenido > p {
            color: var(--gris-texto);
            font-size: 14px;
            margin-bottom: 20px;
        }

        .vehiculo-specs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .vehiculo-spec {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: var(--gris-oscuro);
            padding: 10px;
            background: var(--gris-claro);
            border-radius: 10px;
        }

        .vehiculo-spec i {
            color: var(--amarillo);
            font-size: 16px;
        }

        .vehiculo-ideal {
            background: var(--amarillo-suave);
            border-left: 3px solid var(--amarillo);
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            color: var(--negro);
            margin-bottom: 20px;
        }

        .vehiculo-ideal strong {
            color: var(--negro);
        }

        /* ============================================
           7. PROCESO DE RESERVA
           ============================================ */
        .proceso-section {
            background: var(--gris-claro);
        }

        .proceso-timeline {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            position: relative;
            margin-top: 60px;
        }

        .proceso-timeline::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 10%;
            right: 10%;
            height: 3px;
            background: var(--amarillo);
            z-index: 1;
        }

        .proceso-paso {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .proceso-numero {
            width: 80px;
            height: 80px;
            background: var(--amarillo);
            color: var(--negro);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: 800;
            margin: 0 auto 20px;
            box-shadow: 0 8px 24px rgba(255, 215, 0, 0.4);
            border: 4px solid var(--blanco);
        }

        .proceso-paso h4 {
            font-size: 18px;
            margin-bottom: 8px;
            color: var(--negro);
        }

        .proceso-paso p {
            color: var(--gris-texto);
            font-size: 14px;
            margin: 0;
        }

        /* ============================================
           8. ESTADÍSTICAS
           ============================================ */
        .stats-section {
            background: var(--amarillo);
            padding: 80px 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-numero {
            font-size: 56px;
            font-weight: 800;
            color: var(--negro);
            line-height: 1;
            margin-bottom: 12px;
        }

        .stat-label {
            font-size: 16px;
            color: var(--negro);
            font-weight: 600;
        }

        /* ============================================
           9. TESTIMONIOS
           ============================================ */
        .testimonios-section {
            background: var(--blanco);
        }

        .testimonio-card {
            background: var(--gris-claro);
            border-radius: var(--radius);
            padding: 36px;
            margin: 20px 10px;
            transition: all 0.3s ease;
        }

        .testimonio-estrellas {
            color: var(--amarillo);
            font-size: 18px;
            margin-bottom: 16px;
        }

        .testimonio-texto {
            font-size: 16px;
            color: var(--gris-oscuro);
            font-style: italic;
            margin-bottom: 24px;
            line-height: 1.7;
        }

        .testimonio-autor {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .autor-avatar {
            width: 52px;
            height: 52px;
            background: var(--amarillo);
            color: var(--negro);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
        }

        .autor-nombre {
            font-weight: 700;
            color: var(--negro);
            margin-bottom: 2px;
        }

        .autor-ubicacion {
            font-size: 13px;
            color: var(--gris-texto);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background: var(--amarillo);
            color: var(--negro);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 1;
        }

        .carousel-control-prev {
            left: -25px;
        }

        .carousel-control-next {
            right: -25px;
        }

        .carousel-indicators button {
            background: var(--amarillo) !important;
            width: 12px !important;
            height: 12px !important;
            border-radius: 50% !important;
        }

        /* ============================================
           10. FAQ
           ============================================ */
        .faq-section {
            background: var(--gris-claro);
        }

        .accordion-custom .accordion-item {
            background: var(--blanco);
            border: 1px solid var(--gris-medio);
            border-radius: 14px !important;
            margin-bottom: 12px;
            overflow: hidden;
        }

        .accordion-custom .accordion-button {
            background: var(--blanco);
            color: var(--negro);
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 16px;
            padding: 20px 24px;
            box-shadow: none !important;
        }

        .accordion-custom .accordion-button:not(.collapsed) {
            background: var(--amarillo-suave);
            color: var(--negro);
        }

        .accordion-custom .accordion-button::after {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%230A0A0A' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
        }

        .accordion-custom .accordion-body {
            padding: 0 24px 24px;
            color: var(--gris-oscuro);
            font-size: 15px;
        }

        .faq-numero {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: var(--amarillo);
            color: var(--negro);
            border-radius: 8px;
            font-weight: 700;
            margin-right: 12px;
            font-size: 14px;
        }

        /* ============================================
           11. CALL TO ACTION
           ============================================ */
        .cta-section {
            background: var(--negro);
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: rgba(255, 215, 0, 0.08);
            border-radius: 50%;
        }

        .cta-section::after {
            content: '';
            position: absolute;
            bottom: -150px;
            left: -150px;
            width: 500px;
            height: 500px;
            background: rgba(255, 215, 0, 0.05);
            border-radius: 50%;
        }

        .cta-content {
            position: relative;
            z-index: 1;
        }

        .cta-section h2 {
            font-size: 48px;
            color: var(--blanco);
            margin-bottom: 20px;
        }

        .cta-section h2 span {
            color: var(--amarillo);
        }

        .cta-section p {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-botones {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* ============================================
           12. FOOTER
           ============================================ */
        .footer {
            background: var(--negro-suave);
            color: var(--blanco);
            padding: 80px 0 30px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.2fr;
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .footer-logo-icon {
            width: 48px;
            height: 48px;
            background: var(--amarillo);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--negro);
            font-size: 22px;
        }

        .footer-logo-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 22px;
        }

        .footer-logo-text span {
            color: var(--amarillo);
        }

        .footer-desc {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
        }

        .footer-social a {
            width: 42px;
            height: 42px;
            background: var(--gris-oscuro);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--blanco);
            transition: all 0.3s;
        }

        .footer-social a:hover {
            background: var(--amarillo);
            color: var(--negro);
            transform: translateY(-3px);
        }

        .footer-titulo {
            color: var(--amarillo);
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 24px;
            text-transform: uppercase;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .footer-links a:hover {
            color: var(--amarillo);
            padding-left: 6px;
        }

        .footer-contacto {
            list-style: none;
            padding: 0;
        }

        .footer-contacto li {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .footer-contacto i {
            color: var(--amarillo);
            margin-top: 3px;
        }

        .footer-mapa {
            border-radius: 14px;
            overflow: hidden;
            height: 180px;
            margin-top: 20px;
        }

        .footer-mapa iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .footer-bottom {
            border-top: 1px solid var(--gris-oscuro);
            padding-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-copyright {
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }

        .footer-legal {
            display: flex;
            gap: 24px;
        }

        .footer-legal a {
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }

        .footer-legal a:hover {
            color: var(--amarillo);
        }

        /* ============================================
           WHATSAPP FLOATING
           ============================================ */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 64px;
            height: 64px;
            background: var(--whatsapp);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--blanco);
            font-size: 32px;
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.4);
            z-index: 999;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            color: var(--blanco);
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 20px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 991px) {
            .hero-servicios h1 {
                font-size: 48px;
            }

            .hero-servicios p {
                font-size: 18px;
            }

            .section-title {
                font-size: 36px;
            }

            .proceso-timeline {
                grid-template-columns: repeat(2, 1fr);
            }

            .proceso-timeline::before {
                display: none;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .hero-servicios {
                min-height: 70vh;
                padding: 100px 20px 60px;
            }

            .hero-servicios h1 {
                font-size: 36px;
            }

            .hero-botones {
                flex-direction: column;
                align-items: center;
            }

            .hero-botones .btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .buscador-card {
                padding: 24px;
            }

            .section-title {
                font-size: 32px;
            }

            .proceso-timeline {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-numero {
                font-size: 48px;
            }

            .cta-section h2 {
                font-size: 32px;
            }

            .cta-botones {
                flex-direction: column;
                align-items: center;
            }

            .cta-botones .btn-cta {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .footer-legal {
                justify-content: center;
            }
        }

        /* Animaciones */
        .fade-in {
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- ============================================
         1. HERO SECTION
         ============================================ -->
    <section class="hero-servicios">
        <div class="hero-content fade-in">
            <div class="badge-seccion" style="background: rgba(255,215,0,0.15); color: var(--amarillo);">
                <i class="bi bi-stars"></i>
                Car Wari Servicios a toda hora
            </div>
            <h1>Nuestros <span>Servicios</span></h1>
            <p>Soluciones de transporte turístico para cada necesidad.</p>
            <div class="hero-botones">
                <a href="#servicios" class="btn-amarillo">
                    <i class="bi bi-calendar-check-fill"></i>
                    Reservar Ahora
                </a>
                <a href="https://wa.me/51916466009" class="btn-whatsapp" target="_blank">
                    <i class="bi bi-whatsapp"></i>
                    Contactar por WhatsApp
                </a>
            </div>
        </div>
    </section>

   

    <!-- ============================================
     2. BUSCADOR DE SERVICIOS
     ============================================ -->
<section class="buscador-section">
    <div class="container">
        <div class="buscador-card">
            <div class="buscador-grid">
                <div class="buscador-item">
                    <label><i class="bi bi-geo-alt-fill"></i> Origen</label>
                    <input type="text" id="origen" placeholder="¿Desde dónde?">
                </div>
                <div class="buscador-item">
                    <label><i class="bi bi-pin-map-fill"></i> Destino</label>
                    <input type="text" id="destino" placeholder="¿A dónde vas?">
                </div>
                <div class="buscador-item">
                    <label><i class="bi bi-calendar-fill"></i> Fecha</label>
                    <input type="date" id="fecha">
                </div>
                <div class="buscador-item">
                    <label><i class="bi bi-people-fill"></i> Pasajeros</label>
                    <select id="pasajeros">
                        <option>1 pasajero</option>
                        <option>2 pasajeros</option>
                        <option>3 pasajeros</option>
                        <option>4 pasajeros</option>
                        <option>5 pasajeros</option>
                        <option>6 + pasajeros</option>
                    </select>
                </div>
                <div class="buscador-item">
                    <label><i class="bi bi-car-front-fill"></i> Tipo de servicio</label>
                    <select id="servicio">
                        <option>Tour turístico</option>
                        <option>Traslado aeropuerto</option>
                        <option>Autos colectivos</option>
                        <option>Transporte corporativo</option>
                        <option>Transporte ejecutivo VIP</option>
                        <option>Viaje personalizado</option>
                    </select>
                </div>
                <div class="buscador-item">
                    <button class="buscador-btn" id="btnBuscar">
                        <i class="bi bi-search"></i>
                        Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script para enviar a WhatsApp -->
<script>
    document.getElementById('btnBuscar').addEventListener('click', function() {
        // Capturar valores
        const origen = document.getElementById('origen').value || 'No especificado';
        const destino = document.getElementById('destino').value || 'No especificado';
        const fecha = document.getElementById('fecha').value || 'No especificada';
        const pasajeros = document.getElementById('pasajeros').value;
        const servicio = document.getElementById('servicio').value;
        
        // Formatear fecha
        const fechaFormateada = fecha !== 'No especificada' ? 
            new Date(fecha).toLocaleDateString('es-PE', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            }) : 'No especificada';
        
        // Construir mensaje
        const mensaje = `¡Hola Car Wari! 

Me interesa solicitar información sobre sus servicios:

 *Tipo de servicio:* ${servicio}
📍 *Origen:* ${origen}
🎯 *Destino:* ${destino}
📅 *Fecha:* ${fechaFormateada}
👥 *Pasajeros:* ${pasajeros}

Por favor, envíenme más detalles y cotización. ¡Gracias!`;
        
        // Codificar mensaje para URL
        const mensajeCodificado = encodeURIComponent(mensaje);
        
        // Número de WhatsApp (cambiar por el número real)
        const numeroWhatsApp = '51916466009'; // Número de WhatsApp con código de país
        
        // Abrir WhatsApp
        const urlWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${mensajeCodificado}`;
        window.open(urlWhatsApp, '_blank');
    });
</script>



    <!-- ============================================
     3. SERVICIOS PRINCIPALES
     ============================================ -->
<section class="section-padding servicios-section" id="servicios">
    <div class="container">
        <div class="text-center mb-5">
            <div class="badge-seccion">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                Nuestros Servicios
            </div>
            <h2 class="section-title">Soluciones para cada viaje</h2>
            <p class="section-subtitle">
                Ofrecemos una amplia gama de servicios de transporte turístico diseñados 
                para satisfacer todas tus necesidades de movilidad en Ayacucho y el Perú.
            </p>
        </div>

        <div class="row g-4">
            <!-- Servicio 1: Tours Turísticos -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card">
                    <div class="servicio-imagen">
                        <img src="https://images.unsplash.com/photo-1526392060635-9d6019884377?w=600" alt="Tours Turísticos">
                        <div class="servicio-badge">
                            <i class="bi bi-geo-alt-fill"></i>
                            Tours
                        </div>
                    </div>
                    <div class="servicio-contenido">
                        <h3>🌄 Tours Turísticos</h3>
                        <p>Conoce los principales atractivos turísticos de Ayacucho con nuestros tours guiados por expertos locales.</p>
                        <ul class="servicio-beneficios">
                            <li>Guía local certificado</li>
                            <li>Vehículos cómodos y modernos</li>
                            <li>Rutas personalizadas</li>
                        </ul>
                        <button class="btn-servicio btn-servicio-wa" 
                                data-servicio="Tours Turísticos" 
                                data-mensaje="Hola Car Wari, me interesa obtener más información y cotización sobre sus Tours Turísticos.">
                            Ver Tours <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Servicio 2: Traslado Aeropuerto -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card">
                    <div class="servicio-imagen">
                        <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=600" alt="Traslado Aeropuerto">
                        <div class="servicio-badge">
                            <i class="bi bi-airplane-fill"></i>
                            Aeropuerto
                        </div>
                    </div>
                    <div class="servicio-contenido">
                        <h3>✈️ Traslado Aeropuerto</h3>
                        <p>Recojo y traslado puntual desde y hacia el aeropuerto Alfredo Mendívil Duarte de Ayacucho.</p>
                        <ul class="servicio-beneficios">
                            <li>Monitoreo de vuelos</li>
                            <li>Espera sin cargo (30 min)</li>
                            <li>Asistencia con equipaje</li>
                        </ul>
                        <button class="btn-servicio btn-servicio-wa" 
                                data-servicio="Traslado Aeropuerto" 
                                data-mensaje="Hola Car Wari, deseo reservar o cotizar el servicio de Traslado al Aeropuerto.">
                            Reservar <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Servicio 3: Taxi Interprovincial (DESTACADO) -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card servicio-destacado">
                    <div class="servicio-imagen">
                        <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=600" alt="Taxi Interprovincial">
                        <div class="servicio-badge">
                            <i class="bi bi-signpost-2-fill"></i>
                            Interprovincial
                        </div>
                    </div>
                    <div class="servicio-contenido">
                        <h3>🚙 Auto colectivos</h3>
                        <p>Viajes privados hacia cualquier provincia del Perú con total comodidad y seguridad.</p>
                        <div class="servicio-destinos">
                            <span class="destino-tag">Lima</span>
                            <span class="destino-tag">Cusco</span>
                            <span class="destino-tag">Huancayo</span>
                            <span class="destino-tag">Nazca</span>
                            <span class="destino-tag">Abancay</span>
                            <span class="destino-tag">Ica</span>
                        </div>
                        <button class="btn-servicio btn-servicio-wa" 
                                data-servicio="Taxi Interprovincial" 
                                data-mensaje="Hola Car Wari, quiero cotizar un viaje interprovincial.">
                            Cotizar Viaje <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Servicio 4: Transporte Corporativo -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card">
                    <div class="servicio-imagen">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600" alt="Transporte Corporativo">
                        <div class="servicio-badge">
                            <i class="bi bi-building-fill"></i>
                            Corporativo
                        </div>
                    </div>
                    <div class="servicio-contenido">
                        <h3>🏢 Transporte Corporativo</h3>
                        <p>Movilidad para empresas e instituciones con servicio profesional y puntual garantizado.</p>
                        <ul class="servicio-beneficios">
                            <li>Facturación empresarial</li>
                            <li>Contratos mensuales</li>
                            <li>Reportes de servicio</li>
                        </ul>
                        <button class="btn-servicio btn-servicio-wa" 
                                data-servicio="Transporte Corporativo" 
                                data-mensaje="Hola Car Wari, represento a una empresa y me interesa información sobre su servicio de Transporte Corporativo.">
                            Solicitar Información <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Servicio 5: Transporte Ejecutivo VIP -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card">
                    <div class="servicio-imagen">
                        <img src="https://images.unsplash.com/photo-1563720223185-11003d516933?w=600" alt="Transporte Ejecutivo VIP">
                        <div class="servicio-badge">
                            <i class="bi bi-star-fill"></i>
                            VIP
                        </div>
                    </div>
                    <div class="servicio-contenido">
                        <h3>⭐ Transporte Ejecutivo VIP</h3>
                        <p>SUV Premium para clientes ejecutivos que buscan máxima comodidad y exclusividad en cada viaje.</p>
                        <ul class="servicio-beneficios">
                            <li>Vehículos de alta gama</li>
                            <li>Conductores bilingües</li>
                            <li>Servicio personalizado</li>
                        </ul>
                        <button class="btn-servicio btn-servicio-wa" 
                                data-servicio="Transporte Ejecutivo VIP" 
                                data-mensaje="Hola Car Wari, me interesa reservar su servicio de Transporte Ejecutivo VIP.">
                            Reservar <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Servicio 6: Viajes Personalizados -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card">
                    <div class="servicio-imagen">
                        <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=600" alt="Viajes Personalizados">
                        <div class="servicio-badge">
                            <i class="bi bi-compass-fill"></i>
                            Personalizado
                        </div>
                    </div>
                    <div class="servicio-contenido">
                        <h3>🗺️ Viajes Personalizados</h3>
                        <p>Diseña tu propia ruta y vive una experiencia única adaptada a tus preferencias y presupuesto.</p>
                        <ul class="servicio-beneficios">
                            <li>Itinerario a tu medida</li>
                            <li>Paradas ilimitadas</li>
                            <li>Flexibilidad total</li>
                        </ul>
                        <button class="btn-servicio btn-servicio-wa" 
                                data-servicio="Viajes Personalizados" 
                                data-mensaje="Hola Car Wari, quiero diseñar un viaje personalizado y necesito una cotización.">
                            Solicitar Cotización <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- ============================================
         4. ¿POR QUÉ ELEGIR CAR WARI?
         ============================================ 
    <section class="section-padding porque-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="badge-seccion">
                        <i class="bi bi-award-fill"></i>
                        ¿Por qué elegirnos?
                    </div>
                    <h2 class="section-title">La mejor opción en transporte turístico</h2>
                    <p class="section-subtitle" style="margin: 0 0 40px 0;">
                        Nos diferenciamos por nuestro compromiso con la excelencia y la satisfacción total de nuestros clientes.
                    </p>

                    <ul class="porque-lista">
                        <li>
                            <div class="porque-icono">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div class="porque-texto">
                                <h4>Conductores certificados</h4>
                                <p>Profesionales con años de experiencia y capacitación continua.</p>
                            </div>
                        </li>
                        <li>
                            <div class="porque-icono">
                                <i class="bi bi-car-front-fill"></i>
                            </div>
                            <div class="porque-texto">
                                <h4>Vehículos modernos</h4>
                                <p>Flota nueva con mantenimiento preventivo constante.</p>
                            </div>
                        </li>
                        <li>
                            <div class="porque-icono">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="porque-texto">
                                <h4>Viajes seguros</h4>
                                <p>Seguro incluido y protocolos de seguridad estrictos.</p>
                            </div>
                        </li>
                        <li>
                            <div class="porque-icono">
                                <i class="bi bi-person-heart"></i>
                            </div>
                            <div class="porque-texto">
                                <h4>Atención personalizada</h4>
                                <p>Cada cliente es único y merece un trato especial.</p>
                            </div>
                        </li>
                        <li>
                            <div class="porque-icono">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div class="porque-texto">
                                <h4>Monitoreo del servicio</h4>
                                <p>Seguimiento GPS en tiempo real de todos nuestros vehículos.</p>
                            </div>
                        </li>
                        <li>
                            <div class="porque-icono">
                                <i class="bi bi-clock-fill"></i>
                            </div>
                            <div class="porque-texto">
                                <h4>Disponibilidad 24/7</h4>
                                <p>Atención todos los días del año, las 24 horas.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="porque-imagen">
                        <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=800" alt="SUV moderna Car Wari">
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- ============================================
     5. DESTINOS INTERPROVINCIALES
     ============================================ -->
<section class="section-padding destinos-section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="badge-seccion">
                <i class="bi bi-signpost-2-fill"></i>
                Rutas Interprovinciales
            </div>
            <h2 class="section-title">Conectamos Ayacucho con el Perú</h2>
            <p class="section-subtitle">
                Viajes privados y seguros hacia los principales destinos del país.
            </p>
        </div>

        <div class="row g-4">
            <!-- RUTA 1: LIMA -->
            <div class="col-lg-4 col-md-6">
                <div class="destino-card" 
                     data-origen="Ayacucho" 
                     data-destino="Lima" 
                     data-distancia="620 km" 
                     data-tiempo="10-12 horas" 
                     data-vehiculo="AUTOS / SUV / Minivan">
                    <div class="destino-imagen">
                        <img src="https://images.unsplash.com/photo-1531968455001-5c5272a67c71?w=600" alt="Ayacucho a Lima">
                        <div class="destino-ruta">
                            <div class="ruta-texto">RUTA DIRECTA</div>
                            <h4>Ayacucho <i class="bi bi-arrow-right"></i> Lima</h4>
                        </div>
                    </div>
                    <div class="destino-info">
                        <div class="destino-detalles">
                            <div class="destino-detalle">
                                <i class="bi bi-signpost-fill"></i>
                                <span><strong>620 km</strong> de distancia</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-clock-fill"></i>
                                <span><strong>10-12 horas</strong> estimado</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-car-front-fill"></i>
                                <span><strong>AUTOS / SUV / Minivan</strong> recomendado</span>
                            </div>
                        </div>
                        <button class="btn-destino btn-consultar-ruta">
                            <i class="bi bi-calendar-check"></i>
                            Consultar disponibilidad
                        </button>
                    </div>
                </div>
            </div>

            <!-- RUTA 2: CUSCO -->
            <div class="col-lg-4 col-md-6">
                <div class="destino-card" 
                     data-origen="Ayacucho" 
                     data-destino="Cusco" 
                     data-distancia="680 km" 
                     data-tiempo="12-14 horas" 
                     data-vehiculo="AUTOS / SUV 4x4">
                    <div class="destino-imagen">
                        <img src="https://images.unsplash.com/photo-1526392060635-9d6019884377?w=600" alt="Ayacucho a Cusco">
                        <div class="destino-ruta">
                            <div class="ruta-texto">RUTA TURÍSTICA</div>
                            <h4>Ayacucho <i class="bi bi-arrow-right"></i> Cusco</h4>
                        </div>
                    </div>
                    <div class="destino-info">
                        <div class="destino-detalles">
                            <div class="destino-detalle">
                                <i class="bi bi-signpost-fill"></i>
                                <span><strong>680 km</strong> de distancia</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-clock-fill"></i>
                                <span><strong>12-14 horas</strong> estimado</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-car-front-fill"></i>
                                <span><strong>AUTOS / SUV 4x4</strong> recomendado</span>
                            </div>
                        </div>
                        <button class="btn-destino btn-consultar-ruta">
                            <i class="bi bi-calendar-check"></i>
                            Consultar disponibilidad
                        </button>
                    </div>
                </div>
            </div>

            <!-- RUTA 3: HUANCAYO -->
            <div class="col-lg-4 col-md-6">
                <div class="destino-card" 
                     data-origen="Ayacucho" 
                     data-destino="Huancayo" 
                     data-distancia="380 km" 
                     data-tiempo="7-9 horas" 
                     data-vehiculo="AUTOS / SUV / Minivan">
                    <div class="destino-imagen">
                        <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=600" alt="Ayacucho a Huancayo">
                        <div class="destino-ruta">
                            <div class="ruta-texto">RUTA ANDINA</div>
                            <h4>Ayacucho <i class="bi bi-arrow-right"></i> Huancayo</h4>
                        </div>
                    </div>
                    <div class="destino-info">
                        <div class="destino-detalles">
                            <div class="destino-detalle">
                                <i class="bi bi-signpost-fill"></i>
                                <span><strong>380 km</strong> de distancia</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-clock-fill"></i>
                                <span><strong>7-9 horas</strong> estimado</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-car-front-fill"></i>
                                <span><strong>AUTOS / SUV / Minivan</strong> recomendado</span>
                            </div>
                        </div>
                        <button class="btn-destino btn-consultar-ruta">
                            <i class="bi bi-calendar-check"></i>
                            Consultar disponibilidad
                        </button>
                    </div>
                </div>
            </div>

            <!-- RUTA 4: ICA -->
            <div class="col-lg-4 col-md-6">
                <div class="destino-card" 
                     data-origen="Ayacucho" 
                     data-destino="Ica" 
                     data-distancia="420 km" 
                     data-tiempo="7-8 horas" 
                     data-vehiculo="SUV / Auto">
                    <div class="destino-imagen">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600" alt="Ayacucho a Ica">
                        <div class="destino-ruta">
                            <div class="ruta-texto">RUTA COSTERA</div>
                            <h4>Ayacucho <i class="bi bi-arrow-right"></i> Ica</h4>
                        </div>
                    </div>
                    <div class="destino-info">
                        <div class="destino-detalles">
                            <div class="destino-detalle">
                                <i class="bi bi-signpost-fill"></i>
                                <span><strong>420 km</strong> de distancia</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-clock-fill"></i>
                                <span><strong>7-8 horas</strong> estimado</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-car-front-fill"></i>
                                <span><strong>SUV / Auto</strong> recomendado</span>
                            </div>
                        </div>
                        <button class="btn-destino btn-consultar-ruta">
                            <i class="bi bi-calendar-check"></i>
                            Consultar disponibilidad
                        </button>
                    </div>
                </div>
            </div>

            <!-- RUTA 5: NAZCA -->
            <div class="col-lg-4 col-md-6">
                <div class="destino-card" 
                     data-origen="Ayacucho" 
                     data-destino="Nazca" 
                     data-distancia="350 km" 
                     data-tiempo="6-7 horas" 
                     data-vehiculo="SUV / Auto">
                    <div class="destino-imagen">
                        <img src="https://images.unsplash.com/photo-1518182170543-3712c2e1e6a0?w=600" alt="Ayacucho a Nazca">
                        <div class="destino-ruta">
                            <div class="ruta-texto">RUTA ARQUEOLÓGICA</div>
                            <h4>Ayacucho <i class="bi bi-arrow-right"></i> Nazca</h4>
                        </div>
                    </div>
                    <div class="destino-info">
                        <div class="destino-detalles">
                            <div class="destino-detalle">
                                <i class="bi bi-signpost-fill"></i>
                                <span><strong>350 km</strong> de distancia</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-clock-fill"></i>
                                <span><strong>6-7 horas</strong> estimado</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-car-front-fill"></i>
                                <span><strong>SUV / Auto</strong> recomendado</span>
                            </div>
                        </div>
                        <button class="btn-destino btn-consultar-ruta">
                            <i class="bi bi-calendar-check"></i>
                            Consultar disponibilidad
                        </button>
                    </div>
                </div>
            </div>

            <!-- RUTA 6: ABANCAY -->
            <div class="col-lg-4 col-md-6">
                <div class="destino-card" 
                     data-origen="Ayacucho" 
                     data-destino="Abancay" 
                     data-distancia="520 km" 
                     data-tiempo="10-12 horas" 
                     data-vehiculo="AUTOS / SUV 4x4">
                    <div class="destino-imagen">
                        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=600" alt="Ayacucho a Abancay">
                        <div class="destino-ruta">
                            <div class="ruta-texto">RUTA SUR</div>
                            <h4>Ayacucho <i class="bi bi-arrow-right"></i> Abancay</h4>
                        </div>
                    </div>
                    <div class="destino-info">
                        <div class="destino-detalles">
                            <div class="destino-detalle">
                                <i class="bi bi-signpost-fill"></i>
                                <span><strong>520 km</strong> de distancia</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-clock-fill"></i>
                                <span><strong>10-12 horas</strong> estimado</span>
                            </div>
                            <div class="destino-detalle">
                                <i class="bi bi-car-front-fill"></i>
                                <span><strong>AUTOS / SUV 4x4</strong> recomendado</span>
                            </div>
                        </div>
                        <button class="btn-destino btn-consultar-ruta">
                            <i class="bi bi-calendar-check"></i>
                            Consultar disponibilidad
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- ============================================
         6. FLOTA DE VEHÍCULOS
         ============================================ 
    <section class="section-padding flota-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="badge-seccion">
                    <i class="bi bi-car-front-fill"></i>
                    Nuestra Flota
                </div>
                <h2 class="section-title">Vehículos para cada necesidad</h2>
                <p class="section-subtitle">
                    Contamos con una flota moderna y diversa para ofrecerte la mejor experiencia de viaje.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="vehiculo-card">
                        <div class="vehiculo-imagen">
                            <img src="https://images.unsplash.com/photo-1606611013016-969c19ba27d5?w=600" alt="SUV">
                            <div class="vehiculo-tipo">SUV</div>
                        </div>
                        <div class="vehiculo-contenido">
                            <h3>SUV Premium</h3>
                            <p>Comodidad y potencia para todo tipo de terreno.</p>
                            <div class="vehiculo-specs">
                                <div class="vehiculo-spec">
                                    <i class="bi bi-people-fill"></i>
                                    <span>4-5 pasajeros</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-snow"></i>
                                    <span>A/C</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-briefcase-fill"></i>
                                    <span>Maletero amplio</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-music-note-beamed"></i>
                                    <span>Bluetooth</span>
                                </div>
                            </div>
                            <div class="vehiculo-ideal">
                                <strong>Ideal para:</strong> Tours, traslados y viajes interprovinciales.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="vehiculo-card">
                        <div class="vehiculo-imagen">
                            <img src="https://images.unsplash.com/photo-1570294646112-27ce4f174e4f?w=600" alt="Minivan">
                            <div class="vehiculo-tipo">MINIVAN</div>
                        </div>
                        <div class="vehiculo-contenido">
                            <h3>Minivan Techo Alto</h3>
                            <p>Espacio y confort para grupos y familias.</p>
                            <div class="vehiculo-specs">
                                <div class="vehiculo-spec">
                                    <i class="bi bi-people-fill"></i>
                                    <span>8-12 pasajeros</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-snow"></i>
                                    <span>A/C</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-briefcase-fill"></i>
                                    <span>Maletero grande</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-usb-fill"></i>
                                    <span>USB charging</span>
                                </div>
                            </div>
                            <div class="vehiculo-ideal">
                                <strong>Ideal para:</strong> Grupos familiares, tours y eventos.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="vehiculo-card">
                        <div class="vehiculo-imagen">
                            <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?w=600" alt="Auto Ejecutivo">
                            <div class="vehiculo-tipo">EJECUTIVO</div>
                        </div>
                        <div class="vehiculo-contenido">
                            <h3>Auto Ejecutivo</h3>
                            <p>Elegancia y eficiencia para viajes de negocios.</p>
                            <div class="vehiculo-specs">
                                <div class="vehiculo-spec">
                                    <i class="bi bi-people-fill"></i>
                                    <span>3-4 pasajeros</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-snow"></i>
                                    <span>A/C</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-briefcase-fill"></i>
                                    <span>Maletero mediano</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-music-note-beamed"></i>
                                    <span>Bluetooth</span>
                                </div>
                            </div>
                            <div class="vehiculo-ideal">
                                <strong>Ideal para:</strong> Traslados ejecutivos y city tours.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="vehiculo-card">
                        <div class="vehiculo-imagen">
                            <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=600" alt="Camioneta 4x4">
                            <div class="vehiculo-tipo">4X4</div>
                        </div>
                        <div class="vehiculo-contenido">
                            <h3>Camioneta 4x4</h3>
                            <p>Potencia y seguridad para terrenos difíciles.</p>
                            <div class="vehiculo-specs">
                                <div class="vehiculo-spec">
                                    <i class="bi bi-people-fill"></i>
                                    <span>4-5 pasajeros</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-snow"></i>
                                    <span>A/C</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-briefcase-fill"></i>
                                    <span>Maletero amplio</span>
                                </div>
                                <div class="vehiculo-spec">
                                    <i class="bi bi-signpost-2-fill"></i>
                                    <span>4x4 real</span>
                                </div>
                            </div>
                            <div class="vehiculo-ideal">
                                <strong>Ideal para:</strong> Rutas off-road y zonas remotas.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  -->

    <!-- ============================================
         7. PROCESO DE RESERVA
         ============================================ -->
    <section class="section-padding proceso-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="badge-seccion">
                    <i class="bi bi-list-check"></i>
                    Proceso Simple
                </div>
                <h2 class="section-title">¿Cómo reservar con Car Wari?</h2>
                <p class="section-subtitle">
                    En solo 4 pasos simples podrás disfrutar de nuestro servicio.
                </p>
            </div>

            <div class="proceso-timeline">
                <div class="proceso-paso">
                    <div class="proceso-numero">1</div>
                    <h4>Selecciona el servicio</h4>
                    <p>Elige el tipo de transporte que necesitas.</p>
                </div>
                <div class="proceso-paso">
                    <div class="proceso-numero">2</div>
                    <h4>Solicita cotización</h4>
                    <p>Completa el formulario con tus datos.</p>
                </div>
                <div class="proceso-paso">
                    <div class="proceso-numero">3</div>
                    <h4>Confirmamos disponibilidad</h4>
                    <p>Te contactamos para validar tu reserva.</p>
                </div>
                <div class="proceso-paso">
                    <div class="proceso-numero">4</div>
                    <h4>Realiza el viaje</h4>
                    <p>Disfruta de un viaje cómodo y seguro.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         8. ESTADÍSTICAS
         ============================================ -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-numero">200+</div>
                    <div class="stat-label">Clientes felices</div>
                </div>
                <div class="stat-item">
                    <div class="stat-numero">300+</div>
                    <div class="stat-label">Viajes realizados</div>
                </div>
                <div class="stat-item">
                    <div class="stat-numero">10+</div>
                    <div class="stat-label">Destinos</div>
                </div>
                <div class="stat-item">
                    <div class="stat-numero">4.9★</div>
                    <div class="stat-label">Calificación</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         9. TESTIMONIOS
         ============================================ -->
    <section class="section-padding testimonios-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="badge-seccion">
                    <i class="bi bi-chat-quote-fill"></i>
                    Testimonios
                </div>
                <h2 class="section-title">Lo que dicen nuestros clientes</h2>
                <p class="section-subtitle">
                    La satisfacción de nuestros clientes es nuestra mejor carta de presentación.
                </p>
            </div>

            <div id="testimoniosCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#testimoniosCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#testimoniosCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#testimoniosCarousel" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="testimonio-card">
                                    <div class="testimonio-estrellas">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonio-texto">
                                        "Excelente servicio. El conductor conocía cada rincón de Ayacucho. El vehículo estaba impecable y llegamos a tiempo a todos los destinos."
                                    </p>
                                    <div class="testimonio-autor">
                                        <div class="autor-avatar">MR</div>
                                        <div>
                                            <div class="autor-nombre">María Rodríguez</div>
                                            <div class="autor-ubicacion">Lima, Perú</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonio-card">
                                    <div class="testimonio-estrellas">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonio-texto">
                                        "Car Wari transformó nuestra visita a Ayacucho. La música, la comodidad y el trato personalizado hicieron todo perfecto."
                                    </p>
                                    <div class="testimonio-autor">
                                        <div class="autor-avatar">CM</div>
                                        <div>
                                            <div class="autor-nombre">Carlos Mendoza</div>
                                            <div class="autor-ubicacion">Cusco, Perú</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonio-card">
                                    <div class="testimonio-estrellas">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonio-texto">
                                        "Nunca había tenido un servicio de transporte turístico tan profesional. Definitivamente volveré con Car Wari."
                                    </p>
                                    <div class="testimonio-autor">
                                        <div class="autor-avatar">AG</div>
                                        <div>
                                            <div class="autor-nombre">Ana García</div>
                                            <div class="autor-ubicacion">Buenos Aires, Argentina</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="testimonio-card">
                                    <div class="testimonio-estrellas">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonio-texto">
                                        "Viajamos de Ayacucho a Lima con Car Wari y fue una experiencia increíble. Puntuales, seguros y muy amables."
                                    </p>
                                    <div class="testimonio-autor">
                                        <div class="autor-avatar">JP</div>
                                        <div>
                                            <div class="autor-nombre">Juan Pérez</div>
                                            <div class="autor-ubicacion">Huancayo, Perú</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonio-card">
                                    <div class="testimonio-estrellas">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonio-texto">
                                        "El servicio VIP es espectacular. La SUV estaba en perfectas condiciones y el conductor muy profesional."
                                    </p>
                                    <div class="testimonio-autor">
                                        <div class="autor-avatar">LS</div>
                                        <div>
                                            <div class="autor-nombre">Laura Sánchez</div>
                                            <div class="autor-ubicacion">Arequipa, Perú</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonio-card">
                                    <div class="testimonio-estrellas">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonio-texto">
                                        "Contratamos el servicio corporativo para nuestra empresa y quedamos muy satisfechos. Totalmente recomendados."
                                    </p>
                                    <div class="testimonio-autor">
                                        <div class="autor-avatar">RT</div>
                                        <div>
                                            <div class="autor-nombre">Roberto Torres</div>
                                            <div class="autor-ubicacion">Ayacucho, Perú</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="testimonio-card">
                                    <div class="testimonio-estrellas">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonio-texto">
                                        "Hicimos un tour personalizado por Ayacucho y fue la mejor decisión. Flexibilidad total y precios justos."
                                    </p>
                                    <div class="testimonio-autor">
                                        <div class="autor-avatar">DM</div>
                                        <div>
                                            <div class="autor-nombre">Diego Morales</div>
                                            <div class="autor-ubicacion">Trujillo, Perú</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonio-card">
                                    <div class="testimonio-estrellas">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonio-texto">
                                        "El traslado al aeropuerto fue perfecto. Puntualidad absoluta y el conductor muy atento con nuestro equipaje."
                                    </p>
                                    <div class="testimonio-autor">
                                        <div class="autor-avatar">SF</div>
                                        <div>
                                            <div class="autor-nombre">Sofía Flores</div>
                                            <div class="autor-ubicacion">Piura, Perú</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonio-card">
                                    <div class="testimonio-estrellas">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonio-texto">
                                        "Viajé de Ayacucho a Cusco con Car Wari. El viaje fue cómodo, seguro y el paisaje espectacular. 100% recomendado."
                                    </p>
                                    <div class="testimonio-autor">
                                        <div class="autor-avatar">MV</div>
                                        <div>
                                            <div class="autor-nombre">Miguel Vargas</div>
                                            <div class="autor-ubicacion">Lima, Perú</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#testimoniosCarousel" data-bs-slide="prev">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimoniosCarousel" data-bs-slide="next">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- ============================================
         10. PREGUNTAS FRECUENTES
         ============================================ -->
    <section class="section-padding faq-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="badge-seccion">
                    <i class="bi bi-question-circle-fill"></i>
                    FAQ
                </div>
                <h2 class="section-title">Preguntas Frecuentes</h2>
                <p class="section-subtitle">
                    Resolvemos las dudas más comunes sobre nuestros servicios.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion accordion-custom" id="faqAccordion">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    <span class="faq-numero">1</span>
                                    ¿Qué tipos de servicios ofrece Car Wari?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ofrecemos tours turísticos, traslados al aeropuerto, taxi interprovincial, 
                                    transporte corporativo, transporte ejecutivo VIP y viajes personalizados. 
                                    Cada servicio está diseñado para necesidades de nuestros clientes.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    <span class="faq-numero">2</span>
                                    ¿Cómo puedo reservar un servicio?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Puedes reservar a través de nuestro sitio web completando el formulario de búsqueda, 
                                    contactándonos por WhatsApp al +51 916 466 009, o llamando directamente a nuestra línea 
                                    de atención. También puedes visitar nuestras oficinas en Av. Mariscal cáceres s/n°, Ayacucho.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    <span class="faq-numero">3</span>
                                    ¿Qué métodos de pago aceptan?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Aceptamos transferencias bancarias, depósitos en efectivo, Yape, Plin y pago en efectivo 
                                    al momento del servicio. Próximamente integraremos tarjetas de crédito/débito y pasarelas 
                                    de pago electrónicas.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    <span class="faq-numero">4</span>
                                    ¿Cuál es la política de cancelación?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Cancelaciones con más de 48 horas de anticipación: reembolso del 100%. 
                                    Entre 24 y 48 horas: reembolso del 75%. Menos de 24 horas: reembolso del 50%. 
                                    No presentación (no-show): sin reembolso. En casos de fuerza mayor, ofrecemos 
                                    reprogramación sin costo.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    <span class="faq-numero">5</span>
                                    ¿Los vehículos cuentan con seguro?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sí, todos nuestros servicios incluyen seguro de viaje para los pasajeros, conforme 
                                    a la legislación peruana vigente. Además, nuestros vehículos cuentan con SOAT vigente 
                                    y revisiones técnicas al día.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                    <span class="faq-numero">6</span>
                                    ¿Puedo personalizar mi ruta de viaje?
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    ¡Absolutamente! Nuestro servicio de viajes personalizados te permite diseñar tu propia 
                                    ruta según tus preferencias. Puedes elegir los destinos, las paradas y el tiempo que 
                                    deseas dedicar a cada lugar. Te asesoramos para crear la experiencia perfecta.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                    <span class="faq-numero">7</span>
                                    ¿Cuántos pasajeros pueden viajar en cada vehículo?
                                </button>
                            </h2>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Depende del tipo de vehículo: Autos ejecutivos (3-4 pasajeros), SUVs (4-5 pasajeros), 
                                    Minivans techo alto (8-12 pasajeros) y Camionetas 4x4 (4-5 pasajeros). Te ayudamos a 
                                    elegir el vehículo ideal según el tamaño de tu grupo.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                    <span class="faq-numero">8</span>
                                    ¿Los conductores hablan inglés?
                                </button>
                            </h2>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sí, contamos con conductores bilingües (español/inglés) especialmente para nuestro 
                                    servicio de Transporte Ejecutivo VIP. Para otros servicios, todos nuestros conductores 
                                    hablan español y algunos tienen conocimientos básicos de inglés.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                    <span class="faq-numero">9</span>
                                    ¿Qué incluye el servicio de traslado al aeropuerto?
                                </button>
                            </h2>
                            <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    El servicio incluye: monitoreo de vuelos en tiempo real, espera sin cargo adicional 
                                    (hasta 30 minutos), asistencia con el equipaje, vehículo cómodo con aire acondicionado 
                                    y conductor profesional. Te llevamos directamente desde el aeropuerto hasta tu destino 
                                    en Ayacucho.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq10">
                                    <span class="faq-numero">10</span>
                                    ¿Ofrecen servicio los fines de semana y feriados?
                                </button>
                            </h2>
                            <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sí, operamos los 365 días del año, incluyendo fines de semana y feriados. Nuestro 
                                    horario de atención es de lunes a domingo de 6:00 AM a 10:00 PM. Para servicios 
                                    fuera de este horario, contáctanos con anticipación para coordinar.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         11. CALL TO ACTION
         ============================================ -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>¿Listo para viajar con <span>Car Wari</span>?</h2>
                <p>
                    Reserva ahora y vive una experiencia única con los mejores profesionales 
                    del transporte turístico en Ayacucho.
                </p>
                <div class="cta-botones">
                    <a href="#servicios" class="btn-amarillo btn-cta">
                        <i class="bi bi-calendar-check-fill"></i>
                        Reservar Ahora
                    </a>
                    <a href="https://wa.me/51916466009" class="btn-whatsapp btn-cta" target="_blank">
                        <i class="bi bi-whatsapp"></i>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

   

  

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



<script>
    // Esperar a que todo el documento HTML esté cargado
    document.addEventListener('DOMContentLoaded', function() {
        
        // Número de WhatsApp de la empresa (¡CÁMBIALO POR EL REAL!)
        const numeroWhatsApp = '51916466009'; 

        // ==========================================
        // 1. LÓGICA PARA RUTAS INTERPROVINCIALES
        // ==========================================
        document.querySelectorAll('.btn-consultar-ruta').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.destino-card');
                
                const origen = card.getAttribute('data-origen');
                const destino = card.getAttribute('data-destino');
                const distancia = card.getAttribute('data-distancia');
                const tiempo = card.getAttribute('data-tiempo');
                const vehiculo = card.getAttribute('data-vehiculo');
                
                const mensaje = `¡Hola Car Wari! 👋

Me interesa consultar la disponibilidad y cotización para la siguiente ruta:

📍 *Origen:* ${origen}
🎯 *Destino:* ${destino}
📏 *Distancia:* ${distancia}
⏱️ *Tiempo estimado:* ${tiempo}
🚗 *Vehículo recomendado:* ${vehiculo}

Por favor, envíenme más detalles, precios y fechas disponibles. ¡Gracias!`;
                
                const urlWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(mensaje)}`;
                window.open(urlWhatsApp, '_blank');
            });
        });

        // ==========================================
        // 2. LÓGICA PARA SERVICIOS PRINCIPALES
        // ==========================================
        document.querySelectorAll('.btn-servicio-wa').forEach(button => {
            button.addEventListener('click', function() {
                const servicio = this.getAttribute('data-servicio');
                const mensajeBase = this.getAttribute('data-mensaje');
                
                const mensajeFinal = `${mensajeBase} 

Por favor, envíenme más detalles, disponibilidad y precios. ¡Gracias!`;
                
                const urlWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(mensajeFinal)}`;
                window.open(urlWhatsApp, '_blank');
            });
        });

    });
</script>
</body>
</html>

@endsection