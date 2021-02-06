@extends('main-front')
@section('title', 'Imanz Blogs')
@section('content')

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">

            </div>
            <div class="col-4 text-center">

            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                </a>
                <a class="btn btn-sm btn-outline-secondary" href="/post">Sign up</a>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @forelse ($categories as $item)
            <a class="p-2 text-muted" href="#">{{ $item->name }}</a>
            @empty

            @endforelse

        </nav>
    </div>



    <div class="row mb-2">

        @forelse ($posts as $item)


        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250" style="">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">{{ $item->category->name }}</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">{{ $item->title }}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{ $item->created_at->diffForHumans() }}</div>
                    <p class="card-text mb-auto">{{ strip_tags(substr($item->content,0,100)) }}...</p>
                    <a href="/read/{{ $item->slug }}">Continue reading</a>
                </div>

        </div>
    </div>

     @empty

        @endforelse



</div>
</div>
@endsection
