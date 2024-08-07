<?php

namespace App\Http\Controllers;

use App\Models\Aggrement;
use Illuminate\Http\Request;

class AggrementController extends Controller
{
    public function store(Request $request, $id)
    {
        $agg = Aggrement::find($id);
        
        $agg->body = $request->body;

        $agg->update();

        return back()->with("success", "Berhasil mengubah syarat dan ketentuan ".$agg->for . ".");
    } 
}
