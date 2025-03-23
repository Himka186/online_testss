@extends('layout')
@section('content')
    <h2>{{$Question ? "Варианты ответов на вопрос " .$Question->question_text : 'Неверный ID вопроса'}}</h2>
    @if($Question)
    <form method="POST" action="{{ route('question.submit', ['id' => $Question->id]) }}">
        @csrf
    <table class="table table-striped-columns">
        <thead>
            <td>ID вопроса</td>
            <td>ID ответа</td>
            <td>Текст ответа</td>
            <td>Верный ответ</td>
            <td>Выбрать ответ</td>
            <td>Действия</td>
        </thead>
        @foreach($Question->options as $Option)
            <tr>
                <td>{{$Option->question_id}}</td>
                <td>{{$Option->id}}</td>
                <td>{{$Option->option_text}}</td>
                <td>{{$Option->is_correct ? 'Да' : 'Нет'}}</td>
                <td>
                    <input type="radio" name="option_id" value="{{$Option->id}}" required>
                </td>
                <td><a href="{{url('option/destroy/'.$Option->id)}}" class="btn btn-danger btn-sm">Удалить</a>
                    <a href="{{url('option/edit/'.$Option->id)}}" class="btn btn-secondary btn-sm">Редактировать</a>
            </tr>
        @endforeach
    </table>
        <button type="submit" class="btn btn-success">Отправить ответ</button>
    </form>
    @endif
    <br>
    <form id="createOptionForm" action="{{ route('option.create') }}" method="GET" class="inline add-record">
        <input type="hidden" name="question_id" value="{{ $Question->id }}">
        <button type="submit" class="btn btn-success">Создать ответ</button>
    </form>

    <a href="{{ route('test.show', ['id' => $test_id]) }}" class="btn btn-secondary mt-3">Назад к тесту</a>
@endsection
