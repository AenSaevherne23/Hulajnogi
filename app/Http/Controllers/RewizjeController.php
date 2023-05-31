<?php

namespace App\Http\Controllers;

use App\Models\Rewizje;
use Illuminate\Http\Request;

class RewizjeController extends Controller
{
    public function index()
    {
        $rewizje = Rewizje::all();

        return view('rewizje', compact('rewizje'));
    }

    public function store(Request $request)
    {
        $rewizja = new Rewizje;
        $rewizja->data = $request->input('data');
        $rewizja->czy_uszkodzona = $request->input('czy_uszkodzona');
        $rewizja->opis = $request->input('opis');
        $rewizja->koszt_uszkodzen = $request->input('koszt_uszkodzen');
        $rewizja->hulajnoga_id = $request->input('hulajnoga_id');
        $rewizja->save();

        return redirect('/rewizje');
    }

    public function update(Request $request, Rewizje $rewizja)
    {
        $rewizja->data = $request->input('data');
        $rewizja->czy_uszkodzona = $request->input('czy_uszkodzona');
        $rewizja->opis = $request->input('opis');
        $rewizja->koszt_uszkodzen = $request->input('koszt_uszkodzen');
        $rewizja->hulajnoga_id = $request->input('hulajnoga_id');
        $rewizja->save();

        return redirect('/rewizje');
    }
    public function destroy($id)
    {
        $rewizja = Rewizje::findOrFail($id);
        $rewizja->delete();

        return redirect('/rewizje');
    }

}
