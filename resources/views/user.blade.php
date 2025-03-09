<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
    <h2>{{$user ? "Тесты пользователя: ".$user->name." ".$user->lastname : 'Неверный ID пользователя' }}</h2>
    @if($user)
    <table border="1">
        <thead>
            <td>ID теста</td>
            <td>Наименование теста</td>
            <td>Описание теста</td>
            <td>Время создания</td>
            <td>Результат</td>
        </thead>
        @foreach($user->tests as $Test)
            <tr>
                <td>{{$Test->id}}</td>
                <td>{{$Test->test_name}}</td>
                <td>{{$Test->test_description}}</td>
                <td>{{$Test->created_time}}</td>
                <td>{{$Test->pivot->score}}</td>
            </tr>
        @endforeach
    </table>
    <h2>{{"Итого баллов за тесты: ".$total->total}}</h2>
    @endif
</body>
</html>
