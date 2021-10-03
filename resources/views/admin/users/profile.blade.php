<x-admin-master>

    @section('content')

        <div class="row">

            <div class="col-sm-6">
                <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <img class="img-profile rounded-circle" width="60px" height="60px" src="{{$user->avatar}}" alt="profile-thumbnail-image">
                </div>

                <div class="form-group">
                    <input type="file" name="avatar">
                </div>    

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror}" id="username" value="{{$user->username}}">
                    
                    @error('username')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div> 

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}">
                
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div> 
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}">
                    
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    
                    
                </div>   
                <div class="form-group">
                    <label for="password-confirmation">Confirm Password</label>
                    <input type="password" name="password-confirmation" class="form-control" id="password-confirmation">
                </div>                 
                <button type="submit" class="btn btn-primary">Submit</button>   
                
                </form>
            </div>

        </div>


        <div class="row">

            <div class="col-sm-12">

        {{-- @if(Session::has('user-deleted-message'))

            <div class="alert alert-danger">{{Session::get('user-deleted-message')}}</div>

            @elseif(Session::has('user-created-message'))

            <div class="alert alert-success">{{Session::get('user-created-message')}}</div>

            @elseif(Session::has('user-updated-message'))

            <div class="alert alert-success">{{Session::get('user-updated-message')}}</div>

        @endif --}}

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="roles-table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Options</th>  
                      <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Detach</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Options</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                    </tr>
                  </tfoot>
                  <tbody>

                    @foreach($roles as $role)

                      <tr>
                          <td><input type="checkbox"
                                @foreach($user->roles as $user_role)
                                    @if($user_role->slug == $role->slug)
                                        checked
                                    @endif    
                                @endforeach
                            ></td>
                          <td>{{$role->id}}</td>
                          <td>{{$role->name}}</td>
                          <td>{{$role->slug}}</td>
                          <td>
                                <form method="post" action="{{route('user.role.attach', $user)}}">
                                    @method('PUT')
                                    @csrf

                                    <input type="hidden" name="role" value="{{$role->id}}">

                                    <button type="submit" class="btn btn-primary"
                                        @if($user->roles->contains($role))
                                        disabled
                                        @endif
                                    >
                                        Attach
                                    </button>
                                </form>

                          </td>

                            <td>
                                <form method="post" action="{{route('user.role.detach', $user)}}">
                                    @method('PUT')
                                    @csrf

                                    <input type="hidden" name="role" value="{{$role->id}}">

                                    <button type="submit" class="btn btn-danger"
                                    @if(!$user->roles->contains($role))
                                        disabled
                                        @endif
                                    >
                                        Detach
                                    </button>
                                </form>

                            </td>
                      </tr>

                    @endforeach  

                  </tbody>
                </table>
              </div>
            </div>
          </div>
                
            </div>

        </div>


    @endsection


</x-admin-master>