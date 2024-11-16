@extends('layout.main')
@section('content')

<link rel="stylesheet" href="{{asset('asset/CSS/skill.css')}}">

<!-- Add Skill Form -->
<form action="" method="POST" role="form">
    <legend>Thêm kỹ năng</legend>
    <div class="form-group">
        <label for="skill_name">Name</label>
        <input type="text" class="form-control" id="skill_name" name="name">
    </div>
    <button type="button" class="btn btn-primary them" onclick="SaveSkill(this)">Thêm</button>
</form>

<!-- Skills Table -->
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($skill as $ca)
            <tr>
                <td>{{$ca->id}}</td>
                <td>{{$ca->name}}</td>
                <td>
                    <button type="button" class="btn btn-xs btn-info" onclick="EditSkill(this)">Sửa</button>
                    <button type="button" class="btn btn-xs btn-danger" onclick="deleteSkill(this)">Xóa</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Edit Skill Modal -->
<div class="modal fade" id="modal-skill">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa kỹ năng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="SaveSkillEdit()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script></script>
@stop
