@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('user_store.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label> Store </label>
                <select name="store_id" id="store_id" class="select2 form-control form-control-sm" required>
                    <option> </option>
                    @foreach ($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label> User </label>
                <select name="user_id" id="user_id" class="select2 form-control form-control-sm" required>
                    <option> </option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <input type="hidden" id="user_type" name="user_type" value="{{ 'App\User' }}" class="form-control form-control-sm" required>
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
                    <th> no. </th>
                    <th> user_id </th>
                    <th> role_id </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userStores as $userStore)
                    <tr>
                        <td>{{ $userStore->id }}</td>
                        <td>{{ $userStore->user_id }}</td>
                        <td>{{ $userStore->store_id }}</td>
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
