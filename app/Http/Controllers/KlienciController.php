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

    public function store(Request $request)
    {
        $klient = new Klienci;
        $klient->Imie = $request->input('imie');
        $klient->Nazwisko = $request->input('nazwisko');
        $klient->Telefon = $request->input('telefon');
        $klient->save();

        return redirect('/klienci');
    }

    public function destroy($id)
    {
        $klient = Klienci::findOrFail($id);
        $klient->delete();

        return redirect('/klienci');
    }

    public function update(Request $request, Klienci $klient)
    {
        $klient->Imie = $request->input('imie');
        $klient->Nazwisko = $request->input('nazwisko');
        $klient->Telefon = $request->input('telefon');
        $klient->save();

        return redirect('/klienci');
    }
}
