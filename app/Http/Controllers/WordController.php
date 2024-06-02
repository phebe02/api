<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use App\Http\Resources\WordResource;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WordResource::collection(Word::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Word $word)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        //
    }
}
