<?php

namespace App\Http\Controllers;

use App\Models\Podsumowania;
use App\Models\Wypozyczenia;
use App\Models\Odbiory;
use App\Models\Rewizje;
use Illuminate\Http\Request;

class PodsumowaniaController extends Controller
{
    public function index()
    {
        $podsumowania = Podsumowania::all();
        $wypozyczenia = Wypozyczenia::all();
        $suma_kosztow = Odbiory::sum('koszt_wypozyczenia');
        $liczba_uszkodzonych = Rewizje::where('czy_uszkodzona', 1)->count();
        $koszt_uszkodzen = Rewizje::where('Czy_uszkodzona', 1)->sum('Koszt_uszkodzen');

        return view('podsumowania', compact('podsumowania', 'wypozyczenia', 'suma_kosztow', 'liczba_uszkodzonych', 'koszt_uszkodzen'));
    }

    public function store(Request $request)
    {
        $podsumowanie = new Podsumowania;
        $ilosc_wypozyczen = Wypozyczenia::count();
        $podsumowanie->ilosc_wypozyczen = $ilosc_wypozyczen;

        $wypozyczenie = Wypozyczenia::first();
        $podsumowanie->wypozyczenie_id = $wypozyczenie->id;

        $suma_kosztow = Odbiory::sum('koszt_wypozyczenia');
        $podsumowanie->koszt = $suma_kosztow;

        $ilosc_odbiorow = Odbiory::count();
        $podsumowanie->ilosc_odbiorow = $ilosc_odbiorow;

        $liczba_uszkodzonych = Rewizje::where('Czy_uszkodzona', 1)->count();
        $podsumowanie->liczba_uszkodzonych = $liczba_uszkodzonych;

        $koszt_uszkodzen = Rewizje::where('Czy_uszkodzona', 1)->sum('Koszt_uszkodzen');
        $podsumowanie->koszt_uszkodzen = $koszt_uszkodzen;


        $podsumowanie->save();
        return redirect('/podsumowania');
    }
}
