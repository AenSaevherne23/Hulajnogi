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
public function calculateRentalCost($dataRozpoczecia, $dataZakonczenia)
{
    $dataStart = Carbon::parse($dataRozpoczecia);
    $dataEnd = Carbon::parse($dataZakonczenia);

    // Oblicz różnicę czasu (w godzinach, dniach itp.) między datami
    $czasTrwania = $dataEnd->diffInHours($dataStart); // Możesz użyć innych jednostek, np. diffInDays(), diffInMinutes() itp.

    // Oblicz koszt na podstawie czasu trwania
    $stawkaGodzinowa = 10; // Przykładowa stawka godzinowa
    $kosztWypozyczenia = $stawkaGodzinowa * $czasTrwania;

    return $kosztWypozyczenia;
}
    public function store(Request $request)
    {
        $hulajnogaId = $request->input('hulajnoga_id');

        // Znajdź wybraną hulajnogę
        $hulajnoga = Hulajnogi::find($hulajnogaId);

        // Zaktualizuj status na "zajęta"
        $hulajnoga->zajeta = 0;
        $hulajnoga->save();
        $odbior = new Odbiory;
        $odbior->hulajnoga_id = $hulajnogaId;
        $odbior->pracownik_id = Auth::id();

        $wypozyczenieId = $request->input('wypozyczenie_id');
        $wypozyczenie = Wypozyczenia::find($wypozyczenieId);
        $odbior->wypozyczenie_id = $wypozyczenieId;
        $dataRozpoczecia = $wypozyczenie->data_wypozyczenia;
        $dataZakonczenia = $wypozyczenie->data_zakończenia;

        $kosztWypozyczenia = $this->calculateRentalCost($dataRozpoczecia, $dataZakonczenia);
        $odbior->koszt_wypozyczenia = $kosztWypozyczenia;
        $odbior->save();


        return redirect('/odbiory');
    }
    public function destroy($id)
    {
        $odbior = Odbiory::findOrFail($id);


        $odbior->delete();

        return redirect('/odbiory');
    }
    public function update(Request $request, Rewizje $odbior)
    {
        $odbior->hulajnoga_id = $request->input('hulajnoga_id');
        $odbior->pracownik_id = Auth::id();
        $odbior->koszt_wypozyczenia = $request->input('koszt_wyp');
        $odbior->save();

        return redirect('/odbiory');
    }
}
