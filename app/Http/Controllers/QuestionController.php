<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        if (! Gate::allows('create-question')) {
            return redirect('/error')->with('message',
                'У вас нет разрешения на создание вопроса');
        }
        $tests = Test::orderBy('id', 'asc')->get();
        return view('question_create', [
            'tests' => $tests
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
        return redirect('/question');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('Question', [
            'Question' => Question::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (! Gate::allows('edit-question')) {
            return redirect('/error')->with('message',
                'У вас нет разрешения на редактирование вопроса');
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
        return redirect('/question');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if (! Gate::allows('destroy-question')) {
            return redirect('/error')->with('message',
                'У вас нет разрешения на удаление вопроса');
        }
        Question::destroy($id);
        $redirectUrl = $request->input('redirect_url', '/question');
        return redirect($redirectUrl);
    }
}
