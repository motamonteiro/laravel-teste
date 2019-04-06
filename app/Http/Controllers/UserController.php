<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->user = $this->user->find($id);

        if (!$this->user) {
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> 'Usuário não encontrado ao tentar detalhar.']);
        }

        return view('users.show', ['user' => $this->user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->user = $this->user->find($id);

        if (!$this->user) {
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> 'Usuário não encontrado ao tentar editar.']);
        }

        return view('users.edit', ['user' => $this->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
    }
}
