<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use App\Team;

class TeamController extends Controller
{

    protected $rules = [        
                    'name' => 'required|min:3',   
                    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, $this->rules);

        $team = new Team;        
        
        if ($team->storeTeam($request)) {
            return redirect('programs/'.Session::get('program'))->with('message', 'Team Added Successfully'); 
        }
        else {
            return redirect('programs/'.Session::get('program'))->with('message', 'Fail to Add Team');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);
        Session::put('team', $id);
        //$points = $team->getPoint($id, Session::get('program'));  
              
        return view('team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('team.update')->with('team', $team);    
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
        $this->validate($request, $this->rules);

        $team = Team::findOrFail($id);    
        $team->name = $request->input('name');
        
        if ($team->save()) {
            return redirect('programs/'.Session::get('program'))->with('message', 'The team is successfully updated.');  
        }
        else {
            return redirect('programs/'.Session::get('program'))->with('message', 'Fail to update the team.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        if ($team->delete()) {
            return redirect('programs/'.Session::get('program'))->with('message', 'Team Deleted Successfully'); 
        }
        else {
            return redirect('programs/'.Session::get('program'))->with('message', 'Fail to Delete Team');
        }
    }
}
