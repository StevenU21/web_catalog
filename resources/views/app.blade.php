<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/x-icon" href="/favicon.ico?v={{ file_exists(public_path('favicon.ico')) ? filemtime(public_path('favicon.ico')) : 1 }}">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v={{ file_exists(public_path('favicon.ico')) ? filemtime(public_path('favicon.ico')) : 1 }}">

        <!-- SEO Basics -->
        <meta name="description" content="Jolismar Store - Catálogo de productos originales de skincare, maquillaje y perfumería. Envío a toda Nicaragua desde Estelí.">
        <meta name="keywords" content="skincare, maquillaje, perfumes, Jolismar Store, cosméticos originales, The Ordinary, Cerave, Nicaragua, Estelí">
        <meta name="author" content="Jolismar Store">
        <meta name="robots" content="index, follow">

        <!-- Open Graph / Meta, Instagram, TikTok & WhatsApp Previews -->
        <meta property="og:type" content="website">
        <meta property="og:locale" content="es_NI">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="Jolismar Store | Elegancia en cada gota">
        <meta property="og:description" content="Descubre productos para cuidar tu piel y expresar tu estilo. Catálogo oficial de Jolismar Store con recomendaciones personalizadas.">
        <meta property="og:image" content="{{ asset('hero/02.avif') }}">
        <meta property="og:image:alt" content="Catálogo Jolismar Store">
        <meta property="og:site_name" content="Jolismar Store">

        <!-- Structured Data (Schema.org / Google Knowledge Graph) -->
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "Store",
            "name": "Jolismar Store",
            "description": "Catálogo de productos originales de skincare, maquillaje y perfumería con envíos a toda Nicaragua.",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('img/logo.png') }}",
            "image": "{{ asset('hero/02.avif') }}",
            "telephone": "+50588438783",
            "address": {
                "@@type": "PostalAddress",
                "addressLocality": "Estelí",
                "addressCountry": "NI"
            },
            "sameAs": [
                "https://www.instagram.com/jolismar_store/",
                "https://www.tiktok.com/@jolismar_store",
                "https://www.facebook.com/JolismarStore/",
                "https://wa.me/c/50588438783"
            ]
        }
        </script>

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        <x-inertia::head>
            <title>{{ config('app.name', 'Laravel') }}</title>
        </x-inertia::head>
    </head>
    <body class="font-sans antialiased">
        <x-inertia::app />
    </body>
</html>
