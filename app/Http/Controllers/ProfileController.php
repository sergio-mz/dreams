<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        /* return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
        ]); */
        return view('perfil', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
