<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">

    <!-- Indicadores -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">

            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1600"
                 class="d-block w-100 hero-image">

            <div class="carousel-caption hero-content">

                <h5>CAR WARI TOURS</h5>

                <h1>Descubre Ayacucho</h1>

                <p>
                    Vive experiencias inolvidables con nuestros tours turísticos,
                    transporte seguro y atención personalizada.
                </p>

                <a href="{{ route('destinations.index') }}"
                   class="btn btn-warning btn-lg">

                    Ver Destinos

                </a>

                <a href="{{ route('register.form') }}"
                   class="btn btn-outline-light btn-lg">

                    Reservar Ahora

                </a>

            </div>

        </div>

        <!-- Slide 2 -->

        <div class="carousel-item">

            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=1600"
                 class="d-block w-100 hero-image">

        </div>

        <!-- Slide 3 -->

        <div class="carousel-item">

            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600"
                 class="d-block w-100 hero-image">

        </div>

    </div>

    <!-- Flechas -->

    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <button class="carousel-control-next"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

</div>