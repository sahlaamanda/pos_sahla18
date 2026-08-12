@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<h4>Edit User</h4>

<form action="{{ route('admin.users.update', $user->id) }}"
      method="POST">

    @csrf
    @method('PATCH')

    @include('users._form')

    <button type="submit" class="btn btn-success">
        Update
    </button>

</form>

@endsection