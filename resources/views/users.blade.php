<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11 Himochkin</title>
</head>
<body>
<h2>Список пользователей:</h2>
<table border="1">
    <thead>
    <td>ID пользователя</td>
    <td>Имя</td>
    <td>Фамилия</td>
    <td>Email</td>
    </thead>
    @foreach($users as $User)
        <tr>
            <td>{{$User->id}}</td>
            <td>{{$User->name}}</td>
            <td>{{$User->lastname}}</td>
            <td>{{$User->email}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
