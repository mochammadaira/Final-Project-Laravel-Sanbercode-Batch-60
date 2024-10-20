@extends('layout.master')
@section('judul')
    Edit Category
@endsection

@section('content')
<form action="/category/{{$categories->id}}" method="POST">
    @method('put')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $errors)
                <li>{{ $errors }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
  <div class="form-group">
    <label>Nama Categoty</label>
    <input type="text" class="form-control" name="name" value="{{$categories->nama}}" placeholder="Enter Nama Category">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection