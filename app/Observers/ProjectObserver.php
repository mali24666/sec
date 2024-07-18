<?php

namespace App\Observers;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Project;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
    // dd($project);

        $current_timestamp = Carbon::now()->toDateTimeString();
        $station1 = $project ->station;
        
        $feeder_id = $project ->feeder_id;
        $id = $project ->id;
        $ct_id = $project ->ct_id;
        $second_feeder = $project ->second_feeder;
        if ($ct_id==!null) {
            $second_feeder_int = intval($second_feeder) ;
            $second_feeder_new = ++$second_feeder_int;
            // dd($second_feeder_new);

            $saveHistory3 = DB::table('projects') 
            ->where('id', $feeder_id)
            ->update( ['second_feeder' => $second_feeder_new ,'updated_at' => $current_timestamp]
            );
            return $saveHistory3 ;
            }
            if ($station1== '4') { // when we add transformer to feeder
                $transefer_id = $project ->transefer_id;

                $saveHistory1 = DB::table('transeformers') 
                ->where('id', $transefer_id)

                ->update ( ['feeder_id' => $feeder_id]
                // $box = DB::table('boxes') 
                // ->where('trans_box_id', $transefer_id)->get();
                // foreach ($box as $key ) {
                //     $saveHistory3 = DB::table('box_line') 
                //     ->insert ( ['line_id' => $key->id  ,'box_id' => $feeder_id]
                // }    
            );
            return $saveHistory1 ;

                }
    
        // dd($project);
    }

    /**
     * Handle the Project "updated" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {

    }

    /**
     * Handle the Project "deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function deleted(Project $project)
    {
            dd($project);

    }

    /**
     * Handle the Project "restored" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function restored(Project $project)
    {
      
    }

    /**
     * Handle the Project "force deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }
}
