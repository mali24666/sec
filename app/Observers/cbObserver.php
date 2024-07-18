<?php

namespace App\Observers;

use App\Models\cb;

use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class cbObserver
{
    /**
     * Handle the cb "created" event.
     *
     * @param  \App\Models\cb  $cb
     * @return void
     */
    public function created(cb $cb)
    {
        $cb_id = $cb ->id;
        $transformer_id = $cb ->transformer_id;


         $totall = DB::table('cbs') ->where
         ('transformer_id' ,$transformer_id)
         ->where('deleted_at' ,null)
         ->count();
        //  dd($totall);

         $updateTrance = DB::table('transeformers')
          ->where('id' ,$transformer_id)
         ->update(['no_of_cb' => $totall]);

         return $updateTrance;

    }

    /**
     * Handle the cb "updated" event.
     *
     * @param  \App\Models\cb  $cb
     * @return void
     */
    public function updated(cb $cb)
    {
        //
    }

    /**
     * Handle the cb "deleted" event.
     *
     * @param  \App\Models\cb  $cb
     * @return void
     */
    public function deleted(cb $cb)
    {
        $cb_id = $cb ->id;
        $deleted_at = $cb ->deleted_at;
      
       $delet = DB::table('minibllers')
        ->where('cb_id' ,$cb_id)
       ->update(['deleted_at' => $deleted_at  ]);
      
       $delet = DB::table('fouses')
       ->where('transformer_cb_id' ,$cb_id)
      ->update(['deleted_at' => $deleted_at  ]);

       $delet = DB::table('boxes')
        ->where('transformer_cb_id' ,$cb_id)
       ->update(['deleted_at' => $deleted_at  ]);
    
    
       return $delet ;

    }

    /**
     * Handle the cb "restored" event.
     *
     * @param  \App\Models\cb  $cb
     * @return void
     */
    public function restored(cb $cb)
    {
        //
    }

    /**
     * Handle the cb "force deleted" event.
     *
     * @param  \App\Models\cb  $cb
     * @return void
     */
    public function forceDeleted(cb $cb)
    {
        //
    }
}
