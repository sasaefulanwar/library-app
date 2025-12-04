@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-dark">📚 Data Buku</h5>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> Tambah Buku
        </a>
    </div>
    <div class="card-body p-0">
        @if(session('success'))
        <div class="alert alert-success m-3">{{ session('success') }}</div>
        @endif

        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Judul Buku</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td class="ps-4 fw-bold">{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td><span class="badge bg-info text-dark">{{ $book->category->name }}</span></td>
                    <td>
                        @if($book->stock == 0)
                        <span class="badge bg-danger">Habis</span>
                        @else
                        {{ $book->stock }}
                        @endif
                    </td>
                    <td class="text-end pe-4">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-warning me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-3">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection