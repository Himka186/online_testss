<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'asc')->get();
        return view('questions', [
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $test_id = $request->input('test_id');

        if (! Gate::allows('create-question')) {
            return redirect()->route('test.show', ['id' => $test_id])->withErrors(['error' =>
                'У вас нет разрешения на создание вопроса']);
        }
        $tests = Test::orderBy('id', 'asc')->get();
        return view('question_create', [
            'tests' => $tests,
            'test_id' => $test_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_id' => 'integer',
            'question_text' => 'required|unique:questions|max:255'
        ]);
        $question= new Question($validated);
        $question->save();
        return redirect()->route('test.show', ['id' => $validated['test_id']])->with(['success' =>
            'Вы успешно создали вопрос!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::findOrFail($id);
        $test_id = $question->test_id;
        return view('Question', ['Question' => $question, 'test_id' => $test_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);
        $test_id = $question->test_id;

        if (! Gate::allows('edit-question')) {
            return redirect()->route('test.show', ['id' => $test_id])->withErrors(['error' =>
                'У вас нет разрешения на редактирование вопроса']);
        }
        return view('question_edit', [
            'question' => Question::all()->where('id', $id)->first(),
            'tests' => Test::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'test_id' => 'integer',
            'question_text' => 'required|max:255'
        ]);
        $question = Question::all()->where('id', $id)->first();
        $question->test_id = $validated['test_id'];
        $question->question_text = $validated['question_text'];
        $question->save();
        return redirect()->route('test.show', ['id' => $validated['test_id']])->with(['success' =>
            'Вы успешно обновили вопрос!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $question = Question::find($id);
        $test_id = $question->test_id;

        if (! Gate::allows('destroy-question')) {
            return redirect()->route('test.show', ['id' => $test_id])->withErrors(['error' =>
                'У вас нет разрешения на удаление вопроса']);
        }


        Question::destroy($id);
//        $redirectUrl = $request->input('redirect_url', '/question');
        return redirect()->route('test.show', ['id' => $test_id])->with(['success' =>
            'Вы успешно удалили вопрос!']);
    }

    public function submit(Request $request, string $id)
    {
        // находим вопрос
        $question = Question::findOrFail($id);

        // получаем выбранный ответ
        $option_id = $request->input('option_id');
        $option = Option::findOrFail($option_id);

        // проверяем ответ
        $is_correct = $option->is_correct;

        // получаем текущего пользователя
        $user = auth()->user();

        //находим или создаем запись в резалтс
        $result = $user->tests()->where('test_id', $question->test_id)->first();

        if (!$result){
            //если записи нет
            $user->tests()->attach($question->test_id, [
                'score' => $is_correct ? 1 : 0,
                'time_finished' => now(),
            ]);
        } else {
            // если запись есть
            $newScore = $result->pivot->score + ($is_correct ? 1 : 0);
            $user->tests()->updateExistingPivot($question->test_id, [
                'score' => $newScore,
                'time_finished' => now(),
            ]);
        }

        return redirect()->route('test.show', ['id' => $question->test_id])->with('success', $is_correct ? 'Правильный ответ!' : 'Неправильный ответ!');

    }
}
