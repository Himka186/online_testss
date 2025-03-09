<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11 Himochkin</title>
</head>
<body>
    <h2>Список всех вопросов</h2>
    <table border="1">
        <thead>
            <td>ID теста</td>
            <td>ID вопроса</td>
            <td>Текст вопроса</td>
        </thead>
    @foreach($questions as $Question)
        <tr>
            <td>{{$Question->test_id}}</td>
            <td>{{$Question->id}}</td>
            <td>{{$Question->question_text}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
