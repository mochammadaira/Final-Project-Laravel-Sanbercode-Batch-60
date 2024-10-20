@extends('layout.master')
@section('judul')
    Tampilan Category
@endsection

@section('content')
    <a href="/category/create" class="btn btn-primary btn-sm">Tambah</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name of category</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $key => $item)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$item->name}}</td>
      <td>
          <form action="/category/{{$item->id}}" method="POST">
              @csrf
              @method("delete")
              <a href="/category/{{$item->id}}" class="btn btn-sm btn-info">Detail</a>
              <a href="/category/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
              <input type="submit" class="btn btn-sm btn-danger" value="Delete">
        </form>
      </td>
    </tr>
    @empty
    <p>No Category</p>
    @endforelse
  </tbody>
</table>
@endsection