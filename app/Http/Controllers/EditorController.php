<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
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
        $editors=\App\Editor::paginate(10);
        $users= \App\User::all();
        $subcategories = \App\Subcategorie::all();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/editors.index', compact('editors', 'users', 'subcategories'));
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
        $users= \App\User::all();
        $subcategories = \App\Subcategorie::all();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/editors.create', compact('users', 'subcategories'));
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
            'users_id'=>'required',
            'subcategories_id'=> 'required'
        ]);

        $editor= new \App\Editor([
            'users_id' => $request->get('users_id'),
            'subcategories_id'=> $request->get('subcategories_id'),
            'supereditor'=> $request->get('supereditor')
        ]);
        $editor->save();
        return redirect('backend/editors')->with('success', 'Edytor został dodany');
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
        $editor = \App\Editor::find($id);
        $users= \App\User::all();
        $subcategories = \App\Subcategorie::all();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/editors.edit', compact('editor', 'users', 'subcategories'));
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
        $editors = \App\Editor::find($id);

        $editors->users_id=$request->get('users_id');
        $editors->supereditor=$request->get('supereditor');
        $editors->subcategories_id=$request->get('subcategories_id');

        $editors->save();

        return redirect('backend/editors')->with('success', 'Edytor został zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editors = \App\Editor::find($id);
        $editors->delete();

        return redirect('backend/editors')->with('success', 'Edytor został usunięty');
    }
}
