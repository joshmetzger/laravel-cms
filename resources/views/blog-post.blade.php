<x-home-master>

    @section('content')

    @if(Session::has('comment-created-message'))

            <div class="alert alert-success">{{Session::get('comment-created-message')}}</div>

            @elseif(Session::has('post-created-message'))

            <div class="alert alert-success">{{Session::get('reply-created-message')}}</div>

            {{-- @elseif(Session::has('post-updated-message'))

            <div class="alert alert-success">{{Session::get('post-updated-message')}}</div> --}}

    @endif

        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{$post->post_image}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>
        
        <hr>


        @if(auth()->user())

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">

              <form method="post" action="{{route('comment.store')}}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="post_id" value="{{$post->id}}">
                <input type="hidden" name="author" value="{{$post->user->name}}">
                <input type="hidden" name="email" value="{{$post->user->email}}">

                <div class="form-group">
                  <textarea name="body" id="body" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

            </div>
          </div>

        @endif

        @if(count($comments) > 0)
        @foreach($comments as $comment)
        
            <!-- Single Comment -->
            <div class="media mb-4">
              <img class="d-flex mr-3 img-profile rounded-circle" style="height: 46px;" src="{{$comment->post->user->avatar}}" alt="">
              <div class="media-body">
                <h5 class="mt-0">{{$comment->author}}
                  <small>{{$comment->created_at->diffForHumans()}}</small></h5>   
                <p>{{$comment->body}}</p>
                
                {{-- @if(count($replies) > 0)
                @foreach($replies as $reply) --}}

                <!--  Reply -->
                <div class="media mt-4">
                  <img class="d-flex mr-3 rounded-circle" style="height: 32px;" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                    <h5 class="mt-0">Author</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>

                    <!--  Reply form may eventually need to be here -->

                </div>

                @if(auth()->user())

                  <form method="post" action="{{route('reply.store')}}">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    {{-- <input type="hidden" name="author" value="{{$comment->author}}">
                    <input type="hidden" name="email" value="{{$comment->email}}"> --}}

                    <div class="form-group">
                      <label for="body">Body</label>
                      <textarea name="body" id="body" cols="75" rows="1"></textarea>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                  </form>

                  {{-- @endif
                  @endforeach --}}

                @endif

              </div>
            </div>

          @endforeach

        @endif

        {{-- <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 img-profile rounded-circle" style="height: 46px;" src="{{$comment->post->user->avatar}}" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <!-- Comment with Replies -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" style="height: 32px;" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" style="height: 32px;" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div> --}}

    @endsection


</x-home-master>