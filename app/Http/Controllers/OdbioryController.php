<?php

namespace App\Http\Controllers;

use App\Models\Hulajnogi;
use App\Models\Odbiory;
use App\Models\Rewizje;
use App\Models\User;
use App\Models\Wypozyczenia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class OdbioryController extends Controller
{
    public function index()
    {
        $odbiory = Odbiory::all();
        $users=User::all();
        $hulajnogi=Hulajnogi::all();
        $zajete=Hulajnogi::where('zajeta',1)->get()->toArray();
        $wypozyczenia=Wypozyczenia::all();


        return view('odbiory', compact('odbiory','users','hulajnogi','zajete','wypozyczenia'));
    }
public function calculateRentalCost($dataRozpoczecia, $dataZakonczenia, $hulajnogi)
{
    $dataStart = Carbon::parse($dataRozpoczecia);
    $dataEnd = Carbon::parse($dataZakonczenia);

    // Oblicz różnicę czasu (w godzinach, dniach itp.) między datami
    $czasTrwania = $dataEnd->diffInHours($dataStart); // Możesz użyć innych jednostek, np. diffInDays(), diffInMinutes() itp.

    // Oblicz koszt na podstawie czasu trwania
    $stawkaGodzinowa = 10; // Przykładowa stawka godzinowa
    $kosztWypozyczenia = $stawkaGodzinowa * $czasTrwania * count($hulajnogi);
    return $kosztWypozyczenia;
}
    public function store(Request $request)
    {
        $request->validate([
            'wypozyczenie_id' => 'unique:odbiory'
        ]);

        $odbior = new Odbiory();
        $odbior->pracownik_id = Auth::id();

        $wypozyczenieId = $request->input('wypozyczenie_id');
        $wypozyczenie = Wypozyczenia::find($wypozyczenieId);
        $odbior->wypozyczenie_id = $wypozyczenieId;

        $dataRozpoczecia = $wypozyczenie->data_wypozyczenia;
        $dataZakonczenia = $wypozyczenie->data_zakonczenia;
        $odbior->klient_id = $wypozyczenie->klient_id;

        $kosztWypozyczenia = $this->calculateRentalCost($dataRozpoczecia, $dataZakonczenia, $wypozyczenie->hulajnogi);
        $odbior->koszt_wypozyczenia = $kosztWypozyczenia;
        $odbior->save();

        $wypozyczenie = Wypozyczenia::find($wypozyczenieId); // Używamy zmienną $wypozyczenieId
        $hulajnogi = $wypozyczenie->hulajnogi;
        foreach ($hulajnogi as $hulajnoga) {
            $hulajnoga->zajeta = 0;
            $hulajnoga->save();
        }

        return redirect('/odbiory');
    }
    public function destroy($id)
    {
        $odbior = Odbiory::findOrFail($id);

        $odbior->delete();

        Hulajnogi::where('id', $odbior->hulajnoga_id)->update(['zajeta' => 1]);

        return redirect('/odbiory');
    }
    public function update(Request $request, $id)
    {
        $odbior = Odbiory::findOrFail($id);
        $odbior2 = new Odbiory;

        $hulajnogi = $request->input('hulajnoga_id');

        $odbior2->hulajnogi()->attach($hulajnogi);


        $hulajnogi2 = $odbior->hulajnogi()->pluck('hulajnoga_id')->toArray();
        Hulajnogi::whereIn('id', $hulajnogi2)->update(['zajeta' => 1]);
        $odbior->forceDelete();

        foreach ($hulajnogi as $hulajnogaId) {
            $hulajnoga = Hulajnogi::find($hulajnogaId);
            $hulajnoga->zajeta = 0;
            $hulajnoga->save();
        }




        $odbior2->hulajnoga_id = $hulajnogaId;
        $odbior2->pracownik_id = Auth::id();

        $wypozyczenieId = $request->input('wypozyczenie_id');
        $wypozyczenie = Wypozyczenia::find($wypozyczenieId);
        $odbior->wypozyczenie_id = $wypozyczenieId;
        $dataRozpoczecia = $wypozyczenie->data_wypozyczenia;
        $dataZakonczenia = $wypozyczenie->data_zakonczenia;

        $kosztWypozyczenia = $this->calculateRentalCost($dataRozpoczecia, $dataZakonczenia);
        $odbior->koszt_wypozyczenia = $kosztWypozyczenia;
        $odbior->save();

        return redirect('/odbiory');
    }
}
