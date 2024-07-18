<?php

namespace App\Observers;

use App\Models\Transeformer;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class transformerobserver
{
    /**
     * Handle the Transeformer "created" event.
     *
     * @param  \App\Models\Transeformer  $transeformer
     * @return void
     */
    public function created(Transeformer $transeformer)
    {
        // dd( $transeformer);
        $transeformer_id = $transeformer ->id;
        $feeder_id = $transeformer ->feeder_transeformers_id;

        // $station_id = DB::table('line_transeformer') 
        // ->select("SELECT *  WHERE 'line_id' =  $feeder_id")->get()
        // ;
        // $query = DB::table('line_station')->select('station_id')->where('line_id' , $feeder_id);
        // $query = DB::select('select * from line_station where 'line_id' = $feeder_id', [1]);

        // $query = DB::select("SELECT * FROM line_station WHERE line_id =  $feeder_id");
        // dd( $query);

        // $station= $query->station_id;
        //         dd( $station);

        $saveHistory2 = DB::table('line_transeformer') 
        ->insert( ['line_id' =>  $feeder_id, 'transeformer_id' => $transeformer_id ]
        );
        return $saveHistory2 ;

        // dd( $query);

        // dd($transeformer);
    }

    /**
     * Handle the Transeformer "updated" event.
     *
     * @param  \App\Models\Transeformer  $transeformer
     * @return void
     */
    public function updated(Transeformer $transeformer)
    {
        $transeformer_id = $transeformer ->id;
        if ($transeformer ->load_y != null) {

            $box_load_y = DB::table('transeformers')
            ->where('id' ,$transeformer_id)
            ->first(['box_load_y']);

            $box_load_y =$box_load_y->box_load_y;
            $divereceLoadY =( (($box_load_y - $transeformer ->load_y )/  $transeformer ->load_y) *100)  ;

            $updateTrance = DB::table('transeformers')
            ->where('id' ,$transeformer_id)
           ->update(['defrence_y' => $divereceLoadY  ]);

        }
        if ($transeformer ->load_b != null) {

            $box_load_b = DB::table('transeformers')
            ->where('id' ,$transeformer_id)
            ->first(['box_load_b']);

            $box_load_b =$box_load_b->box_load_b;
            $divereceLoadb =( (($box_load_b - $transeformer ->load_b )/  $transeformer ->load_b) *100)  ;

            $updateTrance = DB::table('transeformers')
            ->where('id' ,$transeformer_id)
           ->update(['defrence_b' => $divereceLoadb  ]);

        }
        if ($transeformer ->load_r != null) {

            $box_load_r = DB::table('transeformers')
            ->where('id' ,$transeformer_id)
            ->first(['box_load_r']);

            $box_load_r =$box_load_r->box_load_r;
            $divereceLoadb =( (($box_load_r - $transeformer ->load_r )/  $transeformer ->load_r) *100)  ;

            $updateTrance = DB::table('transeformers')
            ->where('id' ,$transeformer_id)
           ->update(['defrence_r' => $divereceLoadb  ]);
 return $updateTrance ;
        }

        // return $updateTrance ;

        // dd($transeformer);
    }

    /**
     * Handle the Transeformer "deleted" event.
     *
     * @param  \App\Models\Transeformer  $transeformer
     * @return void
     */
    public function deleted(Transeformer $transeformer)
    {
        $transeformer_id = $transeformer ->id;
        $deleted_at = $transeformer ->deleted_at;

        $delet = DB::table('cbs')
        ->where('transformer_id' ,$transeformer_id)
       ->update(['deleted_at' => $deleted_at  ]);
      
       $delet = DB::table('minibllers')
        ->where('transformer_id' ,$transeformer_id)
       ->update(['deleted_at' => $deleted_at  ]);
      
       $delet = DB::table('fouses')
       ->where('transformer_id' ,$transeformer_id)
      ->update(['deleted_at' => $deleted_at  ]);

       $delet = DB::table('boxes')
        ->where('transformer_id' ,$transeformer_id)
       ->update(['deleted_at' => $deleted_at  ]);
    
    
       return $delet ;

    //    dd($transeformer);
    }

    /**
     * Handle the Transeformer "restored" event.
     *
     * @param  \App\Models\Transeformer  $transeformer
     * @return void
     */
    public function restored(Transeformer $transeformer)
    {
        //
    }

    /**
     * Handle the Transeformer "force deleted" event.
     *
     * @param  \App\Models\Transeformer  $transeformer
     * @return void
     */
    public function forceDeleted(Transeformer $transeformer)
    {
        //
    }
}
