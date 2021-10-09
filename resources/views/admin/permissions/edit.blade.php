<x-admin-master>
    @section('content')

    @if(Session::has('permission-updated-message'))
        <div class="alert alert-success">{{Session::get('permission-updated-message')}}</div>
    @endif

    <div class="row">
        <div class="col-sm-6">

            <h1>Edit Permission: {{$permission->name}}</h1>

                <form method="post" action="{{route('permissions.update', $permission->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control " type="text" name="name" id="name" value="{{$permission->name}}">
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>

        </div>
    </div>


    @endsection
</x-admin-master>