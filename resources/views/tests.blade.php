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
        <td>Время обновления</td>
        <td>Действия</td>
        </thead>
        @foreach($tests as $Test)
            <tr>
                <td>{{$Test->id}}</td>
                <td>{{$Test->test_name}}</td>
                <td>{{$Test->test_description}}</td>
                <td>{{$Test->created_at}}</td>
                <td>{{$Test->updated_at}}</td>
                <td><a href="{{url('test/destroy/'.$Test->id)}}">Удалить</a>
                    <a href="{{url('test/edit/'.$Test->id)}}">Изменить</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
