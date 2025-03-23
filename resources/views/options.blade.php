@extends('layout')
@section('content')
<h2>Варианты всех ответов на все вопросы</h2>
<table class="table table-striped-columns">
    <thead>
    <td>ID вопроса</td>
    <td>ID ответа</td>
    <td>Текст ответа</td>
    <td>Верный ли ответ</td>
    <td>Действия</td>
    </thead>
    @foreach($options as $Option)
        <tr>
            <td>{{$Option->question_id}}</td>
            <td>{{$Option->id}}</td>
            <td>{{$Option->option_text}}</td>
            <td>{{$Option->is_correct}}</td>
            <td><a href="{{url('option/destroy/'.$Option->id)}}" class="btn btn-danger btn-sm">Удалить</a>
                <a href="{{url('option/edit/'.$Option->id)}}" class="btn btn-secondary btn-sm">Редактировать</a>
            </td>
        </tr>
    @endforeach
</table>
<br>
<form action="/option/create" class="inline add-record">
    <button class="btn btn-success">Создать ответ</button>
</form>
@endsection

