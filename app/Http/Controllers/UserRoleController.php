<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserRoleController extends Controller
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
        $users = \App\User::all();
        $roles = \App\Role::all();
        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/userRoles.index', compact('users', 'roles'));
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
        $users = \App\User::all();
        $roles = \App\Role::all();

        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/userRoles.create', compact('users', 'roles'));
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
        $user = \App\User::find($request->get('users_id'));

        $user->roles()->sync($request->get('roles_id'));


        return redirect('backend/userRoles')->with('success', 'Rola została dodana dla użytkownika');
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
        $user = \App\User::find($id);
        $user->roles()->detach();

        return redirect('backend/userRoles')->with('success', 'Rola została usunięta dla użytkownika');
    }
}
