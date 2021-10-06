<x-admin-master>

    @section('content')

        {{-- <h6>Roles</h6> --}}

        <div class="row">
            <div class="col-sm-3">
                <form method="post" action="{{route('roles.store')}}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">

                        <div>
                            @error('name')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">Create Role</button>
                </form>
            </div>

            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="roles-table" width="100%" cellspacing="0">
                          <thead>
                            <tr>  
                              <th>Id</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                          </tfoot>
                          <tbody>

                            
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td>{{$role->created_at->diffForHumans()}}</td>
                                <td>{{$role->updated_at->diffForHumans()}}</td>
                            </tr> 
                            @endforeach
                               
        
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                        
                    </div>
        
                </div>
            </div>

        </div>

    @endsection

</x-admin-master>