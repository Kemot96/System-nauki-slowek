<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
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
        $results=\App\Result::paginate(10);
        $sets = \App\Set::all();
        $users = \App\User::all();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/results.index', compact('results', 'sets', 'users'));
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
        $sets = \App\Set::all();
        $users = \App\User::all();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/results.create', compact('sets', 'users'));
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
            'sets_id'=>'required',
            'users_id'=> 'required',
            'date'=> 'required',
            'percent'=> 'required'
        ]);

        $result= new \App\Result([
            'sets_id' => $request->get('sets_id'),
            'users_id'=> $request->get('users_id'),
            'date'=> $request->get('date'),
            'percent'=> $request->get('percent')
        ]);
        $result->save();
        return redirect('backend/results')->with('success', 'Rezultat został dodany');
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
        $result = \App\Result::find($id);
        $sets = \App\Set::all();
        $users = \App\User::all();

        if(\Auth::user()->is("Administrator") || \Auth::user()->is("Redaktor")  || \Auth::user()->is("Super Redaktor"))
        {
            return view('backend/results.edit', compact('result', 'sets', 'users'));
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
        $result = \App\Result::find($id);

        $result->sets_id=$request->get('sets_id');
        $result->users_id=$request->get('users_id');
        $result->date=$request->get('date');
        $result->percent=$request->get('percent');

        $result->save();

        return redirect('backend/results')->with('success', 'Rezultat został zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $results = \App\Result::find($id);
        $results->delete();

        return redirect('backend/results')->with('success', 'Rezultat został usunięty');
    }
}
