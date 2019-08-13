<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
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
        $categories = \App\Categorie::paginate(10);
        $onlySoftDeleted = \App\Categorie::onlyTrashed()->get();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/categories.index', compact('categories', 'onlySoftDeleted'));
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
        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/categories.create');
        }
        else
        {
            return redirect('backend/categories');
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
            'name'=>'required|regex:/^[A-Ża-ż0-9 ]+$/u|max:255',
            'description'=> 'required|max:255',
            'picture_file_name'=> 'required'

        ]);
        $categorie= new \App\Categorie([
            'name' => $request->get('name'),
            'description'=> $request->get('description'),
            'picture_file_name'=> $request->get('picture_file_name')
        ]);
        $categorie->save();
        return redirect('backend/categories')->with('success', 'Kategoria została dodana');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = \App\Categorie::withTrashed()->find($id)->restore();
        return redirect('backend/categories')->with('success', 'Kategoria przywrócona');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = \App\Categorie::find($id);

        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/categories.edit', compact('categorie'));
        }
        else
        {
            return redirect('backend/categories');
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
            'name'=>'required|regex:/^[A-Ża-ż0-9 ]+$/u|max:255',
            'description'=> 'required|max:255',
            'picture_file_name'=> 'required'

        ]);

        $categorie = \App\Categorie::find($id);
        $categorie->name=$request->get('name');
        $categorie->description=$request->get('description');
        $categorie->picture_file_name=$request->get('picture_file_name');
        $categorie->save();

        return redirect('backend/categories')->with('success', 'Kategoria została zaktualizowana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = \App\Categorie::find($id);
        $categorie->delete();

        return redirect('backend/categories')->with('success', 'Kategoria została usunięta');
    }
}
