<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::orderBy('id', 'asc')->get();
        return view('options', [
            'options' => $options
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $question_id = $request->input('question_id');

        if (! Gate::allows('create-option')) {
            return redirect()->route('question.show', ['id' => $question_id])->withErrors(['error' =>
                'У вас нет разрешения на создание ответа']);
        }
        $questions = Question::orderBy('id', 'asc')->get();
        return view('option_create', [
            'questions' => $questions,
            'question_id' => $question_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'question_id' => 'required|integer|exists:questions,id',
           'option_text' => 'required|string|max:255',
           'is_correct' => 'boolean|nullable',
        ]);
        $option= new Option($validated);
        $option->save();
        return redirect()->route('question.show', ['id' => $validated['question_id']])->with(['success' =>
            'Вы успешно создали вопрос!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $option = Option::findOrFail($id);
        return view('Option', ['Option' => $option]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $option = Option::findOrFail($id);
        $question_id = $option->question_id;

        if (! Gate::allows('edit-option')) {
            return redirect()->route('question.show', ['id' => $question_id])->withErrors(['error' =>
                'У вас нет разрешения на редактирование ответа']);
        }
        return view('option_edit', [
            'option' => Option::all()->where('id', $id)->first(),
            'questions' => Question::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'question_id' => 'required|integer|exists:questions,id',
            'option_text' => 'required|string|max:255',
            'is_correct' => 'boolean|nullable',
        ]);

        $option = Option::all()->where('id', $id)->first();
        $option->question_id = $validated['question_id'];
        $option->option_text = $validated['option_text'];
        $option->is_correct = $validated['is_correct'];
        $option->save();
        return redirect()->route('question.show', ['id' => $validated['question_id']])->with(['success' =>
            'Вы успешно редактировали вопрос!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $option = Option::find($id);
        $question_id = $option->question_id;

        if (! Gate::allows('destroy-option')) {
            return redirect()->route('question.show', ['id' => $question_id])->withErrors(['error' =>
                'У вас нет разрешения на удаление ответа']);
        }

        Option::destroy($id);
//        $redirectUrl = $request->input('redirect_url', '/option');
        return redirect()->route('question.show', ['id' => $question_id])->with(['success' =>
            'Вы успешно удалили вопрос!']);
    }
}
