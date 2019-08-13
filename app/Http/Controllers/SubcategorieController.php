<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubcategorieController extends Controller
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
        $subcategories=\App\Subcategorie::paginate(10);
        $categories = \App\Categorie::all();
        $onlySoftDeleted = \App\Subcategorie::onlyTrashed()->get();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/subcategories.index', compact('subcategories', 'categories', 'onlySoftDeleted'));
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
        $categories = \App\Categorie::all();

        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/subcategories.create', compact('categories'));
        }
        else
        {
            return redirect('backend/subcategories');
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
            'categories_id'=>'required',
            'name'=> 'required|regex:/^[A-Za-z0-9 ]+$/u|max:255',
            'description'=> 'required|max:255',
            'picture_file_name'=> 'required'
        ]);

        $subcategorie= new \App\Subcategorie([
            'categories_id' => $request->get('categories_id'),
            'name'=> $request->get('name'),
            'description'=> $request->get('description'),
            'picture_file_name'=> $request->get('picture_file_name')
        ]);
        $subcategorie->save();
        return redirect('backend/subcategories')->with('success', 'Podkategoria została dodana');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategorie = \App\Subcategorie::withTrashed()->find($id)->restore();
        return redirect('backend/subcategories')->with('success', 'Podkategoria przywrócona');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategorie = \App\Subcategorie::find($id);
        $categories = \App\Categorie::all();

        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/subcategories.edit', compact('subcategorie', 'categories'))->with('idCat',$id);  
        }
        else
        {
            return redirect('backend/subcategories');
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
        $subcategories = \App\Subcategorie::find($id);

        $request->validate([
            'categories_id'=>'required',
            'name'=> 'required|regex:/^[A-Za-z0-9 ]+$/u|max:255',
            'description'=> 'required|max:255',
            'picture_file_name'=> 'required'
        ]);

        $subcategories->categories_id=$request->get('categories_id');
        $subcategories->name=$request->get('name');
        $subcategories->description=$request->get('description');
        $subcategories->picture_file_name=$request->get('picture_file_name');

        $subcategories->save();

        return redirect('backend/subcategories')->with('success', 'Podkategoria została zaktualizowana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategories = \App\Subcategorie::find($id);
        $subcategories->delete();

        return redirect('backend/subcategories')->with('success', 'Podkategoria została usunięta');
    }
}
