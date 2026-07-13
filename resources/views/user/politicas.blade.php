@extends('layouts.app')

@section('title', 'Políticas de Privacidad')

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Política de Privacidad de Car Wari - Transporte Turístico en Ayacucho, Perú. Conoce cómo protegemos tus datos personales.">
    <title>Política de Privacidad | Car Wari - Transporte Turístico Ayacucho</title>
    
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
           HERO SECTION
           ============================================ */
        .hero-privacidad {
            background: linear-gradient(135deg, rgba(10, 10, 10, 0.92) 0%, rgba(10, 10, 10, 0.75) 100%),
                        url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=1920') center/cover;
            padding: 120px 0 80px;
            color: var(--blanco);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-privacidad::before {
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

        .hero-privacidad h1 {
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 20px;
            position: relative;
        }

        .hero-privacidad h1 span {
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
            gap: 30px;
            flex-wrap: wrap;
            position: relative;
        }

        .hero-meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            padding: 12px 24px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-meta-item i {
            color: var(--amarillo);
            font-size: 18px;
        }

        .hero-meta-item .label {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .hero-meta-item .value {
            font-weight: 600;
            font-size: 14px;
        }

        /* ============================================
           LAYOUT PRINCIPAL (Sidebar + Contenido)
           ============================================ */
        .main-content {
            padding: 60px 0;
        }

        /* Sidebar Índice */
        .sidebar-indice {
            position: sticky;
            top: 100px;
            background-color: var(--blanco);
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
            background-color: var(--amarillo-suave);
            color: var(--negro);
            border-left-color: var(--amarillo);
        }

        .indice-lista a:hover i {
            color: var(--amarillo);
        }

        .indice-lista a.active {
            background-color: var(--amarillo-suave);
            color: var(--negro);
            border-left-color: var(--amarillo);
            font-weight: 600;
        }

        .indice-lista a.active i {
            color: var(--amarillo);
        }

        /* Tarjetas de Sección */
        .seccion-card {
            background-color: var(--blanco);
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
            background-color: var(--amarillo);
            border-radius: 50%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%230A0A0A' d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
            background-size: 12px;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Tabla de información */
        .info-tabla {
            background-color: var(--gris-claro);
            border-radius: 12px;
            padding: 24px;
            margin: 20px 0;
        }

        .info-tabla-row {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 16px;
            padding: 12px 0;
            border-bottom: 1px solid var(--gris-medio);
        }

        .info-tabla-row:last-child {
            border-bottom: none;
        }

        .info-tabla-label {
            font-weight: 600;
            color: var(--negro);
            font-size: 14px;
        }

        .info-tabla-value {
            color: var(--gris-oscuro);
            font-size: 14px;
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
           FAQ ACORDEÓN
           ============================================ */
        .faq-section {
            background-color: var(--negro);
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
            background-color: var(--amarillo-suave);
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
            background-color: var(--negro-suave);
            border: 1px solid var(--gris-oscuro);
            border-radius: 12px !important;
            margin-bottom: 12px;
            overflow: hidden;
        }

        .accordion-custom .accordion-button {
            background-color: var(--negro-suave);
            color: var(--blanco);
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 16px;
            padding: 20px 24px;
            box-shadow: none !important;
        }

        .accordion-custom .accordion-button:not(.collapsed) {
            background-color: var(--negro-suave);
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
            background-color: var(--negro-suave);
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
            background-color: var(--amarillo);
            color: var(--negro);
            border-radius: 8px;
            font-weight: 700;
            margin-right: 12px;
            font-size: 14px;
        }

        /* ============================================
           SECCIÓN DE CONTACTO
           ============================================ */
        .contacto-section {
            background: linear-gradient(135deg, var(--amarillo) 0%, var(--amarillo-hover) 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .contacto-section::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .contacto-section::after {
            content: '';
            position: absolute;
            bottom: -150px;
            left: -150px;
            width: 500px;
            height: 500px;
            background-color: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
        }

        .contacto-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .contacto-content h2 {
            font-size: 42px;
            font-weight: 800;
            color: var(--negro);
            margin-bottom: 16px;
        }

        .contacto-content p {
            font-size: 18px;
            color: rgba(10, 10, 10, 0.7);
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .contacto-botones {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-contacto {
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

        .btn-contacto-whatsapp {
            background-color: var(--whatsapp);
            color: var(--blanco);
        }

        .btn-contacto-whatsapp:hover {
            background-color: #20bd5a;
            color: var(--blanco);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(37, 211, 102, 0.4);
        }

        .btn-contacto-email {
            background-color: var(--negro);
            color: var(--amarillo);
        }

        .btn-contacto-email:hover {
            background-color: var(--gris-oscuro);
            color: var(--amarillo);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        }

        .btn-contacto-tel {
            background-color: var(--blanco);
            color: var(--negro);
        }

        .btn-contacto-tel:hover {
            background-color: var(--negro);
            color: var(--amarillo);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        }

        /* ============================================
           FOOTER
           ============================================ */
        .footer {
            background-color: var(--negro);
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
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }

        .footer-links {
            display: flex;
            gap: 24px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }

        .footer-links a:hover {
            color: var(--amarillo);
        }

        /* ============================================
           WHATSAPP FLOATING
           ============================================ */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background-color: var(--whatsapp);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--blanco);
            font-size: 30px;
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
            .hero-privacidad h1 {
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

            .contacto-content h2 {
                font-size: 32px;
            }
        }

        @media (max-width: 768px) {
            .hero-privacidad {
                padding: 100px 0 60px;
            }

            .hero-privacidad h1 {
                font-size: 32px;
            }

            .hero-subtitle {
                font-size: 16px;
            }

            .hero-meta {
                flex-direction: column;
                align-items: center;
            }

            .info-tabla-row {
                grid-template-columns: 1fr;
                gap: 4px;
            }

            .seccion-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .contacto-botones {
                flex-direction: column;
                align-items: center;
            }

            .btn-contacto {
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
@section('content')
<!-- ============================================
         HERO SECTION
         ============================================ -->
    <section class="hero-privacidad">
        <div class="container">
            <div class="hero-badge">
                <i class="bi bi-shield-lock-fill"></i>
                Documento Legal
            </div>
            <h1 class="fade-in">
                Política de <span>Privacidad</span>
            </h1>
            <p class="hero-subtitle fade-in">
                En Car Wari nos comprometemos a proteger tu información personal. 
                Conoce cómo recopilamos, usamos y safeguardamos tus datos.
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
                <div class="hero-meta-item">
                    <i class="bi bi-building-fill"></i>
                    <div>
                        <div class="label">Responsable</div>
                        <div class="value">CAR WARI</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         CONTENIDO PRINCIPAL
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
                            <li><a href="#responsable"><i class="bi bi-building"></i> Responsable</a></li>
                            <li><a href="#informacion"><i class="bi bi-database"></i> Información</a></li>
                            <li><a href="#obtencion"><i class="bi bi-download"></i> Obtención</a></li>
                            <li><a href="#finalidad"><i class="bi bi-bullseye"></i> Finalidad</a></li>
                            <li><a href="#base-legal"><i class="bi bi-scale"></i> Base Legal</a></li>
                            <li><a href="#conservacion"><i class="bi bi-clock-history"></i> Conservación</a></li>
                            <li><a href="#terceros"><i class="bi bi-people"></i> Terceros</a></li>
                            <li><a href="#seguridad"><i class="bi bi-shield-check"></i> Seguridad</a></li>
                            <li><a href="#derechos"><i class="bi bi-person-check"></i> Derechos ARCO</a></li>
                            <li><a href="#cookies"><i class="bi bi-cookie"></i> Cookies</a></li>
                            <li><a href="#enlaces"><i class="bi bi-link-45deg"></i> Enlaces</a></li>
                            <li><a href="#menores"><i class="bi bi-person-heart"></i> Menores</a></li>
                            <li><a href="#transferencia"><i class="bi bi-globe"></i> Transferencia</a></li>
                            <li><a href="#cambios"><i class="bi bi-arrow-repeat"></i> Cambios</a></li>
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
                            Bienvenido a la Política de Privacidad de <strong>Car Wari</strong>. En 
                            <strong>Ayacucho Software Enterprise</strong>, operando bajo el nombre comercial 
                            Car Wari, nos comprometemos a proteger tu privacidad y tratar tus datos personales 
                            con el máximo cuidado y transparencia.
                        </p>
                        <p>
                            Esta política describe cómo recopilamos, usamos, almacenamos y protegemos la 
                            información que nos proporcionas al utilizar nuestro sitio web 
                            <strong>www.carwari.pe</strong> y nuestros servicios de transporte turístico.
                        </p>
                        <div class="destacado-box">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <strong>Importante:</strong> Al utilizar nuestros servicios, aceptas las prácticas 
                            descritas en esta política. Te recomendamos leerla cuidadosamente.
                        </div>
                    </div>

                    <!-- Sección 2: Responsable -->
                    <div class="seccion-card" id="responsable">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-building-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 02</span>
                                <h2>Responsable del Tratamiento</h2>
                            </div>
                        </div>
                        <p>El responsable del tratamiento de tus datos personales es:</p>
                        <div class="info-tabla">
                            <div class="info-tabla-row">
                                <div class="info-tabla-label">Empresa</div>
                                <div class="info-tabla-value">Ayacucho Software Enterprise</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label">Nombre comercial</div>
                                <div class="info-tabla-value">Car Wari</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label">Domicilio</div>
                                <div class="info-tabla-value">Jr. 28 de Julio 125, Ayacucho, Perú</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label">Correo</div>
                                <div class="info-tabla-value">privacidad@carwari.pe</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label">Teléfono</div>
                                <div class="info-tabla-value">+51 999 000 000</div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 3: Información -->
                    <div class="seccion-card" id="informacion">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-database-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 03</span>
                                <h2>Qué Información Recopilamos</h2>
                            </div>
                        </div>
                        
                        <h3><i class="bi bi-person-fill"></i> Información directa</h3>
                        <ul>
                            <li><strong>Datos de identificación:</strong> Nombre completo, apellidos, DNI, pasaporte o carné de extranjería</li>
                            <li><strong>Información de contacto:</strong> Correo electrónico, número de teléfono, dirección</li>
                            <li><strong>Datos de reserva:</strong> Fechas de viaje, destinos, número de pasajeros, preferencias de vehículo</li>
                            <li><strong>Información de pago:</strong> Datos de tarjeta (procesados por pasarelas certificadas)</li>
                            <li><strong>Comunicaciones:</strong> Mensajes de formularios, WhatsApp o correo</li>
                        </ul>

                        <h3><i class="bi bi-cpu-fill"></i> Información automática</h3>
                        <ul>
                            <li><strong>Datos técnicos:</strong> Dirección IP, tipo de navegador, sistema operativo</li>
                            <li><strong>Navegación:</strong> Páginas visitadas, tiempo de permanencia, enlaces clickeados</li>
                            <li><strong>Ubicación:</strong> Información geográfica aproximada basada en IP</li>
                            <li><strong>Cookies:</strong> Identificadores únicos para mejorar tu experiencia</li>
                        </ul>
                    </div>

                    <!-- Sección 4: Obtención -->
                    <div class="seccion-card" id="obtencion">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-download"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 04</span>
                                <h2>Cómo Obtenemos la Información</h2>
                            </div>
                        </div>
                        <ul>
                            <li><strong>Formularios web:</strong> Registro, reservas, contacto y newsletter</li>
                            <li><strong>Interacciones directas:</strong> Teléfono, WhatsApp, correo electrónico, oficinas</li>
                            <li><strong>Tecnologías automáticas:</strong> Cookies, análisis web, direcciones IP</li>
                            <li><strong>Fuentes externas:</strong> Redes sociales y socios comerciales (con consentimiento)</li>
                        </ul>
                    </div>

                    <!-- Sección 5: Finalidad -->
                    <div class="seccion-card" id="finalidad">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-bullseye"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 05</span>
                                <h2>Finalidad del Tratamiento</h2>
                            </div>
                        </div>
                        
                        <h3><i class="bi bi-star-fill"></i> Finalidades principales</h3>
                        <ul>
                            <li>Gestionar y procesar tus reservas de transporte turístico</li>
                            <li>Prestar el servicio: coordinar traslados, asignar conductores y vehículos</li>
                            <li>Enviar confirmaciones, actualizaciones y responder consultas</li>
                            <li>Brindar atención al cliente antes, durante y después del viaje</li>
                            <li>Emitir comprobantes de pago y gestionar transacciones</li>
                        </ul>

                        <h3><i class="bi bi-lightning-fill"></i> Finalidades secundarias</h3>
                        <ul>
                            <li>Analizar preferencias para optimizar nuestra oferta</li>
                            <li>Enviar promociones y novedades (solo con consentimiento)</li>
                            <li>Prevenir fraudes y garantizar la seguridad</li>
                            <li>Cumplir con obligaciones legales y regulatorias</li>
                        </ul>
                    </div>

                    <!-- Sección 6: Base Legal -->
                    <div class="seccion-card" id="base-legal">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-scale-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 06</span>
                                <h2>Base Legal</h2>
                            </div>
                        </div>
                        <ul>
                            <li><strong>Consentimiento:</strong> Al aceptar esta política y usar nuestros servicios</li>
                            <li><strong>Ejecución de contrato:</strong> Necesario para procesar tus reservas</li>
                            <li><strong>Obligaciones legales:</strong> Emisión de comprobantes y reportes</li>
                            <li><strong>Interés legítimo:</strong> Mejora de servicios y prevención de fraudes</li>
                        </ul>
                    </div>

                    <!-- Sección 7: Conservación -->
                    <div class="seccion-card" id="conservacion">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 07</span>
                                <h2>Conservación de la Información</h2>
                            </div>
                        </div>
                        <div class="info-tabla">
                            <div class="info-tabla-row">
                                <div class="info-tabla-label">Cuenta activa</div>
                                <div class="info-tabla-value">Mientras mantengas tu cuenta activa</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label">Datos de reservas</div>
                                <div class="info-tabla-value">5 años después de la última reserva</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label">Facturación</div>
                                <div class="info-tabla-value">5 años según Código Tributario</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label">Marketing</div>
                                <div class="info-tabla-value">Hasta retirar el consentimiento</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label">Seguridad</div>
                                <div class="info-tabla-value">2 años para auditoría</div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 8: Terceros -->
                    <div class="seccion-card" id="terceros">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 08</span>
                                <h2>Compartición con Terceros</h2>
                            </div>
                        </div>
                        <div class="destacado-box">
                            <i class="bi bi-shield-fill-check"></i>
                            <strong>No vendemos ni alquilamos</strong> tu información personal a terceros.
                        </div>
                        <p>Solo compartimos datos en estas situaciones:</p>
                        <ul>
                            <li><strong>Proveedores de servicios:</strong> Procesadores de pago, correo, mensajería, hospedaje web</li>
                            <li><strong>Obligaciones legales:</strong> Cuando lo requiera la ley o autoridad competente</li>
                            <li><strong>Transferencia de negocio:</strong> En caso de fusión o adquisición</li>
                            <li><strong>Con tu consentimiento:</strong> Solo cuando nos autorices explícitamente</li>
                        </ul>
                    </div>

                    <!-- Sección 9: Seguridad -->
                    <div class="seccion-card" id="seguridad">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-shield-fill-check"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 09</span>
                                <h2>Seguridad de la Información</h2>
                            </div>
                        </div>
                        
                        <h3><i class="bi bi-lock-fill"></i> Medidas técnicas</h3>
                        <ul>
                            <li>Cifrado SSL/TLS en todas las transmisiones</li>
                            <li>Almacenamiento seguro con controles de acceso</li>
                            <li>Copias de seguridad regulares</li>
                            <li>Firewalls y antivirus actualizados</li>
                            <li>Autenticación segura de usuarios</li>
                        </ul>

                        <h3><i class="bi bi-person-badge-fill"></i> Medidas administrativas</h3>
                        <ul>
                            <li>Políticas internas de seguridad</li>
                            <li>Capacitación continua del personal</li>
                            <li>Control estricto de accesos</li>
                            <li>Acuerdos de confidencialidad</li>
                        </ul>
                    </div>

                    <!-- Sección 10: Derechos ARCO -->
                    <div class="seccion-card" id="derechos">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-person-check-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 10</span>
                                <h2>Derechos del Usuario (ARCO)</h2>
                            </div>
                        </div>
                        <p>Conforme a la Ley N.º 29733, tienes los siguientes derechos:</p>
                        
                        <h3><i class="bi bi-eye-fill"></i> Acceso</h3>
                        <p>Solicitar información sobre tus datos personales que tratamos, incluyendo finalidad, terceros y origen.</p>
                        
                        <h3><i class="bi bi-pencil-fill"></i> Rectificación</h3>
                        <p>Solicitar la corrección de datos inexactos, incompletos o desactualizados.</p>
                        
                        <h3><i class="bi bi-trash-fill"></i> Cancelación</h3>
                        <p>Solicitar la eliminación de tus datos cuando ya no sean necesarios o retires el consentimiento.</p>
                        
                        <h3><i class="bi bi-x-circle-fill"></i> Oposición</h3>
                        <p>Oponerte al tratamiento cuando se base en interés legítimo o marketing directo.</p>

                        <div class="destacado-box">
                            <i class="bi bi-envelope-paper-fill"></i>
                            <strong>Para ejercer tus derechos:</strong> Envía un correo a 
                            <strong>privacidad@carwari.pe</strong> con tu documento de identidad. 
                            Responderemos en 15 días hábiles.
                        </div>
                    </div>

                    <!-- Sección 11: Cookies -->
                    <div class="seccion-card" id="cookies">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-cookie"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 11</span>
                                <h2>Uso de Cookies</h2>
                            </div>
                        </div>
                        <ul>
                            <li><strong>Esenciales:</strong> Funcionamiento del sitio (no requieren consentimiento)</li>
                            <li><strong>Rendimiento:</strong> Análisis de uso y medición de tráfico</li>
                            <li><strong>Funcionalidad:</strong> Recordar preferencias (idioma, región)</li>
                            <li><strong>Marketing:</strong> Seguimiento de campañas publicitarias</li>
                        </ul>
                        <p>Puedes gestionar las cookies desde la configuración de tu navegador.</p>
                    </div>

                    <!-- Sección 12: Enlaces -->
                    <div class="seccion-card" id="enlaces">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-link-45deg"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 12</span>
                                <h2>Enlaces a Sitios Externos</h2>
                            </div>
                        </div>
                        <p>
                            Nuestro sitio puede contener enlaces a sitios de terceros. No somos responsables 
                            de sus prácticas de privacidad. Te recomendamos leer sus políticas antes de 
                            proporcionar información personal.
                        </p>
                    </div>

                    <!-- Sección 13: Menores -->
                    <div class="seccion-card" id="menores">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-person-heart"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 13</span>
                                <h2>Protección de Menores</h2>
                            </div>
                        </div>
                        <div class="destacado-box">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            Nuestros servicios están dirigidos a personas <strong>mayores de 18 años</strong>. 
                            No recopilamos intencionalmente información de menores.
                        </div>
                        <p>
                            Si eres menor de 18 años, debes utilizar nuestros servicios a través de un 
                            padre, madre o tutor legal. Si crees que hemos recopilado datos de un menor 
                            sin consentimiento, contáctanos inmediatamente.
                        </p>
                    </div>

                    <!-- Sección 14: Transferencia -->
                    <div class="seccion-card" id="transferencia">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-globe-americas"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 14</span>
                                <h2>Transferencia Internacional</h2>
                            </div>
                        </div>
                        <p>
                            Tus datos se almacenan principalmente en el Perú. En algunos casos podemos 
                            transferir datos al extranjero cuando utilizamos proveedores internacionales 
                            (correo, análisis web, pasarelas de pago), garantizando siempre un nivel 
                            adecuado de protección.
                        </p>
                    </div>

                    <!-- Sección 15: Cambios -->
                    <div class="seccion-card" id="cambios">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 15</span>
                                <h2>Cambios a esta Política</h2>
                            </div>
                        </div>
                        <p>
                            Podemos actualizar esta política periódicamente. Los cambios significativos 
                            serán notificados por correo electrónico o mediante aviso destacado en el sitio. 
                            El uso continuado de nuestros servicios constituye aceptación de la política revisada.
                        </p>
                    </div>

                    <!-- Sección 16: Contacto -->
                    <div class="seccion-card" id="contacto">
                        <div class="seccion-header">
                            <div class="seccion-icono">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <span class="seccion-numero">SECCIÓN 16</span>
                                <h2>Información de Contacto</h2>
                            </div>
                        </div>
                        <div class="info-tabla">
                            <div class="info-tabla-row">
                                <div class="info-tabla-label"><i class="bi bi-building"></i> Empresa</div>
                                <div class="info-tabla-value">Ayacucho Software Enterprise - Car Wari</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label"><i class="bi bi-geo-alt-fill"></i> Dirección</div>
                                <div class="info-tabla-value">Jr. 28 de Julio 125, Ayacucho, Perú</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label"><i class="bi bi-envelope-fill"></i> Correo</div>
                                <div class="info-tabla-value">privacidad@carwari.pe</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label"><i class="bi bi-telephone-fill"></i> Teléfono</div>
                                <div class="info-tabla-value">+51 999 000 000</div>
                            </div>
                            <div class="info-tabla-row">
                                <div class="info-tabla-label"><i class="bi bi-clock-fill"></i> Horario</div>
                                <div class="info-tabla-value">Lunes a Domingo, 6:00 AM - 10:00 PM</div>
                            </div>
                        </div>
                        <div class="destacado-box">
                            <i class="bi bi-info-circle-fill"></i>
                            <strong>Autoridad de control:</strong> Si consideras que tus derechos no han sido 
                            atendidos, puedes reclamar ante la Autoridad Nacional de Protección de Datos 
                            Personales: <strong>www.datospersonales.gob.pe</strong>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         FAQ SECTION
         ============================================ -->
    <section class="faq-section">
        <div class="container">
            <div class="faq-header">
                <div class="badge-faq">
                    <i class="bi bi-question-circle-fill"></i>
                    Preguntas Frecuentes
                </div>
                <h2>¿Tienes <span>dudas</span> sobre privacidad?</h2>
                <p>Resolvemos las preguntas más comunes sobre cómo protegemos tu información</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion accordion-custom" id="faqAccordion">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    <span class="faq-numero">1</span>
                                    ¿Car Wari vende mi información personal a terceros?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <strong>No.</strong> Nunca vendemos ni alquilamos tu información personal a terceros. 
                                    Solo compartimos datos con proveedores de servicios que nos ayudan a operar nuestro 
                                    negocio, y siempre bajo estrictos acuerdos de confidencialidad.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    <span class="faq-numero">2</span>
                                    ¿Cómo puedo eliminar mi cuenta de Car Wari?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Puedes solicitar la eliminación de tu cuenta enviando un correo a 
                                    <strong>privacidad@carwari.pe</strong> con el asunto "Solicitud de Eliminación 
                                    de Cuenta". Procesaremos tu solicitud dentro de los 15 días hábiles establecidos por ley.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    <span class="faq-numero">3</span>
                                    ¿Mis datos de pago están seguros?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <strong>Sí.</strong> Utilizamos pasarelas de pago certificadas que cumplen con los 
                                    estándares de seguridad PCI DSS. No almacenamos datos completos de tarjetas de 
                                    crédito en nuestros servidores.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    <span class="faq-numero">4</span>
                                    ¿Puedo usar Car Wari sin aceptar cookies?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Puedes rechazar las cookies no esenciales, pero las cookies técnicas son necesarias 
                                    para el funcionamiento básico del sitio. Si rechazas todas las cookies, algunas 
                                    funcionalidades pueden no estar disponibles.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    <span class="faq-numero">5</span>
                                    ¿Cómo sé que Car Wari no usará mi correo para spam?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Solo te enviaremos comunicaciones de marketing si has dado tu consentimiento explícito. 
                                    Cada correo incluye un enlace para cancelar la suscripción. Puedes retirar tu 
                                    consentimiento en cualquier momento.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                    <span class="faq-numero">6</span>
                                    ¿Qué hago si creo que mi cuenta ha sido comprometida?
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Contacta inmediatamente a <strong>privacidad@carwari.pe</strong> o llámanos al 
                                    +51 999 000 000. Tomaremos medidas inmediatas para proteger tu cuenta e investigar 
                                    el incidente.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                    <span class="faq-numero">7</span>
                                    ¿Car Wari comparte mi información con otras empresas de turismo?
                                </button>
                            </h2>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    No compartimos tu información con otras empresas de turismo sin tu consentimiento 
                                    explícito. Solo compartimos datos con proveedores necesarios para prestar el servicio 
                                    (como hoteles o restaurantes cuando incluyes esos servicios en tu reserva).
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                    <span class="faq-numero">8</span>
                                    ¿Puedo solicitar una copia de todos mis datos?
                                </button>
                            </h2>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <strong>Sí.</strong> Tienes derecho de acceso a tus datos personales. Envía un correo 
                                    a <strong>privacidad@carwari.pe</strong> con el asunto "Solicitud de Acceso" e incluye 
                                    una copia de tu documento de identidad.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                    <span class="faq-numero">9</span>
                                    ¿Qué sucede con mis datos si Car Wari es vendida?
                                </button>
                            </h2>
                            <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    En caso de una transacción corporativa, tus datos personales serían transferidos como 
                                    parte de los activos del negocio. Sin embargo, el nuevo propietario estaría obligado 
                                    a cumplir con esta Política de Privacidad o notificarte sobre cualquier cambio.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq10">
                                    <span class="faq-numero">10</span>
                                    ¿Cómo puedo oponerme a recibir comunicaciones de marketing?
                                </button>
                            </h2>
                            <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Puedes darte de baja haciendo clic en el enlace "Cancelar suscripción" al final de 
                                    cada correo, o enviando un correo a <strong>privacidad@carwari.pe</strong> con el 
                                    asunto "Cancelar Marketing".
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq11">
                                    <span class="faq-numero">11</span>
                                    ¿Car Wari utiliza IA para tomar decisiones sobre mí?
                                </button>
                            </h2>
                            <div id="faq11" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    No utilizamos decisiones completamente automatizadas que produzcan efectos jurídicos 
                                    o te afecten significativamente. Cualquier decisión importante sobre tu cuenta o 
                                    reservas involucra revisión humana.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq12">
                                    <span class="faq-numero">12</span>
                                    ¿Qué hago si no estoy satisfecho con la respuesta?
                                </button>
                            </h2>
                            <div id="faq12" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Si consideras que tus derechos no han sido atendidos adecuadamente, puedes presentar 
                                    una reclamación ante la Autoridad Nacional de Protección de Datos Personales del Perú: 
                                    <strong>www.datospersonales.gob.pe</strong>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         CONTACTO SECTION
         ============================================ -->
    <section class="contacto-section">
        <div class="container">
            <div class="contacto-content">
                <h2>¿Tienes preguntas sobre tu privacidad?</h2>
                <p>
                    Estamos aquí para ayudarte. Si tienes dudas sobre cómo tratamos tu información 
                    personal, contáctanos a través de cualquiera de estos medios.
                </p>
                <div class="contacto-botones">
                    <a href="https://wa.me/51999000000" class="btn-contacto btn-contacto-whatsapp" target="_blank">
                        <i class="bi bi-whatsapp"></i>
                        WhatsApp
                    </a>
                    <a href="mailto:privacidad@carwari.pe" class="btn-contacto btn-contacto-email">
                        <i class="bi bi-envelope-fill"></i>
                        privacidad@carwari.pe
                    </a>
                    <a href="tel:+51999000000" class="btn-contacto btn-contacto-tel">
                        <i class="bi bi-telephone-fill"></i>
                        +51 999 000 000
                    </a>
                </div>
            </div>
        </div>
    </section>

     <!-- WhatsApp Floating -->
    <a href="https://wa.me/51999000000" class="whatsapp-float" target="_blank" title="Chatea con nosotros">
        <i class="bi bi-whatsapp"></i>
    </a>

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
@endsection