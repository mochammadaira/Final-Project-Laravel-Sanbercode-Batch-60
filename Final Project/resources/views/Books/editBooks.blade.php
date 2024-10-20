@extends('layout.master')
@section('judul')
    Edit Books
@endsection

@section('content')
<form action="/books/{{$books->id}}" method="POST" enctype="multipart/form-data">
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
    <label>Title</label>
    <input type="text" class="form-control" name="title" value="{{$books->title}}" placeholder="Enter Books Title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Summary</label>
    <textarea type="text" name="summary" class="form-control" col="20" row="20" placeholder="Books Summary">{{$books->summary}}</textarea>
  </div>
  <div class="form-group">
    <label for="formFileSm" class="form-label">Image</label>
    <input class="form-control form-control-sm" name="image" id="formFileSm" type="file">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Stock</label>
    <input type="text" name="stock" class="form-control"  placeholder="Books Stock"></input>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control" id="">
        @forelse ($categories as $item)
            @if($item->id === $books->category_id)
                <option value="{{$item->id}}" selected>{{$item->name}}</option>
            @else
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endif
            
        @empty
            <option value="">Category is Empty</option>
        @endforelse
    </select>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection