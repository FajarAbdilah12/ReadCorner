@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard User</h1>

    {{-- Menampilkan pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Daftar Buku Tersedia --}}
   <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Daftar Buku Tersedia</span>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Pinjam Buku</a>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse ($books as $book)
                <div class="col-md-4 mb-4"> {{-- Kolom untuk setiap buku --}}
                    <div class="book-item card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">Penulis: {{ $book->author }}</p>
                            <form action="{{ route('peminjaman.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <button type="submit" class="btn btn-primary">Pinjam Buku</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>Tidak ada buku tersedia saat ini.</p>
            @endforelse
        </div>
    </div>
</div>


    {{-- Riwayat Peminjaman Saya --}}
    <div class="card mb-4">
        <div class="card-header">Riwayat Peminjaman Saya</div>
        <div class="card-body">
            @forelse ($peminjamans as $item)
                <div class="peminjaman-item">
                    <h5>{{ $item->book->title }}</h5>
                    <p>Status: {{ $item->status }}</p>
                    @if($item->status === 'dipinjam')
                        <form action="{{ route('peminjaman.update', $item->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">Kembalikan Buku</button>
                        </form>
                    @else
                        <p>Tanggal Pengembalian: {{ $item->tanggal_pengembalian }}</p>
                    @endif
                </div>
                <hr>
            @empty
                <p>Tidak ada riwayat peminjaman saat ini.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
