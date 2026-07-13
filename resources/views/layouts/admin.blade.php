<!DOCTYPE html>
<html lang="es">
@include('layouts.partials.head')

<body>
    @include('layouts.partials.nav_admin')

    @include('layouts.partials.alerts')

    <main class="container mt-4">
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
