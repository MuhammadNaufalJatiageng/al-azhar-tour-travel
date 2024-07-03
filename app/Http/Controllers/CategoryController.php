<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => "required"
        ]);

        $validated['name'] = $request->name;

        Category::create($validated);

        return back()->with('success', "Berhasil menambahkan kategori.");
    }
}
