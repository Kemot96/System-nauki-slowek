<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SubcatRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorie = \App\Subcategorie::all();
        $roles = \App\Role::all();
        if(\Auth::user()->is("Administrator"))
        {
            return view('frontend/subcatRoles.index', compact('subcategorie', 'roles'));
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
        $subcategories = \App\Subcategorie::all();
        $roles = \App\Role::all();

        if(\Auth::user()->is("Administrator"))
        {
            return view('frontend/subcatRoles.create', compact('subcategories', 'roles'));
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
        $subcategorie = \App\Subcategorie::find($request->get('subcategories_id'));

        $subcategorie->roles()->sync($request->get('roles_id'));


        return redirect('frontend/subcatRoles')->with('success', 'Rola została dodana dla podkategorii');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategorie = \App\Subcategorie::find($id);
        $subcategorie->roles()->detach();

        return redirect('frontend/subcatRoles')->with('success', 'Rola została usunięta dla podkategorii');
    }
}
