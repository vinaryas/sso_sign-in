@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('permission.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <label> Aplikasi </label>
                <select name="aplikasi_id" id="aplikasi_id" class="select2 form-control form-control-sm" required>
                    <option> </option>
                    @foreach ($apps as $app)
                    <option value="{{ $app->id }}">{{ $app->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label> Parent </label>
                <select name="parent_id" id="parent_id" class="select2 form-control form-control-sm" required>
                    <option value="{{ 0 }}"> none </option>
                    @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label> Permission </label>
                <input type="text" id="name" name="name" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-6">
                <label> Display Name </label>
                <input type="text" id="display_name" name="display_name" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-6">
                <label> Description </label>
                <input type="text" id="description" name="description" class="form-control form-control-sm" required>
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
                    <th> No. </th>
                    <th> Permission </th>
                    <th> Display Name </th>
                    <th> Description </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td>{{ $permission->description }}</td>
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
