<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BumbuMasak - Ecommerce Bumbu Dapur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .notification-enter {
            transform: translateX(100%);
        }

        .notification-enter-active {
            transform: translateX(0);
            transition: transform 300ms ease-out;
        }

        .notification-exit {
            transform: translateX(0);
        }

        .notification-exit-active {
            transform: translateX(100%);
            transition: transform 300ms ease-in;
        }

        .quick-btn {
            @apply bg-green-100 text-green-800 px-3 py-1 rounded-lg text-sm hover:bg-green-200 transition-colors;
        }

        @media (max-width: 640px) {
            #chatbot-container {
                bottom: 1rem;
                right: 1rem;
            }

            #chat-window {
                width: 90vw;
                height: 60vh;
                max-height: 400px;
            }
        }

        .sticky {
            position: -webkit-sticky;
            position: sticky;
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }
    </style>
</head>

<body class="bg-gray-50">
    @include('user.partials.navbar')
    <main>
        @yield('content')
    </main>

    @include('user.partials.footer')

    @include('user.partials.chatbot')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>
