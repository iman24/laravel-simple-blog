@extends('main')

@section('title', 'Add post')
@section('content')

<div class="card">
    <div class="card-header">
        Add Post
    </div>

    <div class="card-body">


        <form class="form" method="post" action=" {{ url('/post/store') }}">
            @csrf

            <div class="form-group">

                <label for="title">Judul Post</label>
                <input class="form-control" type="text" name="title" value="{{ old('title') }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{ old('content')}}</textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category"></label>
                <select class="form-control" name="category_id" id="">
                    <option value="">Pilih category</option>
                    @forelse ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @empty

                    @endforelse
                </select>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" style="width: 200px" name="submit" value="Post">
            <input type="submit" class="btn btn-secondary" name="submit" value="Save as Draft" disabled>
        </form>

    </div>
</div>
@endsection

@section('custom_script')
<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
<script>


    CKEDITOR.replace('content', {
      height: 260,

    });
</script>
@endsection
