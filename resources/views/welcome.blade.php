<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Reciclaje</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Custom Config -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            600: '#22c55e',
                            900: '#14532d',
                        },
                        dark: {
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts + FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS CDN -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    @vite(['resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">

<!-- Navbar -->
<div id="navbar">
    <navbar></navbar>
</div>

<!-- Hero -->
<div id="hero">
    <hero></hero>
</div>
<div id="ventas">
    <ventas></ventas>
</div>
<div id="proyecto">
    <proyecto></proyecto>
</div>

<div id="productos">
    <productos></productos>
</div>
<div id="calculadora">
    <calculadora-impacto></calculadora-impacto>
</div>

<div id="contacto">
    <contacto></contacto>
</div>
<div id="footer">
    <footer-component></footer-component>
</div>

<button
    onclick="scrollToTop()"
    class="fixed bottom-6 left-6 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg z-50 transition-all"
    title="Volver al inicio"
>
    <i class="fas fa-arrow-up"></i>
</button>

<!-- AOS Init -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 300,
        easing: 'ease-in-out',
        once: true
    });

    function scrollToTop() {
        const duration = 1500;
        const start = window.pageYOffset;
        const startTime = performance.now();

        function scrollStep(timestamp) {
            const elapsed = timestamp - startTime;
            const progress = Math.min(elapsed / duration, 1);
            window.scrollTo(0, start * (1 - easeInOutCubic(progress)));

            if (progress < 1) {
                window.requestAnimationFrame(scrollStep);
            }
        }

        function easeInOutCubic(t) {
            return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
        }

        window.requestAnimationFrame(scrollStep);
    }
</script>

</body>
</html>
