<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sets=\App\Set::paginate(10);
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();

        return view('frontend/set.index', compact('sets', 'languages', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();

        return view('frontend/set.create', compact('languages', 'subcategories'));
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
            'languages1_id'=>'required',
            'languages2_id'=> 'required',
            'subcategories_id'=> 'required',
            'name'=> 'required|max:255',
            'words'=> 'required|max:255',
            'number_of_words'=> 'required'

        ]);

        $set= new \App\Set([
            'languages1_id' => $request->get('languages1_id'),
            'languages2_id'=> $request->get('languages2_id'),
            'subcategories_id'=> $request->get('subcategories_id'),
            'users_id'=> \Auth::user()->id,
            'name'=> $request->get('name'),
            'words'=> $request->get('words'),
            'number_of_words'=> $request->get('number_of_words')

        ]);
        $set->save();
        return redirect('frontend/set')->with('success', 'Zestaw został dodany');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $set = \App\Set::find($id);
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();

        return view('frontend/set.edit', compact('set', 'languages', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sets = \App\Set::find($id);

        $request->validate([
            'languages1_id'=>'required',
            'languages2_id'=> 'required',
            'subcategories_id'=> 'required',
            'name'=> 'required|max:255',
            'words'=> 'required|max:255',
            'number_of_words'=> 'required'


        ]);

        $sets->languages1_id=$request->get('languages1_id');
        $sets->languages2_id=$request->get('languages2_id');
        $sets->subcategories_id=$request->get('subcategories_id');
        $sets->users_id=\Auth::user()->id;
        $sets->name=$request->get('name');
        $sets->words=$request->get('words');
        $sets->number_of_words=$request->get('number_of_words');
        $sets->private=$request->get('private');

        $sets->save();

        return redirect('frontend/set')->with('success', 'Zestaw został zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sets = \App\Set::find($id);
        $sets->delete();

        return redirect('frontend/set')->with('success', 'Zestaw został usunięty');
    }
}
