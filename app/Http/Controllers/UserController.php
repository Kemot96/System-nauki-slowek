<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $users = \App\User::paginate(10);
        $categories = \App\Categorie::All();
        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/users.index', compact('users'));
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
        $users = \App\User::All();

        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/users.create', compact('users'));
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
            'email'=> 'required|email|max:255|unique:users,email,',

        ]);
        $user= new \App\User([
            'name' => $request->get('name'),
            'email'=> $request->get('email'),
            'password'=> bcrypt(request('password')),
        ]);
        $user->save();
        return redirect('backend/users')->with('success', 'Użytkownik został dodany');
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
        $user = \App\User::find($id);

        if(\Auth::user()->is("Administrator"))
        {
            return view('backend/users.edit', compact('user'));
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
            'name'=>'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'email'=> 'required|email|max:255|',

        ]);

        $user = \App\User::find($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=bcrypt(request('password'));
        $user->save();

        return redirect('backend/users')->with('success', 'Użytkownik został zaktualizowany');
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
        $user->delete();

        return redirect('backend/users')->with('success', 'Użytkownik został usunięty');
    }
}
