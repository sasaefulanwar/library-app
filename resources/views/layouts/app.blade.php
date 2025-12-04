<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLibrary - Sistem Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
            /* Warna abu-abu muda lembut */
        }

        .navbar {
            background: #ffffff;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .btn {
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm py-3 mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('borrowings.index') }}">
                <i class="fas fa-book-open me-2"></i>MyLibrary
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('borrowings*') ? 'active fw-bold' : '' }}" href="{{ route('borrowings.index') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('books*') ? 'active fw-bold' : '' }}" href="{{ route('books.index') }}">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('members*') ? 'active fw-bold' : '' }}" href="{{ route('members.index') }}">Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white ms-2 px-4" href="{{ route('borrowings.create') }}">+ Pinjam Baru</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>