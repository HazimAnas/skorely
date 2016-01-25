<?php

namespace App;

use Session;
use Illuminate\Database\Eloquent\Model;
use App\Point;

class Activity extends Model
{
    protected $fillable = ['name', 'description'];
    protected $table = 'activity';

    public function storeActivity($request) {

        $this->id = $this->generateId($request->input('name'));
        $this->name = $request->input('name');
        $this->description = $request->input('description');
        $this->program_id = Session::get('program');


        if ($this->save()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function generateId($name) {
    	$initials = "";

		$letters = preg_split("/\s+/", $name);
    	
    	foreach ($letters as $letter) {
    		$initials .= $letter[0];
    	}
    	
    	$random = "";
    	for ($i=0; $i < 6; $i++) { 
    		$random .= rand(0,9);
    	}
    	$id = $initials . $random;
    	
    	return $id;
    } 

    public function getPoint($activityId, $programId = null) {

        $point = new Point;
        $points = $point->getActivityPoint($activityId, $programId);

        return $points;
    }
}
