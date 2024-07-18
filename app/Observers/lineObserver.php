<?php

namespace App\Observers;

use App\Models\line;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class lineObserver
{
    /**
     * Handle the line "created" event.
     *
     * @param  \App\Models\line  $line
     * @return void
     */
    public function created(line $line)
    {
        
        // $station_id = $line ->station_id;
        // $id = $line ->id;
        // $saveHistory2 = DB::table('line_station') 
        // ->insert( ['station_id' =>  $station_id, 'line_id' => $id ]
        // );
        // return $saveHistory2 ;

    }

    /**
     * Handle the line "updated" event.
     *
     * @param  \App\Models\line  $line
     * @return void
     */
    public function updated(line $line)
    {
        //
    }

    /**
     * Handle the line "deleted" event.
     *
     * @param  \App\Models\line  $line
     * @return void
     */
    public function deleted(line $line)
    {
        //
    }

    /**
     * Handle the line "restored" event.
     *
     * @param  \App\Models\line  $line
     * @return void
     */
    public function restored(line $line)
    {
        //
    }

    /**
     * Handle the line "force deleted" event.
     *
     * @param  \App\Models\line  $line
     * @return void
     */
    public function forceDeleted(line $line)
    {
        //
    }
}
