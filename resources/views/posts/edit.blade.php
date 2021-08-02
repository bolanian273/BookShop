@extends("layouts.app")

@section('content')
@if(Auth::user()->role != "admin")
<script>window.location = "/posts";</script>
@else
    <h1>Edit Book Info</h1>
    <div class="container" style="color: black">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Details') }}</div>

                    <div class="card-body">
                        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <b>{{Form::label('title', 'Title')}}</b>

            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
    <br>
    <div class="form-group">
        <b>{{Form::label('author', 'Author')}}</b>

        {{Form::text('author', $post->author, ['class' => 'form-control', 'placeholder' => 'Author Name'])}}
    </div>
<br>
        <div class="form-group">
            <b>{{Form::label('body', 'Body')}}</b>
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
    <br>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
            {{Form::file('cover_img',['id'=>'inputGroupFile01', 'class'=> 'custom-file-input'])}}
          <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
            {{Form::file('book_loc',['id'=>'inputGroupFile01', 'class'=> 'custom-file-input'])}}
          <label class="custom-file-label" for="inputGroupFile01">Choose Book File</label>
        </div>
      </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    <a href="/posts" class="btn btn-secondary">Go Back</a>

    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
@endif

@endsection
