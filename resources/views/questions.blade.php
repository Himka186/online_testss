@extends('layout')
@section('content')
    <h2>Список всех вопросов</h2>
    <table class="table table-striped-columns">
        <thead>
            <td>ID теста</td>
            <td>ID вопроса</td>
            <td>Текст вопроса</td>
            <td>Действия</td>
        </thead>
    @foreach($questions as $Question)
        <tr>
            <td>{{$Question->test_id}}</td>
            <td>{{$Question->id}}</td>
            <td>
                <a href="{{ route('question.show', ['id' => $Question->id]) }}" class="btn btn-secondary">
                {{$Question->question_text}}
                </a>
            </td>
            <td><a href="{{url('question/destroy/'.$Question->id)}}" class="btn btn-danger btn-sm">Удалить</a>
                <a href="{{url('question/edit/'.$Question->id)}}" class="btn btn-secondary btn-sm">Редактировать</a>
            </td>
        </tr>
    @endforeach
    </table>
    <br>
    <form action="/question/create" class="inline add-record">
        <button class="btn btn-success">Создать вопрос</button>
    </form>
@endsection
