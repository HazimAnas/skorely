<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Input;
use Redirect;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Program;
use Auth;


class ProgramController extends Controller
{

    protected $rules = [        
                        'name' => 'required|min:3',   
                        'description' => 'required',
                        ];

    protected $user; 

    public function __construct() {
        $this->user = Auth::user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::where('user_id', '=', $this->user->id)->get();
        return view('program.index')->with('programs', $programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $program = new Program;  

        if ($program->storeProgram($request, $this->user->id)) {
            return Redirect::route('programs.index')->with('message', 'Program Created Successfully'); 
        }
        else {
            return Redirect::route('programs.index')->with('message', 'Fail to Create Program');
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
        //
        $program = Program::findOrFail($id);
        $teams = $program->teams;
        $activities = $program->activities;
        $rank = $program->getRank($id);
        Session::put('program', $id);
        return view('program.show', compact('program', 'teams', 'activities', 'rank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $program = Program::findOrFail($id);
        Session::put('program', $id);
        return view('program.update')->with('program', $program);
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
        
        $program = Program::findOrFail($id);
        $program->name = $request->input('name');
        $program->description = $request->input('description');

        if ($program->save()) {
            return redirect('programs/'.Session::get('program'))->with('message', 'The program is successfully updated.');  
        }
        else {
            return redirect('programs/'.Session::get('program'))->with('message', 'Fail to update the program.');
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
        $program = Program::findOrFail($id);

        if ($program->delete()) {
            return Redirect::route('programs.index')->with('message', 'Program Deleted Successfully'); 
        }
        else {
            return Redirect::route('programs.index')->with('message', 'Fail to Delete Program');
        }
    }
}
