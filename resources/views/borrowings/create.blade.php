<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pinjam Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm border-0 w-50 mx-auto">
            <div class="card-body">
                <h4 class="mb-3">Form Peminjaman Buku</h4>

                <form action="{{ route('borrowings.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Anggota</label>
                        <select name="member_id" class="form-select">
                            @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pilih Buku</label>
                        <select name="book_id" class="form-select">
                            @foreach($books as $book)
                            <option value="{{ $book->id }}">
                                {{ $book->title }} (Sisa Stok: {{ $book->stock }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan Peminjaman</button>
                    <a href="{{ route('borrowings.index') }}" class="btn btn-link w-100 text-decoration-none mt-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>