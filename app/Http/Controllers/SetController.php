<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetController extends Controller
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
        $users = \App\User::all();
        $onlySoftDeleted = \App\Set::onlyTrashed()->get();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/sets.index', compact('sets', 'languages', 'subcategories', 'users','onlySoftDeleted'));
        }
        else
        {
            return redirect('frontwelcome');
        }

        
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
        $users = \App\User::all();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/sets.create', compact('languages', 'subcategories', 'users'));
        }
        else
        {
            return redirect('frontwelcome');
        }

        
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
            'languages2_id'=> 'required|different:languages1_id',
            'subcategories_id'=> 'required',
            'users_id'=> 'required',
            'name'=> 'required|regex:/^[a-zA-Z0-9 ]+$/u|max:255',
            'words'=> 'required|max:255',
            'number_of_words'=> 'required'


        ]);

        $set= new \App\Set([
            'languages1_id' => $request->get('languages1_id'),
            'languages2_id'=> $request->get('languages2_id'),
            'subcategories_id'=> $request->get('subcategories_id'),
            'users_id'=> $request->get('users_id'),
            'name'=> $request->get('name'),
            'words'=> $request->get('words'),
            'number_of_words'=> $request->get('number_of_words')

        ]);
        $set->save();
        return redirect('backend/sets')->with('success', 'Zestaw został dodany');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $set = \App\Set::withTrashed()->find($id)->restore();
        return redirect('backend/sets')->with('success', 'Zestaw został przywrócony');
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
        $users = \App\User::all();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/sets.edit', compact('set', 'languages', 'subcategories', 'users'));
        }
        else
        {
            return redirect('frontwelcome');
        }

        
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
            'languages2_id'=> 'required|different:languages1_id',
            'subcategories_id'=> 'required',
            'users_id'=> 'required',
            'name'=> 'required|regex:/^[a-zA-Z0-9 ]+$/u|max:255',
            'words'=> 'required|max:255',
            'number_of_words'=> 'required'


        ]);

        $sets->languages1_id=$request->get('languages1_id');
        $sets->languages2_id=$request->get('languages2_id');
        $sets->subcategories_id=$request->get('subcategories_id');
        $sets->users_id=$request->get('users_id');
        $sets->name=$request->get('name');
        $sets->words=$request->get('words');
        $sets->number_of_words=$request->get('number_of_words');

        $sets->save();

        return redirect('backend/sets')->with('success', 'Zestaw został zaktualizowany');
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

        return redirect('backend/sets')->with('success', 'Zestaw został usunięty');
    }
}
