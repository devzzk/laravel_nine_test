<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ChirpController extends Controller
{

    public function index()
    {
        return response()->json(\App\Models\Chirp::all()->toArray());
    }
}
