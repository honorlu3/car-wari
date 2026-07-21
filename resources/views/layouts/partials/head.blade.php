<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO --}}
    <title>@yield('title', 'Car Wari | Tours y Transporte Turístico en Ayacucho')</title>

    <meta name="description"
          content="@yield('meta-description', 'Car Wari ofrece tours, transporte turístico, traslados al aeropuerto y taxis interprovinciales en Ayacucho.')">

    <meta name="keywords"
          content="@yield('meta-keywords', 'Ayacucho, turismo, tours, Millpu, Car Wari')">

    <meta name="author"
          content="@yield('meta-author', 'Car Wari')">

    <meta name="robots"
          content="index,follow">

    <link rel="canonical"
          href="@yield('canonical-url', url()->current())">

    {{-- Open Graph --}}
    <meta property="og:type"
          content="@yield('og-type', 'website')">

    <meta property="og:title"
          content="@yield('og-title', 'Car Wari')">

    <meta property="og:description"
          content="@yield('og-description', 'Car Wari Turismo')">

    <meta property="og:image"
          content="@yield('og-image', asset('images/logo-carwari.png'))">

    <meta property="og:url"
          content="@yield('og-url', url()->current())">

    <meta property="og:site_name"
          content="@yield('og-site-name', 'Car Wari')">

    {{-- Twitter --}}
    <meta name="twitter:card"
          content="@yield('twitter-card', 'summary_large_image')">

    <meta name="twitter:title"
          content="@yield('twitter-title', 'Car Wari')">

    <meta name="twitter:description"
          content="@yield('twitter-description', 'Car Wari Turismo')">

    <meta name="twitter:image"
          content="@yield('twitter-image', asset('images/logo-carwari.png'))">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@400;500;600&family=Inter:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    {{-- CSS y JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

</head>