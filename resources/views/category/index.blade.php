{{-- import blade main --}}
@extends('main')
@section('title', 'List category')

{{-- section untuk menimpa yield content --}}
@section('content')

 <div class="card">
        <div class="card-header">
          <h3 class="card-title">List all category</h3>

          <div class="card-tools p-0">
           <a href="/category/create" class="btn btn-sm m-0 btn-primary ">Create category</a>{{ $data->links() }}
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-hover table-valign-middle">
              <thead>
                  <tr>
                      <th>ID#</th>
                      <th>Name</th>
                      <th>Post</th>
                      <th>Published</th>
                      <th>Action</th>
                  </tr>
              </thead>

              <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->post->count() }}</td>
                            <td>{{ $item->created_at->diffForHumans() }} </td>
                            <td>
                                <a class="btn btn-success" href="/category/show/{{ $item->id }}">Show post</a>
                                <a class="btn ml-2 btn-primary" href="/category/edit/{{ $item->id }}">Edit</a><a onclick="return confirm('Semua post yang berda di kategory ini akan ikut dihapus?')" class="ml-2 btn btn-danger" href="/category/destroy/{{ $item->id }}">Delete</a>
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
