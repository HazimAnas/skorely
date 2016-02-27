<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Activity;
use App\Program;

class ActivityController extends Controller
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
        return view('activity.create');
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

        $activity = new Activity;        
        
        if ($activity->storeActivity($request)) {
            return redirect('programs/'.Session::get('program'))->with('message', 'Activity Created Successfully'); 
        }
        else {
            return redirect('programs/'.Session::get('program'))->with('message', 'Fail to Create Activity');
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
        $activity = Activity::findOrFail($id);
        Session::put('activity', $id);
        $points = $activity->getPoint($id, Session::get('program'));  
              
        return view('activity.show', compact('activity', 'points'));
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activity.update')->with('activity', $activity);
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

        $activity = Activity::findOrFail($id);    
        $activity->name = $request->input('name');
        $activity->description = $request->input('description');   
        
        if ($activity->save()) {
            return redirect('program/activities/'.Session::get('activity'))->with('message', 'Activity updated successfully'); 
        }
        else {
            return redirect('program/activities/'.Session::get('activity'))->with('message', 'Fail to updated activity');
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
        $activity = Activity::findOrFail($id);

        if ($activity->delete()) {
            return redirect('programs/'.Session::get('program'))->with('message', 'Activity Deleted Successfully'); 
        }
        else {
            return redirect('programs/'.Session::get('program'))->with('message', 'Fail to Delete Activity');
        }
    }
}
