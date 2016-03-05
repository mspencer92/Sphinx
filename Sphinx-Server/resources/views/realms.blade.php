<?php $active_tab = 'realms'; ?>

@extends('common.template')

@section('head')
    <link rel="stylesheet" href="{{ url('/css/realms.css') }}">

    <script src="{{ url('/js/realms.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>Realms</h2>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Active?</th>
                        <th>Owner</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($realms as $realm)
                        <tr>
                            <td>{{ $realm->id }}</td>
                            <td>{{ $realm->name }}</td>
                            <td>{!! ($realm->state == 'OPEN') ? '<span style="color:green;">OPEN</span>' : '<span style="color:red;">' . $realm->state . '</span>' !!}</td>
                            <td><img src="http://mcapi.ca/avatar/2d/{{ $realm->owner->username }}/16/true"> {{ $realm->owner->username }}</td>
                            <td>
                                <input type="button" value="Edit" class="realm-edit-btn btn-success" data-serverid="{{ $realm->id }}">
                                <input type="button" value="Remove" class="realm-remove-btn btn-danger" data-serverid="{{ $realm->id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h2>Create Realm</h2>
            <form action="" method="post" class="form-create-realm">
                {!! csrf_field() !!}

                <label for="name">Realm Name</label>
                <input type="text" class="form-control" name="name">

                <label for="name">Owner</label>
                <input type="text" class="form-control" name="owner">

                <div class="text-muted">Everything else can be configured in-game.</div>

                <input type="submit" class="btn btn-lg btn-success" value="Create" onclick="alert('Incomplete.'); return false;">
            </form>
        </div>
    </div>
@endsection
