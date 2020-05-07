<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
     * Display the logged user.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $this->user = app()['auth']->user();

        if (!$this->user) {
            return redirect()->route('login')->with(['type'=> 'danger', 'message'=> __('User not found')]);
        }
        return view('profile.show', ['user' => $this->user]);
    }

    /**
     * Show the form for editing the logged user.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $this->user = app()['auth']->user();

        if (!$this->user) {
            return redirect()->route('login')->with(['type'=> 'danger', 'message'=> __('User not found')]);
        }
        return view('profile.edit', ['user' => $this->user]);
    }

    /**
     * Update the logged user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->user = app()['auth']->user();

        if (!$this->user) {
            return redirect()->route('login')->with(['type'=> 'danger', 'message'=> __('User not found')]);
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

        return redirect()->route('profile.show')->with(['type'=> 'success', 'message'=> __('User successfully updated')]);
    }

    /**
     * Remove the logged user from storage.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy()
    {
        $this->user = app()['auth']->user();

        if (!$this->user) {
            return redirect()->route('login')->with(['type'=> 'danger', 'message'=> __('User not found')]);
        }

        $name = $this->user->name;
        $this->user->delete($this->user->id);

        return redirect()->route('login')->with(['type'=> 'danger', 'message'=> __('User successfully deleted'). ': '. $name]);
    }
}
