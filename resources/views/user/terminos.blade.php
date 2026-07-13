@extends('layouts.app')

@section('title', 'terminos y condiciones')

@section('content')
    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Términos y Condiciones de Car Wari - Transporte Turístico en Ayacucho, Perú. Conoce las condiciones que regulan el uso de nuestros servicios.">
    <title>Términos y Condiciones | Car Wari - Transporte Turístico Ayacucho</title>
    
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
            --whatsapp: #25D366;
            --sombra-suave: 0 4px 20px rgba(0, 0, 0, 0.08);
            --sombra-media: 0 8px 30px rgba(0, 0, 0, 0.12);
            --sombra-fuerte: 0 16px 50px rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gris-claro);
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
           1. HERO SECTION
           ============================================ */
        .hero-terminos {
            background: linear-gradient(135deg, rgba(10, 10, 10, 0.92) 0%, rgba(10, 10, 10, 0.75) 100%),
                        url('https://images.unsplash.com/photo-1526392060635-9d6019884377?w=1920') center/cover;
            padding: 100px 0 80px;
            color: var(--blanco);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-terminos::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(255, 215, 0, 0.15) 0%, transparent 50%);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: var(--amarillo-suave);
            border: 1px solid var(--amarillo);
            color: var(--amarillo);
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 24px;
        }

        .hero-terminos h1 {
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 20px;
            position: relative;
        }

        .hero-terminos h1 span {
            color: var(--amarillo);
        }

        .hero-subtitle {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.8);
            max-width: 700px;
            margin: 0 auto 30px;
            position: relative;
        }

        .hero-meta {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            position: relative;
        }

        .hero-meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            padding: 12px 20px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-meta-item i {
            color: var(--amarillo);
            font-size: 18px;
        }

        .hero-meta-item .label {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .hero-meta-item .value {
            font-weight: 600;
            font-size: 14px;
        }

        /* ============================================
           2. TARJETA RESUMEN
           ============================================ */
        .resumen-section {
            padding: 60px 0 40px;
        }

        .resumen-card {
            background: var(--blanco);
            border-radius: 16px;
            padding: 40px;
            box-shadow: var(--sombra-suave);
            border: 1px solid var(--gris-medio);
        }

        .resumen-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .resumen-item {
            text-align: center;
            padding: 20px;
            border-radius: 12px;
            background: var(--gris-claro);
            transition: all 0.3s ease;
        }

        .resumen-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--sombra-media);
        }

        .resumen-item i {
            font-size: 32px;
            color: var(--amarillo);
            margin-bottom: 12px;
        }

        .resumen-item .label {
            font-size: 12px;
            color: var(--gris-texto);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .resumen-item .value {
            font-weight: 600;
            color: var(--negro);
            font-size: 15px;
        }

        /* ============================================
           3. LAYOUT PRINCIPAL (Sidebar + Contenido)
           ============================================ */
        .main-content {
            padding: 40px 0 80px;
        }

        /* Sidebar Índice */
        .sidebar-indice {
            position: sticky;
            top: 100px;
            background: var(--blanco);
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--sombra-suave);
            border: 1px solid var(--gris-medio);
        }

        .sidebar-indice h5 {
            font-size: 16px;
            font-weight: 700;
            color: var(--negro);
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--amarillo);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-indice h5 i {
            color: var(--amarillo);
        }

        .indice-lista {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .indice-lista li {
            margin-bottom: 4px;
        }

        .indice-lista a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: var(--gris-oscuro);
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }

        .indice-lista a i {
            color: var(--gris-texto);
            font-size: 16px;
            transition: color 0.3s;
        }

        .indice-lista a:hover {
            background: var(--amarillo-suave);
            color: var(--negro);
            border-left-color: var(--amarillo);
        }

        .indice-lista a:hover i {
            color: var(--amarillo);
        }

        .indice-lista a.active {
            background: var(--amarillo-suave);
            color: var(--negro);
            border-left-color: var(--amarillo);
            font-weight: 600;
        }

        .indice-lista a.active i {
            color: var(--amarillo);
        }

        /* Tarjetas de Sección */
        .seccion-card {
            background: var(--blanco);
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: var(--sombra-suave);
            border: 1px solid var(--gris-medio);
            transition: all 0.3s ease;
        }

        .seccion-card:hover {
            box-shadow: var(--sombra-media);
            transform: translateY(-2px);
        }

        .seccion-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--gris-claro);
            position: relative;
        }

        .seccion-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 80px;
            height: 2px;
            background: var(--amarillo);
        }

        .seccion-icono {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--amarillo) 0%, var(--amarillo-hover) 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--negro);
            font-size: 28px;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(255, 215, 0, 0.3);
        }

        .seccion-header h2 {
            font-size: 28px;
            font-weight: 700;
            color: var(--negro);
            margin: 0;
        }

        .seccion-header .seccion-numero {
            font-size: 13px;
            color: var(--gris-texto);
            font-weight: 500;
            display: block;
            margin-bottom: 4px;
        }

        .seccion-card h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--negro);
            margin: 24px 0 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .seccion-card h3 i {
            color: var(--amarillo);
            font-size: 22px;
        }

        .seccion-card p {
            color: var(--gris-oscuro);
            margin-bottom: 16px;
            font-size: 15px;
        }

        .seccion-card ul {
            list-style: none;
            padding: 0;
            margin: 16px 0;
        }

        .seccion-card ul li {
            padding: 10px 0 10px 32px;
            position: relative;
            color: var(--gris-oscuro);
            font-size: 15px;
            border-bottom: 1px solid var(--gris-claro);
        }

        .seccion-card ul li:last-child {
            border-bottom: none;
        }

        .seccion-card ul li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 16px;
            width: 18px;
            height: 18px;
            background: var(--amarillo);
            border-radius: 50%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%230A0A0A' d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
            background-size: 12px;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Destacado */
        .destacado-box {
            background: linear-gradient(135deg, var(--amarillo-suave) 0%, rgba(255, 215, 0, 0.05) 100%);
            border-left: 4px solid var(--amarillo);
            border-radius: 12px;
            padding: 24px;
            margin: 20px 0;
        }

        .destacado-box i {
            color: var(--amarillo);
            font-size: 24px;
            margin-right: 10px;
        }

        .destacado-box strong {
            color: var(--negro);
        }

        /* ============================================
           5. FAQ ACORDEÓN
           ============================================ */
        .faq-section {
            background: var(--negro);
            padding: 80px 0;
            color: var(--blanco);
        }

        .faq-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .faq-header .badge-faq {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--amarillo-suave);
            border: 1px solid var(--amarillo);
            color: var(--amarillo);
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .faq-header h2 {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .faq-header h2 span {
            color: var(--amarillo);
        }

        .faq-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
        }

        .accordion-custom .accordion-item {
            background: var(--negro-suave);
            border: 1px solid var(--gris-oscuro);
            border-radius: 12px !important;
            margin-bottom: 12px;
            overflow: hidden;
        }

        .accordion-custom .accordion-button {
            background: var(--negro-suave);
            color: var(--blanco);
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 16px;
            padding: 20px 24px;
            box-shadow: none !important;
        }

        .accordion-custom .accordion-button:not(.collapsed) {
            background: var(--negro-suave);
            color: var(--amarillo);
        }

        .accordion-custom .accordion-button::after {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%23FFD700' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            transition: transform 0.3s;
        }

        .accordion-custom .accordion-button:not(.collapsed)::after {
            transform: rotate(-180deg);
        }

        .accordion-custom .accordion-body {
            background: var(--negro-suave);
            color: rgba(255, 255, 255, 0.8);
            padding: 0 24px 24px;
            font-size: 15px;
            line-height: 1.7;
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
           6. CONTACTO
           ============================================ */
        .contacto-section {
            padding: 80px 0;
            background: var(--gris-claro);
        }

        .contacto-card {
            background: var(--blanco);
            border-radius: 16px;
            padding: 50px;
            box-shadow: var(--sombra-fuerte);
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .contacto-card h2 {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .contacto-card h2 span {
            color: var(--amarillo);
        }

        .contacto-card > p {
            color: var(--gris-texto);
            font-size: 16px;
            margin-bottom: 40px;
        }

        .contacto-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .contacto-item {
            padding: 24px;
            background: var(--gris-claro);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .contacto-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--sombra-media);
        }

        .contacto-item i {
            font-size: 32px;
            color: var(--amarillo);
            margin-bottom: 12px;
        }

        .contacto-item .label {
            font-size: 12px;
            color: var(--gris-texto);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .contacto-item .value {
            font-weight: 600;
            color: var(--negro);
            font-size: 15px;
        }

        .btn-contactar {
            background: var(--amarillo);
            color: var(--negro);
            font-weight: 700;
            padding: 16px 40px;
            border-radius: 12px;
            border: none;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-contactar:hover {
            background: var(--amarillo-hover);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.4);
            color: var(--negro);
        }

        /* ============================================
           7. CALL TO ACTION
           ============================================ */
        .cta-section {
            background: var(--negro);
            padding: 80px 0;
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
            background: rgba(255, 215, 0, 0.05);
            border-radius: 50%;
        }

        .cta-section::after {
            content: '';
            position: absolute;
            bottom: -150px;
            left: -150px;
            width: 500px;
            height: 500px;
            background: rgba(255, 215, 0, 0.03);
            border-radius: 50%;
        }

        .cta-content {
            position: relative;
            z-index: 1;
        }

        .cta-section h2 {
            font-size: 42px;
            font-weight: 800;
            color: var(--blanco);
            margin-bottom: 20px;
        }

        .cta-section h2 span {
            color: var(--amarillo);
        }

        .cta-section p {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.7);
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

        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-cta-amarillo {
            background: var(--amarillo);
            color: var(--negro);
        }

        .btn-cta-amarillo:hover {
            background: var(--amarillo-hover);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.4);
            color: var(--negro);
        }

        .btn-cta-whatsapp {
            background: var(--whatsapp);
            color: var(--blanco);
        }

        .btn-cta-whatsapp:hover {
            background: #20bd5a;
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(37, 211, 102, 0.4);
            color: var(--blanco);
        }

        /* ============================================
           8. FOOTER
           ============================================ */
        .footer {
            background: var(--negro);
            color: var(--blanco);
            padding: 40px 0 20px;
            border-top: 1px solid var(--gris-oscuro);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-logo-icon {
            width: 44px;
            height: 44px;
            background: var(--amarillo);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--negro);
            font-size: 20px;
        }

        .footer-logo-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 20px;
        }

        .footer-logo-text span {
            color: var(--amarillo);
        }

        .footer-links {
            display: flex;
            gap: 24px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .footer-links a:hover {
            color: var(--amarillo);
        }

        .footer-social {
            display: flex;
            gap: 12px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
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

        .footer-bottom {
            border-top: 1px solid var(--gris-oscuro);
            padding-top: 20px;
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 991px) {
            .hero-terminos h1 {
                font-size: 42px;
            }

            .sidebar-indice {
                position: relative;
                top: 0;
                margin-bottom: 30px;
            }

            .seccion-card {
                padding: 30px 24px;
            }

            .seccion-header h2 {
                font-size: 24px;
            }

            .faq-header h2 {
                font-size: 32px;
            }

            .cta-section h2 {
                font-size: 32px;
            }
        }

        @media (max-width: 768px) {
            .hero-terminos {
                padding: 80px 0 60px;
            }

            .hero-terminos h1 {
                font-size: 32px;
            }

            .hero-subtitle {
                font-size: 16px;
            }

            .hero-meta {
                flex-direction: column;
                align-items: center;
            }

            .seccion-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .contacto-card {
                padding: 30px 20px;
            }

            .contacto-card h2 {
                font-size: 28px;
            }

            .contacto-grid {
                grid-template-columns: 1fr;
            }

            .cta-botones {
                flex-direction: column;
                align-items: center;
            }

            .btn-cta {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }

            .footer-links {
                justify-content: center;
            }

            .footer-social {
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
    <section class="hero-terminos">
        <div class="container">
            <div class="hero-badge">
                <i class="bi bi-file-earmark-text-fill"></i>
                Documento Legal
            </div>
            <h1 class="fade-in">
                Términos y <span>Condiciones</span>
            </h1>
            <p class="hero-subtitle fade-in">
                Conoce las condiciones que regulan el uso de nuestros servicios y plataforma.
            </p>
            <div class="hero-meta fade-in">
                <div class="hero-meta-item">
                    <i class="bi bi-calendar-check-fill"></i>
                    <div>
                        <div class="label">Última actualización</div>
                        <div class="value">15 de enero de 2026</div>
                    </div>
                </div>
                <div class="hero-meta-item">
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <div>
                        <div class="label">Versión</div>
                        <div class="value">1.0</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         2. TARJETA RESUMEN
         ============================================ -->
    <section class="resumen-section">
        <div class="container">
            <div class="resumen-card">
                <div class="resumen-grid">
                    <div class="resumen-item">
                        <i class="bi bi-building-fill"></i>
                        <div class="label">Empresa</div>
                        <div class="value">Ayacucho Software Enterprise</div>
                    </div>
                    <div class="resumen-item">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <div class="label">Documento</div>
                        <div class="value">Términos y Condiciones</div>
                    </div>
                    <div class="resumen-item">
                        <i class="bi bi-file-earmark-check-fill"></i>
                        <div class="label">Versión</div>
                        <div class="value">1.0</div>
                    </div>
                    <div class="resumen-item">
                        <i class="bi bi-calendar-event-fill"></i>
                        <div class="label">Fecha</div>
                        <div class="value">15 de enero de 2026</div>
                    </div>
                    <div class="resumen-item">
                        <i class="bi bi-envelope-fill"></i>
                        <div class="label">Correo</div>
                        <div class="value">legal@carwari.pe</div>
                    </div>
                    <div class="resumen-item">
                        <i class="bi bi-telephone-fill"></i>
                        <div class="label">Teléfono</div>
                        <div class="value">+51 999 000 000</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         3. CONTENIDO PRINCIPAL
         ============================================ -->
    <section class="main-content">
        <div class="container">
            <div class="row">
                <!-- Sidebar Índice -->
                <div class="col-lg-3">
                    <aside class="sidebar-indice">
                        <h5>
                            <i class="bi bi-list-ul"></i>
                            Índice
                        </h5>
                        <ul class="indice-lista">
                            <li><a href="#introduccion"><i class="bi bi-info-circle"></i> Introducción</a></li>
                            <li><a href="#aceptacion"><i class="bi bi-check-circle"></i> Aceptación</a></li>
                            <li><a href="#servicios"><i class="bi bi-car-front"></i> Servicios</a></li>
                            <li><a href="#registro"><i class="bi bi-person-plus"></i> Registro</a></li>
                            <li><a href="#reservas"><i class="bi bi-calendar-check"></i> Reservas</a></li>
                            <li><a href="#pagos"><i class="bi bi-credit-card"></i> Pagos</a></li>
                            <li><a href="#cancelaciones"><i class="bi bi-x-circle"></i> Cancelaciones</a></li>
                            <li><a href="#obligaciones"><i class="bi bi-shield-check"></i> Obligaciones</a></li>
                            <li><a href="#responsabilidad"><i class="bi bi-exclamation-triangle"></i> Responsabilidad</a></li>
                            <li><a href="#propiedad"><i class="bi bi-copyright"></i> Propiedad Intelectual</a></li>
                            <li><a href="#datos"><i class="bi bi-shield-lock"></i> Protección de Datos</a></li>
                            <li><a href="#cookies"><i class="bi bi-cookie"></i> Cookies</a></li>
                            <li><a href="#legislacion"><i class="bi bi-scale"></i> Legislación</a></li>
                            <li><a href="#contacto"><i class="bi bi-envelope"></i> Contacto</a></li>
                        </ul>
                    </aside>
                </div>

                <!-- Contenido Principal -->
                <div class="col-lg-9">
                    
                    <!-- Sección 1: Introducción -->
                    <div class="seccion-card" id="introduccion">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-info-circle-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 01</span>
                                <h2>Introducción</h2>
                            </div>
                        </div>
                        <p>
                            Bienvenido a los <strong>Términos y Condiciones</strong> de <strong>Car Wari</strong>, 
                            operado por <strong>Ayacucho Software Enterprise</strong>. Este documento establece 
                            las reglas, condiciones y disposiciones legales que regulan el uso de nuestro sitio 
                            web <strong>www.carwari.pe</strong> y la contratación de nuestros servicios de 
                            transporte turístico.
                        </p>
                        <p>
                            Nuestro objetivo es brindarte una experiencia clara, transparente y segura al 
                            utilizar nuestra plataforma. Por ello, hemos redactado estos términos en un 
                            lenguaje accesible, sin dejar de lado el rigor legal que exige la legislación 
                            peruana vigente.
                        </p>
                        <div class="destacado-box">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <strong>Importante:</strong> Te invitamos a leer cuidadosamente este documento 
                            antes de utilizar nuestros servicios, ya que su aceptación es requisito 
                            indispensable para navegar, registrarte y realizar reservas en nuestra plataforma.
                        </div>
                    </div>

                    <!-- Sección 2: Aceptación -->
                    <div class="seccion-card" id="aceptacion">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 02</span>
                                <h2>Aceptación de los Términos</h2>
                            </div>
                        </div>
                        <p>
                            Al acceder, navegar o utilizar el sitio web de Car Wari, así como al registrarte 
                            como usuario o contratar cualquiera de nuestros servicios, declaras haber leído, 
                            comprendido y aceptado íntegramente los presentes Términos y Condiciones, así 
                            como nuestra Política de Privacidad y Política de Cookies.
                        </p>
                        <p>
                            Si no estás de acuerdo con alguna disposición de este documento, te solicitamos 
                            abstenerse de utilizar nuestra plataforma y nuestros servicios. El uso continuado 
                            del sitio implica la aceptación tácita e inequívoca de todas las condiciones aquí 
                            establecidas.
                        </p>
                        <div class="destacado-box">
                            <i class="bi bi-info-circle-fill"></i>
                            Car Wari se reserva el derecho de modificar estos términos en cualquier momento, 
                            conforme a lo establecido en la sección de Modificaciones.
                        </div>
                    </div>

                    <!-- Sección 3: Servicios -->
                    <div class="seccion-card" id="servicios">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-car-front-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 03</span>
                                <h2>Servicios Ofrecidos</h2>
                            </div>
                        </div>
                        <p>Car Wari ofrece los siguientes servicios a través de su plataforma:</p>
                        
                        <h3><i class="bi bi-star-fill"></i> Servicios principales</h3>
                        <ul>
                            <li><strong>Transporte turístico privado:</strong> Traslados en vehículos confortables (autos, SUVs y minivans con techo alto) con conductor experto.</li>
                            <li><strong>Tours a destinos turísticos:</strong> Rutas programadas hacia los principales destinos de Ayacucho, incluyendo Huari-Huanta, Vilcashuamán, Wari Willka, Alfajomayo, Valle del Sondondo y otros.</li>
                            <li><strong>Tours personalizados:</strong> Itinerarios diseñados según las preferencias del cliente, con flexibilidad total de rutas y paradas.</li>
                            <li><strong>Traslados aeropuerto-hotel:</strong> Servicio de pick-up y drop-off con monitoreo de vuelos y espera sin cargo adicional (hasta 30 minutos).</li>
                            <li><strong>City Tour Ayacucho:</strong> Recorridos por los principales atractivos de la ciudad, incluyendo el circuito de las 33 iglesias.</li>
                            <li><strong>Tours arqueológicos:</strong> Visitas guiadas a sitios históricos y culturales de la región.</li>
                            <li><strong>Excursiones y aventuras:</strong> Actividades especiales en entornos naturales.</li>
                            <li><strong>Transporte corporativo:</strong> Servicios empresariales para transporte de personal y clientes.</li>
                        </ul>

                        <h3><i class="bi bi-plus-circle-fill"></i> Servicios complementarios</h3>
                        <ul>
                            <li>Asesoría turística y recomendaciones personalizadas.</li>
                            <li>Gestión de reservas en línea.</li>
                            <li>Atención al cliente vía formularios, correo electrónico y WhatsApp.</li>
                        </ul>
                    </div>

                    <!-- Sección 4: Registro -->
                    <div class="seccion-card" id="registro">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 04</span>
                                <h2>Registro de Usuarios</h2>
                            </div>
                        </div>
                        
                        <h3><i class="bi bi-check2-circle"></i> Requisitos para el registro</h3>
                        <ul>
                            <li>Ser mayor de 18 años o contar con autorización de un padre, madre o tutor legal.</li>
                            <li>Proporcionar información veraz, exacta, actualizada y completa.</li>
                            <li>Aceptar los presentes Términos y Condiciones y la Política de Privacidad.</li>
                            <li>Contar con una dirección de correo electrónico válida y un número de teléfono activo.</li>
                        </ul>

                        <h3><i class="bi bi-shield-lock-fill"></i> Responsabilidad del usuario</h3>
                        <ul>
                            <li>Mantener la confidencialidad de sus credenciales de acceso.</li>
                            <li>No compartir su cuenta con terceros.</li>
                            <li>Actualizar su información personal cuando sea necesario.</li>
                            <li>Ser responsable de todas las actividades que se realicen bajo su cuenta.</li>
                        </ul>

                        <div class="destacado-box">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            <strong>Seguridad:</strong> Recomendamos utilizar contraseñas seguras que combinen 
                            letras mayúsculas, minúsculas, números y caracteres especiales. Car Wari implementa 
                            medidas de seguridad para proteger las cuentas, pero el usuario debe notificar 
                            inmediatamente cualquier uso no autorizado.
                        </div>
                    </div>

                    <!-- Sección 5: Reservas -->
                    <div class="seccion-card" id="reservas">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-calendar-check-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 05</span>
                                <h2>Proceso de Reservas</h2>
                            </div>
                        </div>
                        <p>El proceso de reserva en Car Wari se realiza de la siguiente manera:</p>
                        
                        <ul>
                            <li><strong>Paso 1 - Selección del destino:</strong> El cliente explora el catálogo de destinos disponibles y selecciona aquel que desea visitar.</li>
                            <li><strong>Paso 2 - Fecha y pasajeros:</strong> El cliente elige la fecha del viaje y el número de pasajeros. El sistema muestra la disponibilidad en tiempo real.</li>
                            <li><strong>Paso 3 - Selección del vehículo:</strong> El cliente selecciona el tipo de vehículo (auto, SUV o minivan), según la capacidad y características requeridas.</li>
                            <li><strong>Paso 4 - Ingreso de datos:</strong> El cliente completa sus datos personales y los de los pasajeros.</li>
                            <li><strong>Paso 5 - Revisión y confirmación:</strong> El cliente revisa el resumen de la reserva. Al confirmar, la solicitud es enviada a Car Wari para su validación.</li>
                            <li><strong>Paso 6 - Validación:</strong> Car Wari verifica la disponibilidad y valida la reserva (hasta 24 horas hábiles).</li>
                            <li><strong>Paso 7 - Confirmación formal:</strong> La reserva queda formalmente confirmada cuando Car Wari aprueba la solicitud y el cliente recibe notificación por correo electrónico y WhatsApp.</li>
                        </ul>

                        <div class="destacado-box">
                            <i class="bi bi-info-circle-fill"></i>
                            <strong>Importante:</strong> La reserva queda formalmente confirmada únicamente 
                            cuando Car Wari aprueba la solicitud y el cliente recibe la notificación de 
                            confirmación por correo electrónico.
                        </div>
                    </div>

                    <!-- Sección 6: Pagos -->
                    <div class="seccion-card" id="pagos">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-credit-card-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 06</span>
                                <h2>Tarifas y Formas de Pago</h2>
                            </div>
                        </div>
                        
                        <h3><i class="bi bi-cash-coin"></i> Tarifas</h3>
                        <ul>
                            <li>Los precios se publican en soles peruanos (PEN) y pueden variar según temporada, disponibilidad y costos operativos.</li>
                            <li>Los precios vigentes al momento de realizar la reserva serán los aplicables, siempre que la reserva sea confirmada.</li>
                            <li>Antes de confirmar, el cliente podrá visualizar el precio total con impuestos incluidos.</li>
                            <li>Car Wari emitirá los comprobantes de pago correspondientes según lo establecido por la SUNAT.</li>
                        </ul>

                        <h3><i class="bi bi-wallet2"></i> Formas de pago</h3>
                        <ul>
                            <li>Transferencia bancaria a cuentas designadas por la empresa.</li>
                            <li>Depósito en efectivo en nuestras oficinas o agentes autorizados.</li>
                            <li>Yape y Plin a los números oficiales de la empresa.</li>
                            <li>Pago en efectivo al momento del servicio (previa coordinación).</li>
                        </ul>

                        <div class="destacado-box">
                            <i class="bi bi-lightning-fill"></i>
                            <strong>Próximamente:</strong> Car Wari se encuentra en proceso de integración de 
                            tarjetas de crédito/débito y pasarelas de pago electrónicas.
                        </div>
                    </div>

                    <!-- Sección 7: Cancelaciones -->
                    <div class="seccion-card" id="cancelaciones">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 07</span>
                                <h2>Cancelaciones y Modificaciones</h2>
                            </div>
                        </div>
                        
                        <h3><i class="bi bi-person-x-fill"></i> Cancelación por parte del cliente</h3>
                        <ul>
                            <li><strong>Más de 48 horas de anticipación:</strong> Sin penalidad, reembolso del 100%.</li>
                            <li><strong>Entre 24 y 48 horas:</strong> Penalidad del 25%, reembolso del 75%.</li>
                            <li><strong>Menos de 24 horas:</strong> Penalidad del 50%, reembolso del 50%.</li>
                            <li><strong>No presentación (No-show):</strong> Penalidad del 100%, sin reembolso.</li>
                        </ul>

                        <h3><i class="bi bi-arrow-repeat"></i> Modificación de fechas</h3>
                        <ul>
                            <li>El cliente puede solicitar cambio de fecha sujeto a disponibilidad.</li>
                            <li>Solicitud con al menos 48 horas de anticipación.</li>
                            <li>Puede aplicar diferencia de precio según la nueva fecha.</li>
                        </ul>

                        <h3><i class="bi bi-cloud-haze2-fill"></i> Fuerza mayor</h3>
                        <p>
                            En casos de fuerza mayor (desastres naturales, emergencias sanitarias, bloqueos 
                            de vías, condiciones climáticas extremas), ambas partes podrán cancelar o 
                            reprogramar el servicio sin penalidad alguna, conforme al Código Civil Peruano.
                        </p>
                    </div>

                    <!-- Sección 8: Obligaciones -->
                    <div class="seccion-card" id="obligaciones">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-shield-fill-check"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 08</span>
                                <h2>Obligaciones de las Partes</h2>
                            </div>
                        </div>
                        
                        <h3><i class="bi bi-person-fill"></i> Obligaciones del usuario</h3>
                        <ul>
                            <li>Proporcionar información veraz, exacta y actualizada.</li>
                            <li>Mantener una conducta respetuosa y adecuada con el conductor y otros pasajeros.</li>
                            <li>Respetar los horarios establecidos para el inicio y fin del servicio.</li>
                            <li>Cumplir con las normas de seguridad establecidas por el conductor.</li>
                            <li>No consumir bebidas alcohólicas ni sustancias prohibidas durante el servicio.</li>
                            <li>Cuidar el vehículo y sus equipos, respondiendo por cualquier daño causado por mal uso.</li>
                            <li>Realizar los pagos en los plazos y formas establecidas.</li>
                        </ul>

                        <h3><i class="bi bi-building-fill"></i> Obligaciones de Car Wari</h3>
                        <ul>
                            <li>Proporcionar información veraz, clara y suficiente sobre sus servicios.</li>
                            <li>Brindar el servicio contratado en las condiciones pactadas.</li>
                            <li>Poner a disposición vehículos en óptimas condiciones de funcionamiento, limpieza y seguridad.</li>
                            <li>Asignar conductores capacitados, certificados y con experiencia comprobada.</li>
                            <li>Cumplir con los horarios establecidos, salvo causas de fuerza mayor.</li>
                            <li>Mantener los vehículos con SOAT vigente y revisiones técnicas al día.</li>
                            <li>Contar con seguros de responsabilidad civil y de pasajeros.</li>
                            <li>Brindar atención oportuna y de calidad antes, durante y después del servicio.</li>
                        </ul>
                    </div>

                    <!-- Sección 9: Responsabilidad -->
                    <div class="seccion-card" id="responsabilidad">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 09</span>
                                <h2>Responsabilidad</h2>
                            </div>
                        </div>
                        
                        <h3><i class="bi bi-check-circle-fill"></i> Responsabilidad de Car Wari</h3>
                        <ul>
                            <li>La prestación del servicio en las condiciones pactadas.</li>
                            <li>Los daños y perjuicios causados por negligencia o dolo de sus conductores.</li>
                            <li>El incumplimiento de las obligaciones establecidas en estos términos.</li>
                            <li>Los daños a los pasajeros causados por fallas en los vehículos.</li>
                        </ul>

                        <h3><i class="bi bi-x-circle-fill"></i> Límites de responsabilidad</h3>
                        <p>Car Wari no será responsable por:</p>
                        <ul>
                            <li>Daños causados por fuerza mayor o caso fortuito.</li>
                            <li>Situaciones fuera de su control razonable (bloqueos de vías, desastres naturales, emergencias sanitarias).</li>
                            <li>Daños a pertenencias personales de los pasajeros no declarados previamente.</li>
                            <li>Consecuencias indirectas o lucro cesante derivados del servicio.</li>
                            <li>Información proporcionada por terceros (hoteles, restaurantes, guías externos).</li>
                        </ul>

                        <div class="destacado-box">
                            <i class="bi bi-shield-fill-check"></i>
                            <strong>Seguro de viaje:</strong> Todos nuestros servicios incluyen seguro de viaje 
                            para los pasajeros, conforme a la legislación peruana vigente. Los detalles de la 
                            cobertura serán proporcionados al momento de la confirmación de la reserva.
                        </div>
                    </div>

                    <!-- Sección 10: Propiedad Intelectual -->
                    <div class="seccion-card" id="propiedad">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-copyright"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 10</span>
                                <h2>Propiedad Intelectual</h2>
                            </div>
                        </div>
                        <p>
                            Todos los contenidos publicados en la plataforma de Car Wari son propiedad de 
                            <strong>Ayacucho Software Enterprise (Car Wari)</strong> o de sus respectivos 
                            titulares, y se encuentran protegidos por la legislación peruana sobre propiedad 
                            intelectual (Decreto Legislativo N.º 822 - Ley sobre el Derecho de Autor).
                        </p>
                        
                        <h3><i class="bi bi-lock-fill"></i> Contenidos protegidos</h3>
                        <ul>
                            <li>Logotipo, marca comercial y elementos de identidad corporativa.</li>
                            <li>Fotografías, imágenes y material audiovisual.</li>
                            <li>Textos, descripciones y contenidos editoriales.</li>
                            <li>Diseño web, interfaz de usuario y experiencia de usuario.</li>
                            <li>Software, código fuente y aplicaciones.</li>
                            <li>Bases de datos y sistemas de información.</li>
                        </ul>

                        <h3><i class="bi bi-x-circle-fill"></i> Usos prohibidos</h3>
                        <ul>
                            <li>Reproducir, distribuir o modificar los contenidos sin autorización expresa.</li>
                            <li>Utilizar la marca Car Wari para fines comerciales no autorizados.</li>
                            <li>Copiar o emular el diseño de la plataforma.</li>
                            <li>Extraer información de la base de datos de manera automatizada.</li>
                        </ul>
                    </div>

                    <!-- Sección 11: Protección de Datos -->
                    <div class="seccion-card" id="datos">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-shield-lock-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 11</span>
                                <h2>Protección de Datos Personales</h2>
                            </div>
                        </div>
                        <p>
                            Car Wari se compromete a proteger los datos personales de sus usuarios conforme a:
                        </p>
                        <ul>
                            <li><strong>Ley N.º 29733</strong> - Ley de Protección de Datos Personales del Perú.</li>
                            <li><strong>Reglamento de la Ley N.º 29733</strong> (Decreto Supremo N.º 003-2013-JUS).</li>
                            <li>Buenas prácticas internacionales de privacidad.</li>
                        </ul>
                        <p>
                            Los datos personales recopilados serán tratados conforme a los principios de 
                            licitud, consentimiento, finalidad, lealtad, calidad, seguridad y finalidad 
                            establecidos en la ley.
                        </p>
                        <div class="destacado-box">
                            <i class="bi bi-info-circle-fill"></i>
                            Para información detallada sobre el tratamiento de datos personales, te invitamos 
                            a consultar nuestra <strong>Política de Privacidad</strong> completa.
                        </div>
                    </div>

                    <!-- Sección 12: Cookies -->
                    <div class="seccion-card" id="cookies">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-cookie"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 12</span>
                                <h2>Uso de Cookies</h2>
                            </div>
                        </div>
                        <p>
                            Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo 
                            cuando visitas nuestro sitio web, permitiéndonos mejorar tu experiencia de navegación.
                        </p>
                        
                        <h3><i class="bi bi-list-check"></i> Tipos de cookies utilizadas</h3>
                        <ul>
                            <li><strong>Cookies esenciales:</strong> Necesarias para el funcionamiento del sitio.</li>
                            <li><strong>Cookies de rendimiento:</strong> Para analizar el uso de la plataforma.</li>
                            <li><strong>Cookies de funcionalidad:</strong> Para recordar preferencias del usuario.</li>
                            <li><strong>Cookies de marketing:</strong> Para mostrar contenido relevante (con consentimiento).</li>
                        </ul>

                        <div class="destacado-box">
                            <i class="bi bi-info-circle-fill"></i>
                            Puedes gestionar las cookies desde la configuración de tu navegador. Ten en cuenta 
                            que desactivar ciertas cookies puede afectar la funcionalidad del sitio.
                        </div>
                    </div>

                    <!-- Sección 13: Legislación -->
                    <div class="seccion-card" id="legislacion">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-scale-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 13</span>
                                <h2>Legislación Aplicable y Resolución de Controversias</h2>
                            </div>
                        </div>
                        
                        <h3><i class="bi bi-book-fill"></i> Marco legal</h3>
                        <p>Los presentes Términos y Condiciones se rigen por la legislación de la República del Perú, en particular:</p>
                        <ul>
                            <li><strong>Código Civil Peruano</strong> (Decreto Legislativo N.º 295)</li>
                            <li><strong>Código de Protección y Defensa del Consumidor</strong> (Ley N.º 29571)</li>
                            <li><strong>Ley de Protección de Datos Personales</strong> (Ley N.º 29733)</li>
                            <li><strong>Ley del Derecho de Autor</strong> (Decreto Legislativo N.º 822)</li>
                            <li><strong>Ley de Firma Digital</strong> (Ley N.º 27269)</li>
                            <li><strong>Ley de Delitos Informáticos</strong> (Ley N.º 30096)</li>
                        </ul>

                        <h3><i class="bi bi-people-fill"></i> Resolución de controversias</h3>
                        <p>
                            Car Wari promueve la resolución amistosa de controversias. Ante cualquier conflicto, 
                            las partes se comprometen a intentar una solución directa y de buena fe, utilizando 
                            los canales de atención al cliente disponibles.
                        </p>
                        <ul>
                            <li><strong>Libro de Reclamaciones:</strong> Disponible en nuestras oficinas y plataforma web. Toda reclamación será atendida dentro de los plazos establecidos por la ley (15 días hábiles para responder, 30 días hábiles para resolver).</li>
                            <li><strong>INDECOPI:</strong> Si la controversia no puede resolverse por vías amistosas, el usuario podrá acudir al Instituto Nacional de Defensa de la Competencia y de la Protección de la Propiedad Intelectual.</li>
                            <li><strong>Jurisdicción:</strong> Para cualquier controversia, las partes se someten a la jurisdicción de los jueces y tribunales de la ciudad de Ayacucho, Perú.</li>
                        </ul>
                    </div>

                    <!-- Sección 14: Contacto -->
                    <div class="seccion-card" id="contacto">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 14</span>
                                <h2>Información de Contacto</h2>
                            </div>
                        </div>
                        <div class="contacto-grid">
                            <div class="contacto-item">
                                <i class="bi bi-building-fill"></i>
                                <div class="label">Empresa</div>
                                <div class="value">Ayacucho Software Enterprise</div>
                            </div>
                            <div class="contacto-item">
                                <i class="bi bi-geo-alt-fill"></i>
                                <div class="label">Dirección</div>
                                <div class="value">Jr. 28 de Julio 125, Ayacucho, Perú</div>
                            </div>
                            <div class="contacto-item">
                                <i class="bi bi-envelope-fill"></i>
                                <div class="label">Correo</div>
                                <div class="value">legal@carwari.pe</div>
                            </div>
                            <div class="contacto-item">
                                <i class="bi bi-telephone-fill"></i>
                                <div class="label">Teléfono</div>
                                <div class="value">+51 999 000 000</div>
                            </div>
                            <div class="contacto-item">
                                <i class="bi bi-whatsapp"></i>
                                <div class="label">WhatsApp</div>
                                <div class="value">+51 999 000 000</div>
                            </div>
                            <div class="contacto-item">
                                <i class="bi bi-clock-fill"></i>
                                <div class="label">Horario</div>
                                <div class="value">Lun - Dom: 6:00 AM - 10:00 PM</div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="mailto:legal@carwari.pe" class="btn-contactar">
                                <i class="bi bi-envelope-fill me-2"></i>Contactar
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         5. FAQ SECTION
         ============================================ -->
    <section class="faq-section">
        <div class="container">
            <div class="faq-header">
                <div class="badge-faq">
                    <i class="bi bi-question-circle-fill"></i>
                    Preguntas Frecuentes
                </div>
                <h2>¿Tienes <span>dudas</span> sobre nuestros Términos?</h2>
                <p>Resolvemos las preguntas más comunes sobre el uso de nuestros servicios</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion accordion-custom" id="faqAccordion">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    <span class="faq-numero">1</span>
                                    ¿Qué son los Términos y Condiciones de Car Wari?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Son el conjunto de reglas y disposiciones legales que regulan el uso de 
                                    nuestro sitio web y la contratación de nuestros servicios de transporte 
                                    turístico. Al utilizar la plataforma, aceptas automáticamente estos términos.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    <span class="faq-numero">2</span>
                                    ¿Es obligatorio aceptar los Términos y Condiciones?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sí. El uso de la plataforma y la contratación de servicios implican la 
                                    aceptación plena de estos términos. Si no estás de acuerdo, te solicitamos 
                                    no utilizar nuestros servicios.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    <span class="faq-numero">3</span>
                                    ¿Puedo realizar una reserva sin crear una cuenta?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Actualmente, para realizar reservas es necesario contar con una cuenta 
                                    registrada en nuestra plataforma. Esto nos permite brindarte un mejor 
                                    servicio y mantener un historial de tus viajes.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    <span class="faq-numero">4</span>
                                    ¿Qué sucede si cancelo mi reserva?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Depende del momento de la cancelación:
                                    <br><br>
                                    • Más de 48 horas antes: reembolso del 100%<br>
                                    • Entre 24 y 48 horas antes: reembolso del 75%<br>
                                    • Menos de 24 horas antes: reembolso del 50%<br>
                                    • No presentación: sin reembolso
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    <span class="faq-numero">5</span>
                                    ¿Car Wari puede cancelar mi reserva?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sí, en casos excepcionales como falta de disponibilidad, condiciones de 
                                    seguridad, incumplimiento de términos o fuerza mayor. En estos casos, 
                                    ofrecemos reembolso total o reprogramación sin costo.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                    <span class="faq-numero">6</span>
                                    ¿Qué medios de pago acepta Car Wari?
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Actualmente aceptamos transferencias bancarias, depósitos en efectivo, 
                                    Yape, Plin y pago en efectivo al momento del servicio. Próximamente 
                                    integraremos tarjetas de crédito/débito y pasarelas de pago electrónicas.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                    <span class="faq-numero">7</span>
                                    ¿Mis datos personales están seguros en Car Wari?
                                </button>
                            </h2>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sí. Cumplimos con la Ley N.º 29733 de Protección de Datos Personales 
                                    del Perú y contamos con medidas de seguridad técnicas y administrativas 
                                    para proteger tu información. Consulta nuestra Política de Privacidad 
                                    para más detalles.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                    <span class="faq-numero">8</span>
                                    ¿Qué hago si tengo un problema con el servicio?
                                </button>
                            </h2>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Puedes contactarnos a través de nuestros canales oficiales (WhatsApp, 
                                    correo electrónico o teléfono). Si el problema no se resuelve, puedes 
                                    presentar un reclamo en nuestro Libro de Reclamaciones.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                    <span class="faq-numero">9</span>
                                    ¿Puedo modificar mi reserva después de confirmarla?
                                </button>
                            </h2>
                            <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sí, puedes solicitar modificaciones sujetas a disponibilidad y con al 
                                    menos 48 horas de anticipación. Pueden aplicar costos adicionales según 
                                    el tipo de cambio.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq10">
                                    <span class="faq-numero">10</span>
                                    ¿Qué sucede en caso de fuerza mayor?
                                </button>
                            </h2>
                            <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    En casos de fuerza mayor (desastres naturales, emergencias, bloqueos, etc.), 
                                    ambas partes pueden cancelar o reprogramar el servicio sin penalidad, 
                                    conforme al Código Civil Peruano.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq11">
                                    <span class="faq-numero">11</span>
                                    ¿Car Wari tiene seguro para los pasajeros?
                                </button>
                            </h2>
                            <div id="faq11" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sí. Todos nuestros servicios incluyen seguro de viaje para los pasajeros, 
                                    conforme a la legislación peruana vigente. Los detalles de cobertura se 
                                    proporcionan al confirmar la reserva.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq12">
                                    <span class="faq-numero">12</span>
                                    ¿Cómo presento una queja o reclamo formal?
                                </button>
                            </h2>
                            <div id="faq12" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Puedes utilizar nuestro Libro de Reclamaciones disponible en nuestras 
                                    oficinas o en la plataforma web. También puedes escribirnos a 
                                    legal@carwari.pe. Atendemos los reclamos dentro de los plazos legales 
                                    establecidos.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         7. CALL TO ACTION
         ============================================ -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>¿Tienes alguna <span>duda</span> sobre nuestros Términos y Condiciones?</h2>
                <p>
                    Estamos aquí para ayudarte. Si tienes preguntas sobre nuestras condiciones de servicio, 
                    contáctanos a través de cualquiera de estos medios.
                </p>
                <div class="cta-botones">
                    <a href="mailto:legal@carwari.pe" class="btn-cta btn-cta-amarillo">
                        <i class="bi bi-envelope-fill"></i>
                        Contáctanos
                    </a>
                    <a href="https://wa.me/51999000000" class="btn-cta btn-cta-whatsapp" target="_blank">
                        <i class="bi bi-whatsapp"></i>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para highlight del índice al hacer scroll -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const secciones = document.querySelectorAll('.seccion-card');
            const enlacesIndice = document.querySelectorAll('.indice-lista a');

            window.addEventListener('scroll', function() {
                let actual = '';
                secciones.forEach(function(seccion) {
                    const seccionTop = seccion.offsetTop;
                    if (scrollY >= (seccionTop - 150)) {
                        actual = seccion.getAttribute('id');
                    }
                });

                enlacesIndice.forEach(function(enlace) {
                    enlace.classList.remove('active');
                    if (enlace.getAttribute('href') === '#' + actual) {
                        enlace.classList.add('active');
                    }
                });
            });
        });
    </script>
</body>
</html>

    
@endsection