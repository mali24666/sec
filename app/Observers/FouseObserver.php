<?php

namespace App\Observers;

use App\Models\Fouse;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class FouseObserver
{
    /**
     * Handle the Fouse "created" event.
     *
     * @param  \App\Models\Fouse  $fouse
     * @return void
     */
    public function created(Fouse $fouse)
    {
        //
    }

    /**
     * Handle the Fouse "updated" event.
     *
     * @param  \App\Models\Fouse  $fouse
     * @return void
     */
    public function updated(Fouse $fouse)
    {
    }

    /**
     * Handle the Fouse "deleted" event.
     *
     * @param  \App\Models\Fouse  $fouse
     * @return void
     */
    public function deleted(Fouse $fouse)
    {
        // dd($fouse);
        $fouse_id = $fouse ->id;
        $deleted_at = $fouse ->deleted_at;
      
      

       $delet = DB::table('boxes')
        ->where('fouse_id' ,$fouse_id)
       ->update(['deleted_at' => $deleted_at  ]);
    
    
       return $delet ;


    }

    /**
     * Handle the Fouse "restored" event.
     *
     * @param  \App\Models\Fouse  $fouse
     * @return void
     */
    public function restored(Fouse $fouse)
    {
        //
    }

    /**
     * Handle the Fouse "force deleted" event.
     *
     * @param  \App\Models\Fouse  $fouse
     * @return void
     */
    public function forceDeleted(Fouse $fouse)
    {
        //
    }
}
