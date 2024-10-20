@extends('layout.master')
@section('judul')
     Display Books 
@endsection

@section('content')
@auth
<a href="/books/create" class="btn btn-primary btn-sm">Tambah</a>
@endauth

    <div class="row mt-4">
        @forelse ($books as $item)
            <div class="col-4 mb-4"> <!-- Menggunakan mb-4 untuk memberi margin bottom -->
                <div class="card">
                    <img src="{{ asset('uploads/' . $item->image) }}" weight="200px" height="400px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2>{{ $item->title }}</h2>
                        <span class="badge badge-success">{{$item->categories->name}}</span>
                        <h5>Stock = {{$item->stock}}</h5>
                        <p class="card-text">{{ Str::limit($item->summary, 50, '. . .') }}</p>
                        <a href="/books/{{ $item->id }}" class="btn btn-primary btn-block btn-sm">Read More</a>
                        @auth
                        <div class="row my-2 ">
                            <div class="col">
                                <a href="/books/{{ $item->id }}/edit" class="btn btn-warning btn-block btn-sm">Edit</a>
                            </div>
                            <div class="col">
                                <form action="/books/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-block btn-sm btn-danger" value="Delete">
                                </form>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <h2>Tidak ada Postingan</h2>
            </div>
        @endforelse
    </div>
@endsection