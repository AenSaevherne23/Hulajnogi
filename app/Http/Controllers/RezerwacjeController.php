<?php

namespace App\Http\Controllers;

use App\Models\Hulajnogi;
use App\Models\Rezerwacje;
use App\Models\User;
use App\Models\Wypozyczenia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RezerwacjeController extends Controller
{
    public function index()
    {
        $rezerwacje = Rezerwacje::all();
        $users=User::all();
        $klienci = [];
        $hulajnogi=Hulajnogi::all();
        $zajete=Hulajnogi::where('zajeta',1)->get()->toArray();

        foreach ($users as $user) {
            if ($user->isKlient()) {
                $klienci[] = $user;
            }
        }
        return view('rezerwacje', compact('rezerwacje','klienci','hulajnogi','zajete'));
    }

    public function store(Request $request)
    {
        $rezerwacja = new Rezerwacje;
        $rezerwacja->klient_id = $request->input('klient_id');

        $dataWypozyczenia = $request->input('data_wyp');
        $dataZakonczenia = $request->input('data_zak');

        $rezerwacja->data_wypozyczenia = $dataWypozyczenia;
        $rezerwacja->data_zakonczenia = $dataZakonczenia;

        $rezerwacja->pracownik_id = Auth::id();

        $rezerwacja->save();

        $hulajnogi = $request->input('hulajnogi');
        $nr=Wypozyczenia::find($rezerwacja->id);
        $nr->hulajnogi()->attach($hulajnogi);

        foreach ($hulajnogi as $hulajnogaId) {
            $hulajnoga = Hulajnogi::find($hulajnogaId);
            $hulajnoga->zajeta = 1;
            $hulajnoga->save();
        }

        return redirect('/rezerwacje');
    }

    public function destroy($id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);
        $hulajnogi = $wypozyczenie->hulajnogi()->pluck('hulajnoga_id')->toArray();

        $wypozyczenie->delete();

        Hulajnogi::whereIn('id', $hulajnogi)->update(['zajeta' => 0]);

        return redirect('/rezerwacje');
    }

    public function update(Request $request, $id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);

        $wypozyczenie2= new Wypozyczenia;
        $wypozyczenie2->klient_id = $request->input('klient_id');

        $dataWypozyczenia = $request->input('data_wyp');
        $dataZakonczenia = $request->input('data_zak');

        $wypozyczenie2->data_wypozyczenia = $dataWypozyczenia;
        $wypozyczenie2->data_zakonczenia = $dataZakonczenia;

        $wypozyczenie2->pracownik_id = Auth::id();

        $wypozyczenie2->save();

        $hulajnogi = $request->input('hulajnogi');
        $wypozyczenie2->hulajnogi()->attach($hulajnogi);


        $hulajnogi2 = $wypozyczenie->hulajnogi()->pluck('hulajnoga_id')->toArray();
        Hulajnogi::whereIn('id', $hulajnogi2)->update(['zajeta' => 0]);
        $wypozyczenie->forceDelete();

        foreach ($hulajnogi as $hulajnogaId) {
            $hulajnoga = Hulajnogi::find($hulajnogaId);
            $hulajnoga->zajeta = 1;
            $hulajnoga->save();
        }

        return redirect('/rezerwacje');
    }
}
