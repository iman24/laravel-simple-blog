@extends('main')
@section('title', 'Manage comment')
{{-- import blade main --}}

@section('content')

 <div class="card">
        <div class="card-header">
          <h3 class="card-title">List all ccomment</h3>

          <div class="card-tools p-0">
         {{ $data->links() }}
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-hover table-valign-middle">
              <thead>
                  <tr>
                      <th>ID#</th>
                      <th>Name</th>
                      <th>Post</th>
                      <th>Time</th>
                      <th>Action</th>
                  </tr>
              </thead>

              <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->post->title }}</td>
                            <td>{{ $item->created_at->diffForHumans() }} </td>
                            <td>
                                <a class="btn btn-success" href="/read/{{ $item->post->slug }}#comment">Show comment</a>
                                <a onclick="return confirm('Hapus komen ini?')" class="ml-2 btn btn-danger" href="/comment/destroy/{{ $item->id }}">Delete</a>
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
