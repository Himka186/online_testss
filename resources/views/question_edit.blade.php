@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <h2>Редактирование вопроса</h2>
            <form method="post" action="{{ url('question/update/'.$question->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="test_id" class="form-label">Выбор теста:</label>
                    <select class="form-select @error('test_id') is-invalid @enderror" id="test_id" name="test_id">
                        @foreach($tests as $test)
                            <option value="{{$test->id}}" @if(old('test_id')) @if(old('test_id') == $test->id) selected @endif
                            @else  @if($question->test_id == $test->id) selected @endif @endif>{{$test->test_name}}
                            </option>
                        @endforeach
                    </select>
                    <div id="choiceHelp" class="form-text">Выберите тест</div>
                    @error('test_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="question_text" class="form-label">Текст вопроса</label>
                    <input type="text" class="form-control @error('question_text') is-invalid @enderror"
                           id="question_text" name="question_text" value="@if ( old('question_text')) {{old('question_text')}} @else {{$question->question_text}} @endif"/>
                    <div id="textHelp" class="form-text">Введите текст вопроса</div>
                    @error('question_text')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Обновить вопрос</button>
            </form>
        </div>
    </div>
@endsection
