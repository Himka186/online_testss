<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>605-11 Himochkin</title>
</head>
<body>
    <h2>{{$Question ? "Варианты ответов на вопрос " .$Question->question_id : 'Неверный ID вопроса'}}</h2>
    @if($Question)
    <table border="1">
        <thead>
            <td>ID вопроса</td>
            <td>ID ответа</td>
            <td>Текст ответа</td>
            <td>Верный ответ</td>
        </thead>
        @foreach($Question->options as $Option)
            <tr>
                <td>{{$Option->question_id}}</td>
                <td>{{$Option->id}}</td>
                <td>{{$Option->option_text}}</td>
                <td>{{$Option->is_correct}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</html>
