<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orthosum</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@700&display=swap');

        body {
            font-family: 'Manrope', sans-serif;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 1.2s ease-out;
        }
    </style>
</head>

<body class="h-screen bg-gradient-to-br from-indigo-100 via-white to-teal-100 flex items-center justify-center">

    <h1 class="text-5xl sm:text-6xl md:text-7xl font-bold text-indigo-800 fade-in-up drop-shadow-lg">
        Orthosum
    </h1>

</body>

</html>
