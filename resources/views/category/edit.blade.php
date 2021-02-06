@extends('main')

@section('title', 'Edit post')
@section('content')

<div class="card">
    <div class="card-header">
        Edit category
    </div>

    <div class="card-body">


        <form class="form" method="post" action=" {{ url('/category/update/'.$category->id) }}">
            @csrf

            <div class="form-group">

                <label for="title">New category name</label>
                <input class="form-control" type="text" name="name"
                    value="@if(old('name')) {{ old('name') }} @else {{ $category->name }} @endif">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <input type="submit" class="btn btn-primary" style="width: 200px" name="submit" value="Update">
            <input type="submit" class="btn" name="submit" value="Save as Draft" disabled>
        </form>

    </div>
</div>
@endsection
