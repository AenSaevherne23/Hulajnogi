<?php

namespace App\Http\Controllers;

use App\Models\Wypozyczenia;
use App\Models\User;
use App\Models\Hulajnogi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WypozyczeniaController extends Controller
{
    public function index()
    {
        $wypozyczenia = Wypozyczenia::all();
        $users=User::all();
        $klienci = [];
        $hulajnogi=Hulajnogi::all();

        foreach ($users as $user) {
            if ($user->isKlient()) {
                $klienci[] = $user;
            }
        }
        return view('wypozyczenia', compact('wypozyczenia','klienci','hulajnogi'));
    }

    public function store(Request $request)
    {
        $wypozyczenie = new Wypozyczenia;
        $wypozyczenie->klient_id = $request->input('klient_id');

        $dataWypozyczenia = $request->input('data_wyp');
        $dataZakonczenia = $request->input('data_zak');

        $wypozyczenie->data_wypozyczenia = $dataWypozyczenia;
        $wypozyczenie->data_zakonczenia = $dataZakonczenia;

        $wypozyczenie->pracownik_id = Auth::id();

        $wypozyczenie->save();
        $nr=Wypozyczenia::find($wypozyczenie->id);
        $nr->hulajnogi()->attach($request->input('hulajnogi'));

        return redirect('/wypozyczenia');
    }

    public function destroy($id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);
        $wypozyczenie->delete();

        return redirect('/wypozyczenia');
    }

    public function update(Request $request, Wypozyczenia $wypozyczenie)
    {
        /*Wypozyczenia::find($wypozyczenie->id)->forceDelete();*/
        $nr=Wypozyczenia::find($wypozyczenie->id);
        Wypozyczenia::destroy($nr);
        $wypozyczenie2= new Wypozyczenia;
        $wypozyczenie2->klient_id = $request->input('klient_id');

        $dataWypozyczenia = $request->input('data_wyp');
        $dataZakonczenia = $request->input('data_zak');

        $wypozyczenie2->data_wypozyczenia = $dataWypozyczenia;
        $wypozyczenie2->data_zakonczenia = $dataZakonczenia;

        $wypozyczenie2->pracownik_id = Auth::id();

        $wypozyczenie2->save();
        $nr=Wypozyczenia::find($wypozyczenie2->id);
        $nr->hulajnogi()->attach($request->input('hulajnogi'));
        /*$wypozyczenie->hulajnogi()->sync($request->input('hulajnogi'));*/
        /*$wypozyczenie->hulajnogi()->attach($request->input('hulajnogi'));*/

        return redirect('/wypozyczenia');
    }
}
