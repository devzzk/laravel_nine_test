<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{

    /**
     * Cms Entrance
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Cms/Index');
    }
}
