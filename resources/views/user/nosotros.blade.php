@extends('layouts.app')

@section('title', 'Nosotros')

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Conoce la historia de Car Wari - Tu compañero de aventura en Ayacucho. Transporte turístico privado con los más altos estándares.">
    <title>Nosotros | Car Wari - Transporte Turístico Ayacucho</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
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
            --negro: #0A0A0A;
            --negro-suave: #111111;
            --blanco: #FFFFFF;
            --gris-claro: #F3F4F6;
            --gris-oscuro: #2D2D2D;
            --gris-texto: #6B7280;
            --whatsapp: #25D366;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--blanco);
            color: var(--negro);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        a {
            text-decoration: none;
            transition: all 0.3s ease;
        }

        /* ============================================
           COMPONENTES REUTILIZABLES
           ============================================ */
        .btn-amarillo {
            background-color: var(--amarillo);
            color: var(--negro);
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-amarillo:hover {
            background-color: var(--amarillo-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 215, 0, 0.4);
            color: var(--negro);
        }

        .btn-negro {
            background-color: var(--negro);
            color: var(--amarillo);
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn-negro:hover {
            background-color: var(--gris-oscuro);
            color: var(--amarillo);
            transform: translateY(-2px);
        }

        .btn-whatsapp {
            background-color: var(--whatsapp);
            color: var(--blanco);
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn-whatsapp:hover {
            background-color: #20bd5a;
            color: var(--blanco);
            transform: translateY(-2px);
        }

        .section-padding {
            padding: 100px 0;
        }

        .section-title {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 20px;
            color: var(--negro);
        }

        .section-subtitle {
            font-size: 18px;
            color: var(--gris-texto);
            line-height: 1.7;
        }

        /* ============================================
           1. HERO SECTION
           ============================================ */
        .hero-nosotros {
            position: relative;
            min-height: 70vh;
            background: linear-gradient(rgba(10, 10, 10, 0.7), rgba(10, 10, 10, 0.8)), 
                        url('https://images.unsplash.com/photo-1526392060635-9d6019884377?w=1920') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 120px 20px;
        }

        .hero-content h1 {
            font-size: 64px;
            color: var(--blanco);
            margin-bottom: 24px;
            line-height: 1.1;
            font-weight: 800;
        }

        .hero-content h1 span {
            color: var(--amarillo);
        }

        .hero-content p {
            font-size: 20px;
            color: rgba(255, 255, 255, 0.9);
            max-width: 700px;
            margin: 0 auto 40px;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* ============================================
           2. NUESTRA HISTORIA
           ============================================ */
        .historia-section {
            background-color: var(--blanco);
        }

        .timeline {
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-top: 40px;
        }

        .timeline-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 24px;
            background-color: var(--gris-claro);
            border-radius: 16px;
            border-left: 4px solid var(--amarillo);
            transition: all 0.3s ease;
        }

        .timeline-item:hover {
            transform: translateX(10px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .timeline-icon {
            width: 60px;
            height: 60px;
            background-color: var(--amarillo);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
        }

        .timeline-content h4 {
            font-size: 20px;
            margin-bottom: 8px;
            color: var(--negro);
        }

        .timeline-content p {
            color: var(--gris-texto);
            margin: 0;
            font-size: 15px;
        }

        .historia-img {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .historia-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ============================================
           3. MISIÓN, VISIÓN Y VALORES
           ============================================ */
        .mvv-section {
            background-color: var(--gris-claro);
        }

        .mvv-card {
            background-color: var(--blanco);
            border-radius: 16px;
            padding: 40px 30px;
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .mvv-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
        }

        .mvv-icon {
            width: 80px;
            height: 80px;
            background-color: var(--amarillo);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 36px;
            color: var(--negro);
        }

        .mvv-card h3 {
            font-size: 24px;
            margin-bottom: 16px;
            color: var(--negro);
        }

        .mvv-card p {
            color: var(--gris-texto);
            line-height: 1.7;
            margin: 0;
        }

        /* ============================================
           4. ¿POR QUÉ ELEGIRNOS?
           ============================================ */
        .features-list {
            list-style: none;
            padding: 0;
        }

        .features-list li {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px 0;
            border-bottom: 1px solid var(--gris-claro);
            font-size: 18px;
            font-weight: 500;
        }

        .features-list li:last-child {
            border-bottom: none;
        }

        .features-list i {
            width: 50px;
            height: 50px;
            background-color: var(--amarillo);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--negro);
            flex-shrink: 0;
        }

        .feature-img {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .feature-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ============================================
           5. NUESTROS NÚMEROS
           ============================================ */
        .stats-section {
            background-color: var(--amarillo);
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

        .stat-number {
            font-size: 56px;
            font-weight: 800;
            color: var(--negro);
            line-height: 1;
            margin-bottom: 12px;
        }

        .stat-label {
            font-size: 18px;
            color: var(--negro);
            font-weight: 600;
        }

        /* ============================================
           6. NUESTRO COMPROMISO
           ============================================ */
        .compromiso-section {
            background-color: var(--blanco);
        }

        .compromiso-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .compromiso-quote {
            background-color: var(--gris-claro);
            border-left: 6px solid var(--amarillo);
            padding: 40px;
            border-radius: 16px;
            margin-top: 40px;
            font-style: italic;
            font-size: 22px;
            color: var(--negro);
            position: relative;
        }

        .compromiso-quote::before {
            content: '"';
            font-size: 80px;
            color: var(--amarillo);
            position: absolute;
            top: -20px;
            left: 20px;
            opacity: 0.5;
        }

        /* ============================================
           7. CALL TO ACTION
           ============================================ */
        .cta-section {
            background-color: var(--negro);
            padding: 100px 0;
            text-align: center;
        }

        .cta-section h2 {
            font-size: 48px;
            color: var(--blanco);
            margin-bottom: 32px;
        }

        .cta-section p {
            font-size: 20px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
        }

        /* ============================================
           8. FOOTER
           ============================================ */
        .footer {
            background-color: var(--negro);
            color: var(--blanco);
            padding: 60px 0 30px;
            border-top: 1px solid var(--gris-oscuro);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.2fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .logo-icon {
            width: 44px;
            height: 44px;
            background-color: var(--amarillo);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--negro);
            font-size: 20px;
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
        }

        .logo-text span {
            color: var(--amarillo);
        }

        .footer-desc {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            background-color: var(--gris-oscuro);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--blanco);
            transition: all 0.3s;
        }

        .footer-social a:hover {
            background-color: var(--amarillo);
            color: var(--negro);
            transform: translateY(-3px);
        }

        .footer-title {
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
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--amarillo);
        }

        .footer-contact li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 16px;
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-contact i {
            color: var(--amarillo);
            margin-top: 4px;
        }

        .footer-bottom {
            border-top: 1px solid var(--gris-oscuro);
            padding-top: 30px;
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }

        /* ============================================
           RESPONSIVE DESIGN
           ============================================ */
        @media (max-width: 991px) {
            .hero-content h1 {
                font-size: 48px;
            }

            .section-title {
                font-size: 36px;
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
            .hero-content h1 {
                font-size: 36px;
            }

            .hero-content p {
                font-size: 18px;
            }

            .section-title {
                font-size: 32px;
            }

            .timeline-item {
                flex-direction: column;
                text-align: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .cta-section h2 {
                font-size: 36px;
            }
        }

        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease;
        }
    </style>

@section('content')
 <!-- ============================================
         1. HERO SECTION
         ============================================ -->
    <section class="hero-nosotros">
        <div class="hero-content animate-fadeInUp">
            <h1>
                Más que transporte...<br>
                <span>Creamos experiencias</span> inolvidables.
            </h1>
            <p>
                Conectamos personas con los destinos más increíbles de Ayacucho 
                mediante un servicio seguro, cómodo y puntual.
            </p>
            <div class="hero-buttons">
                <a href="#" class="btn-amarillo">
                    <i class="bi bi-calendar-check me-2"></i>Reservar Ahora
                </a>
                <a href="#" class="btn-negro">
                    <i class="bi bi-map me-2"></i>Conocer Destinos
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================
         2. NUESTRA HISTORIA
         ============================================ -->
    <section class="section-padding historia-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="historia-img">
                        <img src="https://images.unsplash.com/photo-1527668752968-14dc70a27c95?w=800" 
                             alt="Turistas disfrutando viaje en Ayacucho">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">Nuestra Historia</h2>
                    <p class="section-subtitle mb-4">
                        Car Wari nació del amor por Ayacucho y la pasión por el turismo. 
                        Somos una empresa especializada en transporte turístico privado, 
                        comprometida con ofrecer experiencias únicas que conecten a nuestros 
                        clientes con la riqueza histórica, cultural y natural de nuestra tierra.
                    </p>
                    <p class="section-subtitle">
                        Combinamos el conocimiento local con estándares internacionales de 
                        servicio, brindando comodidad, seguridad y profesionalismo en cada viaje.
                    </p>

                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="bi bi-flag"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Inicio</h4>
                                <p>Fundamos Car Wari con la visión de revolucionar el transporte turístico en Ayacucho.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Crecimiento</h4>
                                <p>Expandimos nuestra flota y alcanzamos más de 500 clientes satisfechos.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="bi bi-trophy"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Actualidad</h4>
                                <p>Somos referentes del turismo en Ayacucho con calificación de 4.9 estrellas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         3. MISIÓN, VISIÓN Y VALORES
         ============================================ -->
    <section class="section-padding mvv-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Nuestra Esencia</h2>
                <p class="section-subtitle">
                    Los pilares que nos guían en cada aventura
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="mvv-card">
                        <div class="mvv-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h3>Misión</h3>
                        <p>
                            Brindar servicios de transporte turístico privado de excelencia, 
                            superando las expectativas de nuestros clientes mediante un trato 
                            personalizado, seguridad y confort, promoviendo el desarrollo 
                            turístico sostenible de Ayacucho.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mvv-card">
                        <div class="mvv-icon">
                            <i class="bi bi-eye"></i>
                        </div>
                        <h3>Visión</h3>
                        <p>
                            Ser la empresa líder en transporte turístico de Ayacucho, 
                            reconocida por nuestra calidad de servicio, innovación y 
                            compromiso con la satisfacción del cliente, contribuyendo 
                            al posicionamiento de Ayacucho como destino turístico de primer nivel.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mvv-card">
                        <div class="mvv-icon">
                            <i class="bi bi-heart"></i>
                        </div>
                        <h3>Valores</h3>
                        <p>
                            <strong>Compromiso:</strong> Dedicación total a nuestros clientes.<br>
                            <strong>Responsabilidad:</strong> Puntualidad y seguridad.<br>
                            <strong>Honestidad:</strong> Transparencia en todo momento.<br>
                            <strong>Pasión:</strong> Amor por Ayacucho y el turismo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         4. ¿POR QUÉ ELEGIRNOS?
         ============================================ -->
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="section-title">¿Por qué elegir Car Wari?</h2>
                    <p class="section-subtitle mb-5">
                        Nos diferenciamos por nuestro compromiso con la excelencia 
                        y la satisfacción total de nuestros clientes.
                    </p>

                    <ul class="features-list">
                        <li>
                            <i class="bi bi-patch-check-fill"></i>
                            <span>Conductores certificados con años de experiencia</span>
                        </li>
                        <li>
                            <i class="bi bi-car-front-fill"></i>
                            <span>Vehículos modernos, cómodos y equipados</span>
                        </li>
                        <li>
                            <i class="bi bi-shield-check"></i>
                            <span>Viajes 100% seguros con seguro incluido</span>
                        </li>
                        <li>
                            <i class="bi bi-person-heart"></i>
                            <span>Atención personalizada y rutas flexibles</span>
                        </li>
                        <li>
                            <i class="bi bi-clock-history"></i>
                            <span>Puntualidad garantizada en cada servicio</span>
                        </li>
                        <li>
                            <i class="bi bi-cash-coin"></i>
                            <span>Precios transparentes sin cargos ocultos</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="feature-img">
                        <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=800" 
                             alt="SUV turística Car Wari">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         5. NUESTROS NÚMEROS
         ============================================ -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Clientes Felices</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Destinos</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">8+</div>
                    <div class="stat-label">Vehículos</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4.9<i class="bi bi-star-fill" style="font-size: 32px;"></i></div>
                    <div class="stat-label">Calificación</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         6. NUESTRO COMPROMISO
         ============================================ -->
    <section class="section-padding compromiso-section">
        <div class="container">
            <div class="compromiso-content">
                <h2 class="section-title">Nuestro Compromiso</h2>
                <p class="section-subtitle mb-5">
                    Creemos firmemente que el turismo es una herramienta poderosa para 
                    el desarrollo de Ayacucho. Por eso, nos comprometemos no solo a 
                    brindar un servicio excepcional, sino también a promover el turismo 
                    responsable y sostenible.
                </p>

                <div class="compromiso-quote">
                    "Cada viaje es una oportunidad para mostrar la belleza de nuestra tierra, 
                    apoyar a las comunidades locales y crear recuerdos inolvidables. 
                    No solo transportamos personas, compartimos nuestra pasión por Ayacucho."
                </div>

                <div class="mt-5">
                    <a href="#" class="btn-amarillo btn-lg">
                        <i class="bi bi-calendar-plus me-2"></i>Sé Parte de Nuestra Historia
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         7. CALL TO ACTION
         ============================================ -->
    <section class="cta-section">
        <div class="container">
            <h2>¿Listo para descubrir Ayacucho?</h2>
            <p>
                Reserva ahora y vive una experiencia única con los mejores 
                profesionales del transporte turístico.
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="#" class="btn-amarillo btn-lg">
                    <i class="bi bi-calendar-check me-2"></i>Reservar Ahora
                </a>
                <a href="https://wa.me/51999000000" class="btn-whatsapp btn-lg" target="_blank">
                    <i class="bi bi-whatsapp me-2"></i>Escríbenos por WhatsApp
                </a>
            </div>
        </div>
    </section>

    

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Smooth scroll -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
@endsection
