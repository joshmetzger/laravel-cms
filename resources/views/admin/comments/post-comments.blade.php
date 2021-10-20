<x-admin-master>
    @section('content')

        {{-- <h1>Comments for Post Number: {{$post->id}}</h1> --}}

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Comments Table</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="commentForPostTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      {{-- <th>Id</th> --}}
                      <th>Post Id</th>
                      <th>Is Active</th>
                      <th>Author</th>
                      <th>Email</th>
                      <th>Body</th>
                      {{-- <th>Created At</th> --}}
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
                        <th>Active</th>
                        <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
    
                      @foreach($comments as $comment)
                      <tr>
                            {{-- <td>{{$comment->id}}</td> --}}
                            <td>{{$comment->post_id}}</td>
                            {{-- <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td> --}}
                            <td>{{$comment->is_active}}</td>
                            <td>{{$comment->author}}</td>
                            <td>{{$comment->email}}</td>
                            <td>{{$comment->body}}</td>
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

    @endsection
</x-admin-master>