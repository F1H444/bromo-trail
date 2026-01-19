<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bromotrail | Premium Trail Bike Rental</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Outfit', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
    @endif

    <style>
        [v-cloak] {
            display: none;
        }

        .bike-card:hover img {
            transform: scale(1.05);
        }

        section {
            overflow: hidden;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-[#FAFAFA] text-zinc-900 font-sans selection:bg-zinc-900 selection:text-white antialiased">

    @include('beranda.navbar')

    <main>
        @yield('content')
    </main>

    @include('beranda.footer')

    <!-- Animations Integration -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // Navbar scroll effect
            const navbar = document.getElementById('navbar');
            if (navbar) {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 50) {
                        navbar.classList.add('py-2', 'shadow-sm');
                        navbar.classList.remove('py-4');
                    } else {
                        navbar.classList.remove('py-2', 'shadow-sm');
                        navbar.classList.add('py-4');
                    }
                });
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
