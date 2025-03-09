<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11 Himochkin</title>
</head>
<body>
    <h2>Список тестов:</h2>
    <table border="1">
        <thead>
        <td>ID теста</td>
        <td>Наименование теста</td>
        <td>Описание теста</td>
        <td>Время создания</td>
        </thead>
        @foreach($tests as $Test)
            <tr>
                <td>{{$Test->id}}</td>
                <td>{{$Test->test_name}}</td>
                <td>{{$Test->test_description}}</td>
                <td>{{$Test->created_time}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
