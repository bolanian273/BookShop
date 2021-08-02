@extends("layouts.app")

@section('content')
@if(Auth::user()->role != "admin")
<script>window.location = "/posts";</script>
@else
    <div class="container" style="color: black">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center"><h2>{{ __('Add Book Details') }}</h2></div>

                    <div class="card-body">
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <b>{{Form::label('title', ' Book Title')}}</b>

            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Book Title'])}}
        </div>
    <br>
    <div class="form-group">
        <b>{{Form::label('author', 'Author Name')}}</b>

        {{Form::text('author', '', ['class' => 'form-control', 'placeholder' => 'Author Name'])}}
    </div>
    <br>
        <div class="form-group">
            <b>{{Form::label('body', 'About Book')}}</b>
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Book Summary'])}}
        </div>
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
