@extends('layout')
@section('content')
    <h2>Список пользователей:</h2>
    <table class="table table-striped-columns">
        <thead>
        <tr>
            <th>ID пользователя</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $User)
            <tr>
                <td>{{ $User->id }}</td>
                <td>
                    <a href="{{ route('user.show', ['id' => $User->id]) }}" class="btn btn-secondary">
                    {{ $User->name }}
                    </a>
                </td>
                <td>{{ $User->lastname }}</td>
                <td>{{ $User->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
