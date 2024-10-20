@extends('layout.master')

@section('judul')
    Detail Category
@endsection

@section('content')

    <h1>Ini Category {{$categories->name}}</h1>
    <h4 class="mt-5">Books List</h4>
    <div class="row">
    @forelse ($categories->listBooks as $item)
    <div class="col-4 mb-4"> <!-- Menggunakan mb-4 untuk memberi margin bottom -->
                <div class="card">
                    <img src="{{ asset('uploads/' . $item->image) }}" weight="200px" height="400px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2>{{ $item->title }}</h2>
                        <h5>Stock = {{$item->stock}}</h5>
                        <p class="card-text">{{ Str::limit($item->summary, 50, '. . .') }}</p>
                        <a href="/books/{{ $item->id }}" class="btn btn-primary btn-block btn-sm">Read More</a>
                    </div>
                </div>
            </div>
    @empty
        <h5>Tidak ada buku di category ini</h5>
    @endforelse
    </div>  
    <a href="/category" class="btn btn-secondary btn-sm my-2">Kembali</a>
@endsection
