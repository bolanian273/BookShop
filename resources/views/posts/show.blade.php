</style>
@extends("layouts.app")

@section('content')
<div class="container">
    <a href="/posts" class="btn btn-light btn-outline-dark">Go Back</a>
    <br><br>
    <div class="container">
        <embed width="1050px" height="1000px" src="/storage/books/{{$post->book_loc}}#toolbar=0">
        <p style="background-color: royalblue; text-align:center;">Upload on {{$post->updated_at}}</p>
        <br><br>
    <hr>
    </div>
</div>
@endsection
