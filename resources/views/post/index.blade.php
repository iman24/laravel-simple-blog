{{-- import blade main --}}
@extends('main')
@section('title', 'List post')

{{-- section untuk menimpa yield content --}}
@section('content')

<div class="card">
        <div class="card-header">
          <h3 class="card-title">List all post</h3>

          <div class="card-tools">
         {{ $data->links() }}
          </div>
        </div>

        <div class="card-body p-0">
          <table class="table table-hover table-valign-middle">
              <thead>
                  <tr>
                      <th>ID#</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Published</th>
                      <th>Action</th>
                  </tr>
              </thead>

              <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->created_at->diffForHumans() }} </td>
                            <td>
                                <a href="/read/{{ $item->slug }}" class="btn btn-success">View</a>
                                <a href="/post/edit/{{ $item->id }}" class="btn btn-primary">Edit</a>
                                <a onClick="return confirm('Yakin hapus?')" href="/post/destroy/{{ $item->id }}" class="ml-2 btn btn-danger">Delete</a>
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
    </div>




@endsection
