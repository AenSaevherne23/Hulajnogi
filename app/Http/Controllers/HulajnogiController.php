<?php

namespace App\Http\Controllers;

use App\Models\Hulajnogi;
use Illuminate\Http\Request;

class HulajnogiController extends Controller
{
    public function index()
    {
        $hulajnogi = Hulajnogi::all();
        return view('hulajnogi', compact('hulajnogi'));
    }
}
