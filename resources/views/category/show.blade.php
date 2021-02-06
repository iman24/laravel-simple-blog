{{-- import blade main --}}
@extends('main')
@section('title', 'show category')

{{-- section untuk menimpa yield content --}}
@section('content')

 <div class="card">
        <div class="card-header">
          <h3 class="card-title">List all category under</h3>

          <div class="card-tools">

          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-hover table-valign-middle">
              <thead>
                  <tr>
                      <th>ID#</th>
                      <th>Name</th>
                      <th>Published</th>
                      <th>Action</th>
                  </tr>
              </thead>

              <tbody>
                    @forelse ($posts as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->created_at->diffForHumans() }} </td>
                            <td>
                                <a class="btn btn-primary" href="/post/edit/{{ $item->id }}">Edit</a><a onclick="return confirm('Post akan dihapus?')" class="ml-2 btn btn-danger" href="/post/destroy/{{ $item->id }}">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <p>
                            Tidak ada post untuk ditampilkan
                        </p>
                @endforelse
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>



@endsection
