<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11 Himochkin</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
<h2>Добавление вопроса в тест</h2>
<form method="post" action={{url('question')}}/>
    @csrf
    <label>Выбор теста:</label>
    <select name="test_id" value="{{ old('test_id') }}">
        <option style="...">
        @foreach($tests as $test)
            <option value="{{$test->id}}"
                    @if(old('test_id') == $test->id) selected
               @endif>{{$test->test_name}}
            </option>
        @endforeach
    </select>
    @error('test_id')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
<br>
    <label>Текст вопроса</label>
    <input type="text" name="question_text" value="{{ old('question_text') }}">
    @error('question_text')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
<br>
    <input type="submit">
</body>
</html>
