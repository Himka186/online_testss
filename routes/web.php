<?php
use App\Models\Question;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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

Route::get('/test', [TestController::class, 'index'])->middleware('auth')->name('test.index');
Route::post('/test', [TestController::class, 'store'])->middleware('auth');
Route::get('/test/create', [TestController::class, 'create'])->middleware('auth');
Route::get('/test/edit/{id}', [TestController::class, 'edit'])->middleware('auth');
Route::post('/test/update/{id}', [TestController::class, 'update'])->middleware('auth');
Route::get('/test/destroy/{id}', [TestController::class, 'destroy'])->middleware('auth');
Route::get('/test/{id}', [TestController::class, 'show'])->middleware('auth')->name('test.show');

Route::get('/question', [QuestionController::class, 'index'])->middleware('auth');
Route::get('/question/create', [QuestionController::class, 'create'])->middleware('auth')->name('question.create');
Route::post('/question', [QuestionController::class, 'store'])->middleware('auth');
Route::get('/question/edit/{id}', [QuestionController::class, 'edit'])->middleware('auth');
Route::post('/question/update/{id}', [QuestionController::class, 'update'])->middleware('auth');
Route::get('/question/destroy/{id}', [QuestionController::class, 'destroy'])->middleware('auth');
Route::get('/question/{id}', [QuestionController::class, 'show'])->middleware('auth')->name('question.show');
Route::post('/question/{id}/submit', [QuestionController::class, 'submit'])->middleware('auth')->name('question.submit');

Route::get('/option', [OptionController::class, 'index'])->middleware('auth');
Route::get('/option/create', [OptionController::class, 'create'])->middleware('auth')->name('option.create');
Route::post('/option', [OptionController::class, 'store'])->middleware('auth');
Route::get('/option/edit/{id}', [OptionController::class, 'edit'])->middleware('auth');
Route::post('/option/update/{id}', [OptionController::class, 'update'])->middleware('auth');
Route::get('/option/destroy/{id}', [OptionController::class, 'destroy'])->middleware('auth');
Route::get('/option/{id}', [OptionController::class, 'show'])->middleware('auth')->name('option.show');

Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth')->name('user.show');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function (){
    return view('error', ['message' => session('message')]);
});
