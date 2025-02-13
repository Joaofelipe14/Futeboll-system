<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Competições')</title>

    <!-- Incluindo a fonte Roboto do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <!-- Incluindo o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluindo o ícone da bola de futebol -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* Definindo a fonte padrão como Roboto */
        body {
            font-family: 'League Spartan', sans-serif;
            font-family: 'Poppins', sans-serif;

        }

        /* Estilo adicional */
        .navbar {
            background-color: #2c3e50;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 600;
        }

        .navbar-nav .nav-link:hover {
            color: #f39c12 !important;
            cursor: pointer;
        }

        .navbar-brand {
            color: #f39c12 !important;
            font-weight: bold;
        }

        .navbar-toggler-icon {
            background-color: #f39c12;
        }

        .navbar-nav .nav-item {
            margin-left: 15px;
        }

        .navbar-nav .nav-item:last-child {
            margin-left: auto;
        }

        .football-icon {
            font-size: 24px;
            color: white;
        }

        .football-icon:hover {
            color: #f39c12;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('competitions.index') }}">Competitions</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fas fa-futbol football-icon"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo da página -->
    <div class="container py-2">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>Developed by <a href="https://www.linkedin.com/in/joao-felipe14/" target="_blank" class="text-light">João Felipe</a></p>
    </footer>

    <!-- Incluindo o JS do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Inclua o JS do Bootstrap (no final do body ou antes do fechamento do body) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>