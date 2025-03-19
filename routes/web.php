<?php
use App\Models\Question;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});

//Route::get('/api/tests/{test}/questions', function (Request $request, $testId) {
//    $questions = Question::where('test_id', $testId)->get();
//    return response()->json($questions);
//});

Route::get('/test', [TestController::class, 'index']);
Route::post('/test', [TestController::class, 'store']);
Route::get('/test/create', [TestController::class, 'create']);
Route::get('/test/edit/{id}', [TestController::class, 'edit']);
Route::post('/test/update/{id}', [TestController::class, 'update']);
Route::get('/test/destroy/{id}', [TestController::class, 'destroy']);
Route::get('/test/{id}', [TestController::class, 'show']);

Route::get('/question', [QuestionController::class, 'index']);
Route::get('/question/create', [QuestionController::class, 'create']);
Route::post('/question', [QuestionController::class, 'store']);
Route::get('/question/edit/{id}', [QuestionController::class, 'edit']);
Route::post('/question/update/{id}', [QuestionController::class, 'update']);
Route::get('/question/destroy/{id}', [QuestionController::class, 'destroy']);
Route::get('/question/{id}', [QuestionController::class, 'show']);

Route::get('/option', [OptionController::class, 'index']);
Route::get('/option/create', [OptionController::class, 'create']);
Route::post('/option', [OptionController::class, 'store']);
Route::get('/option/edit/{id}', [OptionController::class, 'edit']);
Route::post('/option/update/{id}', [OptionController::class, 'update']);
Route::get('/option/destroy/{id}', [OptionController::class, 'destroy']);
Route::get('/option/{id}', [OptionController::class, 'show']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
