<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the logged user.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (!app()['auth']->user()) {
            return redirect()->route('login')->with(['type'=> 'danger', 'message'=> 'Perfil não encontrado ao tentar detalhar. Faça o login novamente.']);
        }
        return view('profile.show', ['user' => app()['auth']->user()]);
    }

    /**
     * Show the form for editing the logged user.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (!app()['auth']->user()) {
            return redirect()->route('login')->with(['type'=> 'danger', 'message'=> 'Perfil não encontrado ao tentar editar. Faça o login novamente.']);
        }
        return view('profile.edit', ['user' => app()['auth']->user()]);
    }

    /**
     * Update the logged user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //todo
    }

    /**
     * Remove the logged user from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //todo
    }
}
