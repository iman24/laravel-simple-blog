@extends('main')

@section('title', 'Add post')
@section('content')

<div class="card">
    <div class="card-header">
        Add Post
    </div>

    <div class="card-body">


<form class="form" method="post" action=" {{ url('/category/store') }}">
    @csrf

    <div class="form-group">

        <label for="name">Nama Kategory</label>
        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>



    <input type="submit" class="btn btn-primary" style="width: 200px" name="submit" value="Create category">

</form>

  </div>
</div>
@endsection
