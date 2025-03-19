<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11 Himochkin</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
<h2>Добавление варианта ответа</h2>
<form method="post" action={{url('option')}}>
    @csrf
    <label>Выберите вопрос:</label>
    <select name="question_id" value="{{ old('question_id') }}">
        <option style="...">
        @foreach($questions as $question)
            <option value="{{$question->id}}"
                    @if(old('question_id') == $question->id) selected
                @endif>{{$question->question_text}}
            </option>
        @endforeach
    </select>
    @error('question_id')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
<br>

    <label>Текст ответа:</label>
    <input type="text" name="option_text" value="{{ old('option_text') }}"/>
    @error('option_text')
        <div class="is-invalid">{{ $message }}</div>
    @enderror
<br>

    <label>Правильный ответ?</label>
    <input type="checkbox" name="is_correct" value="1">
    @error('is_correct')
        <div class="is-invalid">{{ $message }}</div>
    @enderror

    <button type="submit">Создать</button>
</form>
</body>
</html>
