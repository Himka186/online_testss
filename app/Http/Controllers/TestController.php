<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 3;
        $tests = Test::orderBy('id', 'asc')->paginate($perpage)->withQueryString(); //сортировка + пагинация
        return view('tests', ['tests' => $tests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Gate::allows('create-test')) {
            return redirect()->intended('/test')->withErrors(['error' =>
                'У вас нет разрешения на создание теста']);
        }
        return view('test_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_name' => 'required|string|unique:tests|max:255',
            'test_description' => 'nullable|string'
            //'created_time' => now()
        ]);

        $test = new Test($validated);
        //$test->created_time = now();
        $test->save();
        return redirect()->intended('/test')->with(['success' =>
        'Вы успешно создали тест!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $test = Test::findOrFail($id);
        $backUrl = route('test.index');
        return view('Test', ['Test' => $test, 'backUrl' => $backUrl]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (! Gate::allows('edit-test')) {
            return redirect()->intended('/test')->withErrors(['error' =>
                'У вас нет разрешения на редактирование теста']);
        }
        return view('test_edit',[
           'test' => Test::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'test_name' => 'required|string|max:255',
            'test_description' => 'nullable|string',
        ]);
        $test = Test::all()->where('id', $id)->first();
        $test->test_name = $validated['test_name'];
        $test->test_description = $validated['test_description'];
        $test->updated_at = now();
        $test->save();
        return redirect()->intended('/test')->with(['success' =>
            'Вы успешно обновили информацию о тесте!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if (! Gate::allows('destroy-test')) {
            return redirect()->intended('/test')->withErrors(['error' =>
                'У вас нет разрешения на удаление теста']);
        }

        Test::destroy($id);
        $redirectUrl = $request->input('redirect_url', '/test');
        return redirect()->intended($redirectUrl)->with(['success' =>
            'Вы успешно удалили тест']);
    }
}
