<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App Pegawai')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        main {
            flex: 1; /* ini yang bikin footer selalu di bawah */
            padding: 30px;
        }

        footer {
            background-color: #212529;
            color: #adb5bd;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
        }

        .navbar-brand {
            font-weight: 600;
            color: #0d6efd !important;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">App Pegawai</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-3">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/employees') }}">Employee</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/departments') }}">Department</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/attendances') }}">Attendance</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/positions') }}">Position</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/salaries') }}">Salary</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="container">
        <h1 class="my-4">@yield('page-title', 'App Pegawai')</h1>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; {{ date('Y') }} App Pegawai</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
