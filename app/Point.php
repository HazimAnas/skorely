<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Point extends Model
{
    protected $table = 'point';

    public function storePoint($request) {

        if($request->input('id') == 0) {

            $this->id = $this->generateId();
            $this->amount = $request->input('amount');
            $this->team_id = $request->input('team');
            $this->activity_id = $request->input('activity');  

            if ($this->save()) {
                return true;
            }
            else {
                return false;
            }    
        }        
        else {
            $point = $this->findOrFail($request->input('id'));
            $point->amount += $request->input('amount');

            if ($point->save()) {
                return true;
            }
            else {
                return false;
            }

            return false;
        }
    }

    public function generateId() {
        
        $random = "";
        for ($i=0; $i < 7; $i++) { 
            $random .= rand(0,9);
        }
        $id = time() . $random;
        
        return $id;
    }

    public function getActivityPoint($activityId, $programId) {

        $points = DB::table('team')
                ->join('point', function ($join) use ($activityId){
                    $join->on('team.id', '=', 'point.team_id')
                         ->where('point.activity_id', '=', $activityId);
                })
                ->get();

        foreach ($points as $key => $point) {
            $points[$key] = json_decode(json_encode($point), true);
        }


        
        $program = Program::findOrFail($programId);
        $teams = $program->teams->toArray();

        $diff = [];

        if(empty($points)) {
            foreach ($teams as $team) {
                $point = [
                        'id' => 0,
                        'name' => $team['name'],
                        'amount' => 0,
                        'team_id' => $team['id'],
                        'activity_id' => $activityId,
                         ];

            array_push( $points, $point);
            }
        } 
        else {

            foreach ($teams as $team) {

                foreach ($points as $point) {
                    
                    if ($team['id'] == $point['team_id']) {

                        unset($diff[$team['id']]);

                    }
                    else {

                        if(!array_key_exists($team['id'], $diff)) {
                            $diff[$team['id']] = $team['name'];
                         }
                    }
                }
            }

            foreach ($diff as $index => $value) {

                $point = [
                        'id' => 0,
                        'name' => $value,
                        'amount' => 0,
                        'team_id' => $index,
                        'activity_id' => $activityId,
                         ];

                array_push( $points, $point);
            } 


            $dupp = [];

            foreach ($points as $index => $value) {
                
                $i = $index + 1;

                while ($i < count($points)) {
                    
                    if($value['team_id'] == $points[$i]['team_id']) {
                        $dupp[] = $i;
                    }
                    $i++;
                }

            }

            foreach ($dupp as $index) {

                unset($points[$index]);

            }         
        }
       usort($points, function($a, $b) {
            if($a['amount']==$b['amount']) return 0;
            return $a['amount'] < $b['amount']?1:-1;
        });
        return $points;   
    }

    public function getTeamPoint($id) {

        $points = 0;
    }

    public function getProgramRank($id) {

        $program = Program::findOrFail($id);

        $programPoints = $program->points;
        $programTeams = $program->teams;

        if($programPoints->count()) {

            $teamPoints = [];

            foreach ($programTeams as $key => $team) {
                $pointSum = 0;

                foreach ($programPoints as $key => $points) {
                    
                    if($team['id'] == $points['team_id']) {
                        $pointSum+= $points['amount'];
                    }                    
                }

                $teamPoints[] = [
                                'id' => $team['id'],
                                'name' => $team['name'],
                                'points' => $pointSum
                                ];
            }
            usort($teamPoints, function($a, $b) {
                if($a['points']==$b['points']) return 0;
                return $a['points'] < $b['points']?1:-1;
            });

            return $teamPoints;
        }
        else {
            return 0;
        }
    }
}
