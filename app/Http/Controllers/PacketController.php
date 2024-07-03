<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'packet_name' => "required",
            'category_id' => "required"
        ]);

        $validated['packet_name'] = $request->packet_name;
        $validated['category_id'] = $request->category_id;

        Packet::create($validated);

        return back()->with('success', "Berhasil menambahkan paket.");
    }
}
