<?php

namespace App\Observers;

use App\Models\Minibller;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class MinibllerObserver
{
    /**
     * Handle the Minibller "created" event.
     *
     * @param  \App\Models\Minibller  $minibller
     * @return void
     */
    public function created(Minibller $minibller)
    {
       
        $transformer_id =$minibller->transformer_id;
       
         $totall = DB::table('minibllers') ->where
         ('transformer_id' ,$transformer_id)
         ->where('deleted_at' ,null)
         ->count();
        //  dd($totall);

         $updateTrance = DB::table('transeformers')
          ->where('id' ,$transformer_id)
         ->update(['no_of_minbilar' => $totall]);
    //   dd($totallOnTransformer);

//             $loadInTrance = DB::table('transeformers')
//             ->where('id' ,$transformer_id)
//             ->first(['load_in_transeformer']);

//             $loadInTrance =$loadInTrance->load_in_transeformer;

//          $divereceLoad =( $totall / $loadInTrance *100)  ;
//         //  dd($totall , $loadInTrance , $divereceLoad );
//         $difrence_between_load = DB::table('transeformers')
//         ->where('id' ,$transformer_id)
//         ->update(['difrence_between_load' => $divereceLoad]);
// //   dd($totallOnTransformer);

         return $updateTrance;

    }

    /**
     * Handle the Minibller "updated" event.
     *
     * @param  \App\Models\Minibller  $minibller
     * @return void
     */
    public function updated(Minibller $minibller)
    {
        // $transformer_id =$minibller->transformer_id;
        // dd( $transformer_id);
        $load =$minibller->load;
        $id =$minibller->id;
        // dd( $id);
        $transformer_id = DB::table('minibllers')
         ->where ('id' ,$id)
        ->first('transformer_id');
        $transformer_id =$transformer_id->transformer_id;
        // dd( $transformer_id);

        // ->first();
      if ( $load != null) {
      
            $totall = DB::table('minibllers') ->where
            ('transformer_id' ,$transformer_id)
            ->where('deleted_at' ,null)
            ->sum('load');
            // dd($totall);
            $loadInTrance = DB::table('transeformers')
            ->where('id' ,$transformer_id)
            ->first(['load_in_transeformer']);

            $loadInTrance =$loadInTrance->load_in_transeformer;

            $divereceLoad =( $totall / $loadInTrance *100)  ;

            $totallOnTransformer = DB::table('transeformers')
            ->where('id' ,$transformer_id)
            ->update(['load_in_totall_minbilar' => $totall ,'difrence_between_load' => $divereceLoad]);
    //   dd($totallOnTransformer);
            return $totallOnTransformer;

          }
       

    //   dd( $minibller);
    }

    /**
     * Handle the Minibller "deleted" event.
     *
     * @param  \App\Models\Minibller  $minibller
     * @return void
     */
    public function deleted(Minibller $minibller)
    {
        $minibller_id = $minibller ->id;
        $deleted_at = $minibller ->deleted_at;
      
        $transformer_id =$minibller->transformer_id;
       
        $totall = DB::table('minibllers') ->where
        ('transformer_id' ,$transformer_id)
        ->where('deleted_at' ,null)
        ->count();
       //  dd($totall);

        $updateTrance = DB::table('transeformers')
         ->where('id' ,$transformer_id)
        ->update(['no_of_minbilar' => $totall]);

      
       $delet = DB::table('fouses')
       ->where('minibiler_id' ,$minibller_id)
      ->update(['deleted_at' => $deleted_at  ]);

       $delet = DB::table('boxes')
        ->where('minibller_no_id' ,$minibller_id)
       ->update(['deleted_at' => $deleted_at  ]);
    
    
       return $delet ;

    }

    /**
     * Handle the Minibller "restored" event.
     *
     * @param  \App\Models\Minibller  $minibller
     * @return void
     */
    public function restored(Minibller $minibller)
    {
        //
    }

    /**
     * Handle the Minibller "force deleted" event.
     *
     * @param  \App\Models\Minibller  $minibller
     * @return void
     */
    public function forceDeleted(Minibller $minibller)
    {
        //
    }
}
