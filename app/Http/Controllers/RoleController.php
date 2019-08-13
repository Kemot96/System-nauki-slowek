<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
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
        $roles = \App\Role::paginate(10);
        $onlySoftDeleted = \App\Role::onlyTrashed()->get();

        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/roles.index', compact('roles', 'onlySoftDeleted'));
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
            return view('backend/roles.create');
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
            'description'=> 'required|max:255'

        ]);
        $role= new \App\Role([
            'name' => $request->get('name'),
            'description'=> $request->get('description')
        ]);
        $role->save();
        return redirect('backend/roles')->with('success', 'Rola została dodana');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = \App\Role::withTrashed()->find($id)->restore();
        return redirect('backend/roles')->with('success', 'Rola została przywrócona');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = \App\Role::find($id);

        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/roles.edit', compact('role'));
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
            'description'=> 'required|max:255'

        ]);

        $role = \App\Role::find($id);
        $role->name=$request->get('name');
        $role->description=$request->get('description');
        $role->save();

        return redirect('backend/roles')->with('success', 'Rola została zaktualizowana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = \App\Role::find($id);
        $role->delete();

        return redirect('backend/roles')->with('success', 'Rola została usunięta');
    }
}
