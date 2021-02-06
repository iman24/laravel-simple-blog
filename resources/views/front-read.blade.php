@extends('main-front')
@section('title', $data->title)
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
                <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-start">
            @forelse ($categories as $item)
            <a class="p-2 text-muted" href="#">{{ $item->name }}</a>
            @empty

            @endforelse

        </nav>
    </div>


<main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">


          <div class="blog-post">
          <h2 class="blog-post-title">{{$data->title}}</h2>
            <p class="blog-post-meta">{{ $data->created_at->diffForHumans() }}</p>

            <p style="text-align: justify"> {!! $data->content !!}</p>
          </div><!-- /.blog-post -->

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

           <h4 id="comment" class="font-italic border-bottom pb-3 mt-5">Comments</h4>

           @forelse ($comments as $item)
           <div class="card">
               <div class="card-body">
                   <div class="d-flex justify-content-between">
                       <b>{{ $item ->name }}</b>
                       <span>
                           {{ $item->created_at->diffForHumans() }}</span>
                        </div>
                       <p>{{ $item->content }}</p>
                   </div>
               </div>
           @empty
                <h5>Tidak ada komentar untuk post {{ $data->title }} jadilah yang pertama</h5>
           @endforelse

           <form method="post" action="/comment/store/{{ $data->id }}" class="form mt-5 mb-5">
            @csrf
               <div class="form-group">
                   <label for="name">Name</label>
                   <input style="width: 50%" type="text" name="name" class="form-control">
               </div>

                <div class="form-group">
                   <label for="name">Email</label>
                   <input style="width: 50%" type="email" name="email" class="form-control">
               </div>

                <div class="form-group">
                   <label for="name">URL</label>
                   <input style="width: 50%" type="text" name="url" class="form-control">
               </div>

               <div class="form-group">
                   <label for="content">Content</label>
                   <textarea name="content" id="" style="width: 75%" rows="5" class="form-control"></textarea>
               </div>

               <input type="submit" class="btn btn-primary" value="Post Comment">
           </form>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Hello My name is iman</p>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main>
</div>
@endsection
