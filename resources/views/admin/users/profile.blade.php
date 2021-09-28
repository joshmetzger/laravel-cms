<x-admin-master>

    @section('content')

        <h1>User Profile for: {{$user->name}}</h1>

        <div class="row">

            <div class="col-sm-6">
                <form action="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <img class="img-profile rounded-circle" width="60px" height="60px" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" alt="profile-thumbnail-image">
                </div>

                <div class="form-group">
                    <input type="file">
                </div>    

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}">
                </div> 

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                </div> 
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}">
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


    @endsection


</x-admin-master>