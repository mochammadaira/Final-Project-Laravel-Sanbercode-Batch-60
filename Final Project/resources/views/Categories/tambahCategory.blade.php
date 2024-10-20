@extends('layout.master')
@section('judul')
    Create Categories
@endsection

@section('content')
<form action="/category" method="POST">
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
    <label>Name Categories</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name Categories">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection