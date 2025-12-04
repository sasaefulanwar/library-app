@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-plus-circle me-2"></i>Buat Peminjaman Baru</h5>
            </div>
            <div class="card-body p-4">

                <form action="{{ route('borrowings.store') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <select name="member_id" class="form-select" id="floatingMember">
                            <option value="" selected disabled>Pilih Nama Anggota</option>
                            @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingMember">Nama Peminjam</label>
                    </div>

                    <div class="form-floating mb-4">
                        <select name="book_id" class="form-select" id="floatingBook">
                            <option value="" selected disabled>Pilih Buku</option>
                            @foreach($books as $book)
                            <option value="{{ $book->id }}" {{ $book->stock < 1 ? 'disabled' : '' }}>
                                {{ $book->title }} (Sisa: {{ $book->stock }})
                            </option>
                            @endforeach
                        </select>
                        <label for="floatingBook">Judul Buku</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>Simpan Data
                        </button>
                        <a href="{{ route('borrowings.index') }}" class="btn btn-light text-muted">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection