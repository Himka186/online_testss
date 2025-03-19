<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11 Himochkin</title>
    <style> .is-invalid { color: red }   </style>
</head>
<body>
<h2>Создание теста</h2>
<form method="post" action={{url('test')}}>
    @csrf
    <label>Название теста</label>
    <input type="text" name="test_name" value="{{ old('test_name') }}"/>
    @error('test_name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
<br>
    <label>Описание теста</label>
    <input type="text" name="test_description" value="{{ old('test_description') }}"/>
    @error('test_description')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
<br>
    <input type="submit">
</form>
</body>
</html>
