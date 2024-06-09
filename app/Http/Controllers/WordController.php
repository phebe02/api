<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::sortable()->paginate(5);
        return view('words', compact('words'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Word::create($request->all());
        return redirect()->route('words.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        return view('words.show', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Word $word)
    {
        $word->update($request->all());
        return redirect()->route('words.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        $word->delete();
        return redirect()->route('words.index');
    }

    public static function getWordsByTheme()
    {
        return DB::table('themes')
            ->join('relations', 'themes.id', '=', 'relations.theme_id')
            ->join('words', 'words.id', '=', 'relations.word_id')
            ->select('themes.theme', 'words.word')
            ->orderBy('themes.theme', 'ASC')
            ->get();
    }
}
