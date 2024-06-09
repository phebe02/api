<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Theme;


class WordAdminController extends Controller
{
    public function update(Request $request, Word $word)
    {
        $request->validate([
            'word' => 'required|max:50',
            'theme_id' => 'required|array',
            'theme_id.*' => 'exists:themes,id',
        ]);
    
        // Update the word
        $word->update($request->only('word'));
    
        // Sync the related themes
        $word->themes()->sync($request->input('theme_id', []));
        return redirect()->route('words.index')->with('success', 'Word updated successfully');
    }
    
    
    
    public function edit($id)
    {
        $word = Word::with('themes')->find($id);
        $themes = Theme::all();
        $selectedThemeIds = $word->themes->pluck('id')->toArray();
    
        return view('words.edit', compact('word', 'themes', 'selectedThemeIds'));
    }
    
    

    public function destroy(Word $word)
    {
        $word->delete();
        return redirect()->route('words');
    }
}
