<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('index-user')) {
            return redirect('/error')->with('message',
                'У вас нет разрешения на просмотр пользователей' );
        }
        return view('users', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (! Gate::allows('show-user')) {
            return redirect('/error')->with('message',
                'У вас нет разрешения на просмотр пользователей' );
        }
        $total = DB::table('users')->selectRaw('sum(results.score) as total')
            ->join('results', 'users.id', '=', 'results.user_id')
            ->join('tests', 'tests.id', '=', 'results.test_id')
            ->where('users.id', $id)
            ->first();

        $user = User::findOrFail($id);
        return view('user', [
            'user' => $user, //User::all()->where('id', $id)->first(),
            'total'=> $total
        //    'user' => 123
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
