<x-admin-master>
    @section('content')

    <h1>All Comments</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Comments Table</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="commentTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  {{-- <th>Id</th> --}}
                  <th>Post Id</th>
                  <th>Is Active</th>
                  <th>Author</th>
                  <th>Email</th>
                  <th>Body</th>
                  {{-- <th>Created At</th> --}}
                  <th>Replies</th>
                  <th>Active</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    {{-- <th>Id</th> --}}
                    <th>Post Id</th>
                    <th>Is Active</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    {{-- <th>Created At</th> --}}
                    <th>Replies</th>
                    <th>Active</th>
                    <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>

                  @foreach($comments as $comment)
                  <tr>
                        {{-- <td>{{$comment->id}}</td> --}}
                        <td> <a href="{{route('post', $comment->post->id)}}">{{$comment->post->id}}</a></td>
                        {{-- <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td> --}}
                        <td>{{$comment->is_active}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->body}}</td>
                        <td><a href="{{route('comment.replies.show', $comment->id)}}">View Replies</a></td>
                        {{-- <td>{{$comment->created_at}}</td> --}}

                        <td>
                            @if($comment->is_active == 1)

                                <form method="post" action="{{route('comment.update', $comment->id)}}">
                                    @csrf
                                    @method('PATCH')
                                
                                    <input type="hidden" name="is_active" value="0">

                                    <button class="btn btn-info" type="submit">Make Inactive</button>
                                </form>  
                                
                                @else

                                <form method="post" action="{{route('comment.update', $comment->id)}}">
                                    @csrf
                                    @method('PATCH')
                                
                                    <input type="hidden" name="is_active" value="1">

                                    <button class="btn btn-success" type="submit">Make Active</button>
                                </form>

                            @endif
                        </td>    

                        <td>

                            

                            <form method="post" action="{{route('comment.destroy', $comment->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            

                        </td>
                  </tr>
                  @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="d-flex">
        <div class="mx-auto">
            {{$comments->links('pagination::bootstrap-4')}}
        </div>
    </div>

    @endsection

    @section('scripts')

        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    @endsection
</x-admin-master>