<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11 Himochkin</title>
</head>
<body>
<h2>Варианты всех ответов на все вопросы</h2>
<table border="1">
    <thead>
    <td>ID вопроса</td>
    <td>ID ответа</td>
    <td>Текст ответа</td>
    <td>Верный ли ответ</td>
    </thead>
    @foreach($options as $Option)
        <tr>
            <td>{{$Option->question_id}}</td>
            <td>{{$Option->id}}</td>
            <td>{{$Option->option_text}}</td>
            <td>{{$Option->is_correct}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>

