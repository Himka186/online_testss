<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11 Himochkin</title>
    <style> .is-invalid { color: red; }  </style>
</head>
<body>
<h2>Редактирование теста</h2>
<form method="post" action={{url('test/update/'.$test->id)}}>
    @csrf
    <label>Наименование теста</label>
    <input type="text" name="test_name" value="@if (old('test_name')) {{old('test_name')}} @else {{$test->test_name}} @endif " />
    @error('test_name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
<br>
    <label>Описание теста</label>
    <input type="text" name="test_description" value="@if (old('test_description')) {{old('test_description')}} @else {{$test->test_description}} @endif "/>
    @error('test_description')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
<br>
    <input type="submit">
</form>
</body>
</html>
