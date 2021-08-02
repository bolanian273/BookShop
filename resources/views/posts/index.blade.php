@extends("layouts.app")

@section('content')
<div class="container" style="color: black">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 20px"><b>{{ __('Available Books') }}</b></div>

                <div class="card-body">
                        <h3>Books Catalog</h3>
                        @if(count($posts)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Book Title</th>
                            <th>Auther Name</th>
                            <th>Book Image</th>
                            <th>Book Summary</th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td><div class="container">
                                    {{$post->title}}
                                    </div></td>
                                <td><div class="container">
                                    {{$post->author}}
                                  </div>
                            </td>
                                <td><img style="width: 100px; height:120px" src="/storage/cover_images/{{$post->cover_img}}"></td>
                                <td><div class="container">
                                    {!!$post->body!!}
                                </div>
                                </td>
                                @if (Auth::check())
                                <td><a href="/posts/{{$post->id}}" class="btn btn-sm btn-success float-right">Read</a></td>
                                @else
                                <td style="color: red">Contact Us to Get An Account To Read the Book</td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{$posts->links()}}
<br>
@endif

@endsection
