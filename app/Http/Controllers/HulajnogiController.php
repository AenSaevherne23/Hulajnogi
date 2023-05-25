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

    public function store(Request $request)
    {
        $hulajnoga = new Hulajnogi;
        $hulajnoga->Nazwa = $request->input('nazwa');
        $hulajnoga->Model = $request->input('model');
        $hulajnoga->save();

        return redirect('/hulajnogi');
    }

    public function destroy($id)
    {
        $hulajnoga = Hulajnogi::findOrFail($id);
        $hulajnoga->delete();

        return redirect('/hulajnogi');
    }
}
