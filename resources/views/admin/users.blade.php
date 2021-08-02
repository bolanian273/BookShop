@extends('layouts.app')
@section('content')
@if(Auth::user()->role != "admin")
<script>window.location = "/posts";</script>
@else
<div class="container" style="color: black">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 20px"><b>{{ __('Registered Users') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/dashboard" class="btn btn-outline-dark">Back</a>
                        <a class="btn btn-success" href="/register">Register New User</a>
                    @endif
                    <br><br> 
                    @if(count($users)>0)               
                    <table class="table table-striped">
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Account Creation Date</th>
                            <th>Days Past</th>
                            
                            <th></th>
                        </tr>
                        @foreach($users as $user)
                        {{-- @if($user->role != "admin") --}}
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ \Carbon\Carbon::parse( $user->updated_at )->toDayDateTimeString() }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->updated_at)->DiffForHumans() }}</td>
                                <td> {!!Form::open(['action' => ['DashboardController@destroy', $user->id], 'method' =>'POST', 'class' => 'float-left'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                            {{-- @endif --}}
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
    {{$users->links()}}


@endif
@endsection
