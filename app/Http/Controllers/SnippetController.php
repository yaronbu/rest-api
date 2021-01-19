<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    /*todo: add editable pagination*/
        return Snippet::where('private', 0)->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:10|max:500',
            'language'=> 'required|in:Java,PHP,Python,JavaScript,Plain Text',
            'title' => 'nullable|max:50',
            'author' => 'nullable|max:50',
            'privat' => 'nullable|boolean'
        ]);

        $data = $request->all();
        $data['secret'] = rand(10000,99999);
        return Snippet::create($data)->makeVisible('secret');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function show(Snippet $snippet)
    {
        $snippet->update(['secret' => rand(10000,99999)]);
        return $snippet->makeVisible('secret');
    }

    /**
     * Update:
     * Deactivate old resource in storage.
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snippet $snippet)
    {
        $request->validate([
            'content' => 'required|min:10|max:500',
            'language'=> 'required|in:Java,PHP,Python,JavaScript,Plain Text',
            'title' => 'nullable|max:50',
            'author' => 'nullable|max:50',
            'privat' => 'nullable|boolean'
        ]);

        $snippet->update(['active' => 0]);

        $data = $request->all();
        $data['secret'] = rand(10000,99999);
        return Snippet::create($data)->makeVisible('secret');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snippet $snippet)
    {
    /*todo: add secret for deletion*/
        return Snippet::destroy($snippet);
    }
}
