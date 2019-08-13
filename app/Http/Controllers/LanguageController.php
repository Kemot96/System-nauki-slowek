<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
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
        $languages = \App\Language::paginate(10);
        $onlySoftDeleted = \App\Language::onlyTrashed()->get();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/languages.index', compact('languages', 'onlySoftDeleted'));
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
        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/languages.create');
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
            'name'=>'required|regex:/^[a-zA-Z]+$/u|max:255',
            'symbol'=> 'required|regex:/^[a-zA-Z]+$/u|max:4'

        ]);
        $language= new \App\Language([
            'name' => $request->get('name'),
            'symbol'=> $request->get('symbol')
        ]);
        $language->save();
        return redirect('backend/languages')->with('success', 'Język został dodany');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = \App\Language::withTrashed()->find($id)->restore();
        return redirect('backend/languages')->with('success', 'Język został przywrócony');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = \App\Language::find($id);

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/languages.edit', compact('language'));
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
        $request->validate([
            'name'=>'required|regex:/^[a-zA-Z]+$/u|max:255',
            'symbol'=> 'required|regex:/^[a-zA-Z]+$/u|max:4'

        ]);

        $language = \App\Language::find($id);
        $language->name=$request->get('name');
        $language->symbol=$request->get('symbol');
        $language->save();

        return redirect('backend/languages')->with('success', 'Język został zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = \App\Language::find($id);
        $language->delete();

        return redirect('backend/languages')->with('success', 'Język został usunięty');
    }

    
}
