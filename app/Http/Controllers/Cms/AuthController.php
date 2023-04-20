<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\LoginRequest;
use Inertia\Inertia;

class AuthController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response|void
     */
    public function login()
    {
        return Inertia::render('Cms/Login');
    }


    public function store(LoginRequest $request)
    {
        $request->authenticate();
        dd($request->session());
    }
}
