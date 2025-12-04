<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">📚 Sistem Manajemen Perpustakaan</h2>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4>Daftar Peminjaman</h4>
                    <a href="{{ route('borrowings.create') }}" class="btn btn-primary">+ Pinjam Baru</a>
                </div>

                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Jatuh Tempo</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowings as $item)
                        <tr>
                            <td>{{ $item->member->name }}</td>
                            <td>{{ $item->book->title }}</td>
                            <td>{{ $item->borrow_date }}</td>
                            <td>{{ $item->due_date }}</td>
                            <td>
                                @if($item->returned_at)
                                <span class="badge bg-success">Dikembalikan</span>
                                @elseif(\Carbon\Carbon::now() > $item->due_date)
                                <span class="badge bg-danger">Terlambat (Denda)</span>
                                @else
                                <span class="badge bg-warning text-dark">Dipinjam</span>
                                @endif
                            </td>
                            <td>
                                @if(!$item->returned_at)
                                <form action="{{ route('borrowings.return', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-success">✅ Kembalikan</button>
                                </form>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>