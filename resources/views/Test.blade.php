@extends('layout')
@section('content')
    <h2>{{$Test ? "Список вопросов теста ".$Test->test_name : 'Неверный ID теста'}}</h2>
    @if($Test)
    <table class="table table-striped-columns">
        <thead>
            <td>ID вопроса</td>
            <td>ID теста</td>
            <td>Текст вопроса</td>
            <td>Действия</td>
        </thead>
        @foreach($Test->questions as $Question)
            <tr>
                <td>{{$Question->id}}</td>
                <td>{{$Question->test_id}}</td>
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
    @endif
    <br>
    <form id="createQuestionForm" action="{{ route('question.create') }}" method="GET" class="inline add-record">
        <input type="hidden" name="test_id" value="{{ $Test->id }}">
        <button type="submit" class="btn btn-success">Создать вопрос</button>
    </form>

    <a href="{{ $backUrl }}" class="btn btn-secondary mt-3">Назад к списку тестов</a>
@endsection
