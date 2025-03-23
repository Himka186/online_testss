@extends('layout')
@section('content')
    <h2>{{ $user ? "Тесты пользователя: " . $user->name . " " . $user->lastname : 'Такого пользователя не существует!' }}</h2>

    @if($user)
        <table class="table table-striped-columns">
            <thead>
            <tr>
                <th>ID теста</th>
                <th>Наименование теста</th>
                <th>Описание теста</th>
                <th>Результат, баллы</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->tests as $Test)
                <tr>
                    <td>{{ $Test->id }}</td>
                    <td>{{ $Test->test_name }}</td>
                    <td>{{ $Test->test_description }}</td>
                    <td>{{ $Test->pivot->score }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h3 class="border p-3 text-center bg-dark">
            {{ "Итого баллов за тесты: " . $total->total }}
        </h3>
    @endif
@endsection
