@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-4">
    <h2>Создание теста</h2>
    <form method="post" action={{url('test')}}>
        @csrf
        <div class="mb-3">
            <label for="test_name" class="form-label">Название теста</label>
            <input type="text" class="form-control @error('test_name') is-invalid @enderror"
                   id="test_name" name="test_name" aria-describedby="nameHelp" value={{ old('test_name') }}>
            <div id="nameHelp" class="form-text custom-help-text">Введите название теста </div>
            @error('test_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="test_description" class="form-label">Описание теста</label>
            <input type="text" class="form-control @error('test_description') is-invalid @enderror"
                   id="test_description" name="test_description" aria-describedby="descriptionHelp" value="{{ old('test_description') }}"/>
            <div id="descriptionHelp" class="form-text custom-help-text">Введите описание теста</div>
            @error('test_description')
            <div class="is-invalid">
                {{ $message }}
            </div>
            @enderror
        </div>

    <button type="submit" class="btn btn-success">Создать тест</button>
    </form>
    </div>
</div>
@endsection
