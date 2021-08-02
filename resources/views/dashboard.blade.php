@extends('layouts.app')
@section('content')
@if(Auth::user()->role != "admin")
<script>window.location = "/posts";</script>
@else
<div class="container" style="color: black">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 20px"><b>{{ __('Available Books') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/posts/create" class="btn btn-primary">Add Book</a>
                        <a href="/dashboard/users" class="btn btn-info">Registered Users</a>
                    @endif
                        <br><br>
                        <h3>Books Catalog</h3>
                        @if(count($posts)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Book Title</th>
                            <th>Auther Name</th>
                            <th>Image</th>
                            <th>Upload Date</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->author}}</td>
                                <td><img style="width: 70px; height:90px" src="/storage/cover_images/{{$post->cover_img}}"></td>
                                <td>{{ \Carbon\Carbon::parse( $post->updated_at )->toDayDateTimeString() }}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-success float-right">Edit</a></td>
                                <td> {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' =>'POST', 'class' => 'float-left'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else

@endif
@endsection
