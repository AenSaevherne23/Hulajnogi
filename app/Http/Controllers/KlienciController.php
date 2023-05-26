<?php

namespace App\Http\Controllers;

use App\Models\Klienci;
use Illuminate\Http\Request;

class KlienciController extends Controller
{
    public function index()
    {
        $klienci = Klienci::all();
        return view('klienci', compact('klienci'));
    }
}
