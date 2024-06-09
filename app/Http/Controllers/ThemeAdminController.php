<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeAdminController extends Controller
{
    public function edit(Theme $theme)
    {
        return view('edit', compact('theme'));
    }

    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'theme' => 'required|max:50',
        ]);

        $theme->update($request->all());
        return redirect()->route('themes');
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('themes');
    }
}
