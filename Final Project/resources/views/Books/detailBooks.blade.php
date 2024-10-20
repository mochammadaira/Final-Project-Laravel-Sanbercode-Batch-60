@extends('layout.master')
@section('judul')
    Books Detail
@endsection

@section('content')

    <div class="card">
        <img src="{{asset('uploads/' .  $books->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h2>{{$books->title}}</h2>
            <h3>Ready Stock : {{$books->stock}}</h3>
            <p class="card-text">{{ $books->summary }}</p>

            <hr>
            <h3>List Peminjaman</h3>
            @forelse ($books->listPeminjaman as $item)
            <div class="card mt-5">
                <div class="card-header font-weight-bold">
                    {{$item->createBy->name}}
                </div>
                <div class="card-body">
                    <p class="card-text">Tanggal Peminjaman : {{$item->tanggal_peminjaman}}</p>
                    <p class="card-text">Tanggal Peminjaman : {{$item->tanggal_pengembalian}}</p>
                </div>
            </div>
            @empty
                <h4>Belum ada data peminjaman</h4>
            @endforelse
            <hr>
            @auth
            <form action="/borrows/{{$books->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <h4 class="text-info">Tanggal Peminjaman</h4>
                    <h5>Masukkan tanggal peminjaman</h5>
                    <input type="date" name="tanggal_peminjaman" class="form-control"  placeholder="Peminjaman"></input>
                </div>
                <div class="form-group">
                    <h4 class="text-info">Tanggal Pengembalian</h4>
                    <h5>Masukkan tanggal pengembalian</h5>
                    <input type="date" name="tanggal_pengembalian" class="form-control"  placeholder="Pengembalian"></input>
                </div>
                <input type="submit" value="Kirim" class="btn btn-primary btn-sm btn-block">
            </form>
            @endauth


            <a href="/books" class="btn btn-secondary btn-block btn-sm mt-4">Kembali</a>
        </div>
    </div>


@endsection