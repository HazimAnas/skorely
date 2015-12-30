<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['name', 'description'];
    protected $table = 'program';

    public function storeProgram($request) {

        $this->id = $this->generateId($request->input('name'));
        $this->name = $request->input('name');
        $this->description = $request->input('description');

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
    		$initials .= $letter;
    	}
    	
    	$random = "";
    	for ($i=0; $i < 6; $i++) { 
    		$random .= rand(0,9);
    	}
    	$id = $initials . $random;
    	
    	return $id;
    }

    public function teams() {
        return $this->hasMany('App\Team');
    }

    public function activities() {
        return $this->hasMany('App\Activity');
    }
}
