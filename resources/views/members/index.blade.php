@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-dark">👥 Data Anggota</h5>
        <a href="{{ route('members.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> Tambah Anggota
        </a>
    </div>
    <div class="card-body p-0">
        @if(session('success'))
        <div class="alert alert-success m-3">{{ session('success') }}</div>
        @endif

        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Nama Lengkap</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td class="ps-4 fw-bold">{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone }}</td>
                    <td class="text-end pe-4">
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-outline-warning me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus anggota ini?')">
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
            {{ $members->links() }}
        </div>
    </div>
</div>
@endsection