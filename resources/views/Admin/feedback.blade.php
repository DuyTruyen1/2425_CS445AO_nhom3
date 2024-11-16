@extends('layout.main')
@section('content')

<link rel="stylesheet" href="{{asset('asset/CSS/feedback.css')}}">

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID User</th>
            <th>Name</th>
            <th>Email</th>
            <th>Title</th>
            <th>Content</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->id_user }}</td>
                <td>{{ $feedback->name }}</td>
                <td>{{ $feedback->email }}</td>
                <td>{{ $feedback->title }}</td>
                <td>{{ $feedback->content }}</td>
                <td>{{ $feedback->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
