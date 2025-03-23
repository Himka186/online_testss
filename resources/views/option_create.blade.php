@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <h2>Добавление варианта ответа</h2>
            <form method="post" action="{{ url('option') }}">
                @csrf
                <div class="mb-3">
                    <label for="question_id" class="form-label">Выберите вопрос:</label>
                    <select class="form-select @error('question_id') is-invalid @enderror" id="question_id" name="question_id">
                        @foreach($questions as $question)
                            <option value="{{$question->id}}" @if(old('question_id') == $question->id) selected @endif>
                                {{$question->question_text}}
                            </option>
                        @endforeach
                    </select>
                    <div id="questionHelp" class="form-text">Выберите вопрос</div>
                    @error('question_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="option_text" class="form-label">Текст ответа:</label>
                    <input type="text" class="form-control @error('option_text') is-invalid @enderror"
                           id="option_text" name="option_text" value="{{ old('option_text') }}">
                    <div id="optionHelp" class="form-text">Введите текст ответа</div>
                    @error('option_text')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="is_correct" class="form-label">Правильный ответ?</label>
                    <input type="checkbox" class="form-check-input @error('is_correct') is-invalid @enderror"
                           id="is_correct" name="is_correct" value="1">
                    @error('is_correct')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Создать ответ</button>
            </form>
        </div>
    </div>
@endsection
