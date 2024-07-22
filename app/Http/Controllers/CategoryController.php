<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => "required"
        ]);

        $validated['name'] = $request->category_name;

        Category::create($validated);

        return back()->with('success', "Berhasil menambahkan kategori.");
    }

    public function destroy($id)
    {
        $airline = category::find($id);

        $airline->delete();

        return back()->with("success", "Berhasil menghapus kategori.");
    }
}
