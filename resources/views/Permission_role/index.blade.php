@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('permission_role.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label> Permission </label>
                <select name="permission_id" id="permission_id" class="select2 form-control form-control-sm" required>
                    <option> </option>
                    @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label> Role </label>
                <select name="role_id" id="role_id" class="select2 form-control form-control-sm" required>
                    <option> </option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <label> Aplikasi </label>
                <select name="aplikasi_id" id="aplikasi_id" class="select2 form-control form-control-sm" required>
                    <option> </option>
                    @foreach ($apps as $app)
                    <option value="{{ $app->id }}">{{ $app->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="float-right">
            <button type="submit" class="btn btn-info" name="submit" id="submit" >
                <i class="fas fa-save"></i> Submit
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="table" style="width: 100%;">
            <thead>
                <tr>
                    <th> permission_id </th>
                    <th> role_id </th>
                    <th> aplikasi_id </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissionRoles as $permissionRole)
                    <tr>
                        <td>{{ $permissionRole->permission_id }}</td>
                        <td>{{ $permissionRole->role_id }}</td>
                        <td>{{ $permissionRole->aplikasi_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            console.log('teast');
            $('#table').DataTable();
        });
    </script>
@stop
