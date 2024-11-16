@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{asset('asset/CSS/user.css')}}">

<div class="table-container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th hidden></th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td hidden>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>
                        <form method="GET" action="./deleteUser/{{$user->id}}" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
