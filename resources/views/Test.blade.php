<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11 Himochkin</title>
</head>
<body>
    <h2>{{$Test ? "Список вопросов теста ".$Test->test_name : 'Неверный ID теста'}}</h2>
    @if($Test)
    <table border="1">
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
                <td>{{$Question->question_text}}</td>
                <td><a href="{{url('question/destroy/'.$Question->id)}}">Удалить</a>
                    <a href="{{url('question/edit/'.$Question->id)}}">Редактировать</a>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>
