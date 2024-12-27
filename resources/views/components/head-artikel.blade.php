<head>
    <title>{{ $artikel->judul }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{!! Str::limit(strip_tags(preg_replace('/<figure.*?<\/figure>/s', '', $artikel->isi ?? '')), 40) !!}">
    @if (!empty($artikel->tag) && is_array($artikel->tag))
        @foreach ($artikel->tag as $tag)
    <meta name="keywords" content="{{ $tag }}">
        @endforeach
    @else
    <meta name="keywords" content="Jaringan, Komputer, Internet">
    @endif
    <meta name="author" content="AQT Network">
    <meta name="copyright" content="AQT Network">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="{{ $artikel->judul }}">
    <meta name="og:description" content="{!! Str::limit(strip_tags(preg_replace('/<figure.*?<\/figure>/s', '', $artikel->isi ?? '')), 40) !!}">
    <meta property="og:image" content="{{ asset('storage/' . $artikel->banner) }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}">

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
