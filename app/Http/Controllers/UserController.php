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
        $users = $this->user->orderBy('name', 'asc')->paginate(5);
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
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> __('User not found')]);
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
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> __('User not found')]);
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
        $this->user = $this->user->find($id);

        if (!$this->user) {
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> __('User not found')]);
        }

        $validatedData = $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:6',
        ]);

        if ($validatedData['password'] == '') {
            unset($validatedData['password']);
        } else {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $this->user->update($validatedData);

        return redirect()->route('users.index')->with(['type'=> 'success', 'message'=> __('User successfully updated')]);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->user = $this->user->find($id);

        if (!$this->user) {
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> __('User not found')]);
        }

        return view('users.delete', ['user' => $this->user]);
    }

    /**
     * Destroy the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->user = $this->user->find($id);

        if (!$this->user) {
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> __('User not found')]);
        }

        $name = $this->user->name;
        $this->user->delete($id);

        return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> __('User successfully deleted'). ': '. $name]);
    }
}
