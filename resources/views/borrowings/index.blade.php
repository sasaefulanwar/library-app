@extends('layouts.app')

@section('content')

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white h-100 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="display-4 me-3"><i class="fas fa-book"></i></div>
                <div>
                    <h5 class="card-title mb-0">Total Buku</h5>
                    <h2 class="fw-bold mb-0">{{ $total_books }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white h-100 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="display-4 me-3"><i class="fas fa-users"></i></div>
                <div>
                    <h5 class="card-title mb-0">Anggota Aktif</h5>
                    <h2 class="fw-bold mb-0">{{ $total_members }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning text-dark h-100 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="display-4 me-3"><i class="fas fa-clock"></i></div>
                <div>
                    <h5 class="card-title mb-0">Sedang Dipinjam</h5>
                    <h2 class="fw-bold mb-0">{{ $active_borrowings }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-dark">📜 Riwayat Peminjaman</h5>
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> Pinjam Baru
        </a>
    </div>

    <div class="card-body p-0">

        @if(session('success'))
        <div class="alert alert-success m-3 alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger m-3 alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Peminjam</th>
                        <th>Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tenggat</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrowings as $item)
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold text-dark">{{ $item->member->name }}</div>
                            <small class="text-muted">{{ $item->member->email }}</small>
                        </td>
                        <td>
                            <span class="text-primary fw-medium">{{ $item->book->title }}</span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($item->borrow_date)->format('d M Y') }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($item->due_date)->format('d M Y') }}
                        </td>
                        <td>
                            @if($item->returned_at)
                            <span class="badge bg-success bg-opacity-25 text-success px-3 py-2 rounded-pill">
                                <i class="fas fa-check me-1"></i> Selesai
                            </span>
                            @elseif(\Carbon\Carbon::now() > $item->due_date)
                            <span class="badge bg-danger px-3 py-2 rounded-pill">
                                <i class="fas fa-exclamation-triangle me-1"></i> Telat
                            </span>
                            @else
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-spinner me-1"></i> Dipinjam
                            </span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            @if(!$item->returned_at)
                            <form action="{{ route('borrowings.return', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-outline-primary" onclick="return confirm('Yakin buku ini sudah kembali?')">
                                    <i class="fas fa-undo"></i> Return
                                </button>
                            </form>
                            @else
                            <span class="text-muted small"><i class="fas fa-history"></i> {{ \Carbon\Carbon::parse($item->returned_at)->format('d/m') }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection