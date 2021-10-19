<x-admin-master>
    @section('content')

    <h1>All Comments</h1>

    @foreach($comments as $comment)
       <p>{{$comment->author}}</p> 
    @endforeach

    @endsection

    @section('scripts')

        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        {{-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> --}}

    @endsection
</x-admin-master>