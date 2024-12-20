@extends('layout.main')
@section('content')

<link rel="stylesheet" href="{{ asset('asset/CSS/feedback.css') }}">

<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">📣 Feedback List 📣</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead style="background: linear-gradient(90deg, #6a11cb, #2575fc); color: rgb(14, 14, 14);">
                <tr style="color: black">
                    <th style="color: black">ID</th>
                    <th style="color: black">ID User</th>
                    <th style="color: black">Name</th>
                    <th style="color: black">Email</th>
                    <th style="color: black">Title</th>
                    <th style="color: black">Content</th>
                    <th style="color: black">Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr style="background-color: {{ $loop->odd ? '#e8f1ff' : '#fce8e8' }};">
                        <td class="text-center"><span class="badge bg-dark">{{ $feedback->id }}</span></td>
                        <td class="text-center"><span class="badge bg-info text-dark">{{ $feedback->id_user }}</span></td>
                        <td class="fw-bold">{{ $feedback->name }}</td>
                        <td class="text-danger">{{ $feedback->email }}</td>
                        <td class="text-primary">{{ $feedback->title }}</td>
                        <td>{{ Str::limit($feedback->content, 50, '...') }}</td>
                        <td class="text-muted">{{ $feedback->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    /* body {
        background: linear-gradient(120deg, #f6f9fc, #eef2f3);
        color: #333;
    } */
    h1 {
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
    table th {
        text-transform: uppercase;
        font-weight: bold;
    }
    table tbody tr:hover {
        background-color: #ffeaa7 !important;
        transition: all 0.3s ease-in-out;
    }
</style>

@stop
