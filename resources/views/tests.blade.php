@extends('layout')
@section('content')
    <h2>Список тестов:</h2>
    <table class="table table-striped-columns">
        <thead>
        <td>ID теста</td>
        <td>Наименование теста</td>
        <td>Описание теста</td>
        <td>Время создания</td>
        <td>Время обновления</td>
        <td>Действия</td>
        </thead>
        @foreach($tests as $Test)
            <tr>
                <td>{{$Test->id}}</td>
                <td>
                    <a href="{{ route('test.show', ['id' => $Test->id]) }}" class="btn btn-secondary">
                    {{$Test->test_name}}
                    </a>
                </td>
                <td>{{$Test->test_description}}</td>
                <td>{{$Test->created_at}}</td>
                <td>{{$Test->updated_at}}</td>
                <td><a href="{{url('test/destroy/'.$Test->id)}}" class="btn btn-danger btn-sm">Удалить</a>
                    <a href="{{url('test/edit/'.$Test->id)}}" class="btn btn-secondary btn-sm">Изменить</a>
                </td>
            </tr>
        @endforeach
    </table>
    <form action="/test/create" class="inline add-record">
        <button class="btn btn-success">Создать тест</button>
    </form>
    <br>
    <div class="pagination">
        {{ $tests->links('bootstrap-5') }}
    </div>
@endsection
