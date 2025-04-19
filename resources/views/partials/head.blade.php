<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? 'Personal Portfolio' }}</title>

<!-- Add x-cloak style for Alpine.js -->
<style>
    [x-cloak] { display: none !important; }
</style>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Just+Another+Hand&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- Enhanced Typing Effect Library -->

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
