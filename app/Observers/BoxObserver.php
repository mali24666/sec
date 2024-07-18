<?php

namespace App\Observers;

use App\Models\Box;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class BoxObserver
{
    /**
     * Handle the Box "created" event.
     *
     * @param  \App\Models\Box  $box
     * @return void
     */
    public function created(Box $box)
    {
    //    dd($box);
    $transformer_id =$box->transformer_id;
       
             $totallY = DB::table('boxes') ->where
             ('transformer_id' ,$transformer_id)
             ->where('deleted_at' ,null)
             ->sum('load');
             $totallR = DB::table('boxes') ->where
             ('transformer_id' ,$transformer_id)
             ->where('deleted_at' ,null)
             ->sum('load_r');
             $totallB = DB::table('boxes') ->where
             ('transformer_id' ,$transformer_id)
             ->where('deleted_at' ,null)
             ->sum('load_b');
            //  dd($totall);
    
             $updateTrance = DB::table('transeformers')
              ->where('id' ,$transformer_id)
             ->update(['box_load_y' => $totallY ,'box_load_b' => $totallB ,'box_load_r' => $totallR ]);
        //   dd($updateTrance);
    
                $transformerLoad_y = DB::table('transeformers')
                ->where('id' ,$transformer_id)
                ->first(['load_y']);
                $transformerLoad_b = DB::table('transeformers')
                ->where('id' ,$transformer_id)
                ->first(['load_b']);
                $transformerLoad_r = DB::table('transeformers')
                ->where('id' ,$transformer_id)
                ->first(['load_r']);
    
                $transformerLoad_y =$transformerLoad_y->load_y;
                $transformerLoad_b =$transformerLoad_b->load_b;
                $transformerLoad_r =$transformerLoad_r->load_r;
    
             $divereceLoadY =( ($totallY - $transformerLoad_y )/ $transformerLoad_y *100)  ;
             $divereceLoadB =( ($totallB - $transformerLoad_b )/ $transformerLoad_b *100)  ;
             $divereceLoadR =( ($totallR - $transformerLoad_r )/ $transformerLoad_r *100)  ;
            //  dd($totall , $loadInTrance , $divereceLoad );
            $divereceLoadY = DB::table('transeformers')
            ->where('id' ,$transformer_id)
            ->update(['defrence_y' => $divereceLoadY ,
            'defrence_b' => $divereceLoadB ,
            'defrence_r' => $divereceLoadR  ]);
    // //   dd($totallOnTransformer);
     
            $transformer_id =$box->transformer_id;
            
            $totall = DB::table('boxes') ->where
            ('transformer_id' ,$transformer_id)
            ->where('deleted_at' ,null)
            ->count();
        //  dd($totall);

            $updateTrance = DB::table('transeformers')
            ->where('id' ,$transformer_id)
            ->update(['no_of_boxes' => $totall]);

             return $updateTrance;
    
    }

    /**
     * Handle the Box "updated" event.
     *
     * @param  \App\Models\Box  $box
     * @return void
     */
    public function updated(Box $box)
    {      
        
        $transformer_id = DB::table('boxes') ->where
        ('id' ,$box->id)
        ->first('transformer_id');
        $transformer_id =$transformer_id->transformer_id;


        // dd($transformer_id);
        if ($box->load != null ) {
            // dd($box->load);

            $totallY = DB::table('boxes') ->where
            ('transformer_id' ,$transformer_id)
            ->where('deleted_at' ,null)
            ->sum('load');

            $updateTrance = DB::table('transeformers')
            ->where('id' ,$transformer_id)
           ->update(['box_load_y' => $totallY ]);

           $transformerLoad_y = DB::table('transeformers')
           ->where('id' ,$transformer_id)
           ->first(['load_y']);
        //    dd($transformerLoad_y);
           $transformerLoad_y =$transformerLoad_y->load_y;
           $divereceLoadY =( ($totallY - $transformerLoad_y )/ $transformerLoad_y *100)  ;
           $divereceLoadY = DB::table('transeformers')
           ->where('id' ,$transformer_id)
           ->update(['defrence_y' => $divereceLoadY  ]);

        }
        if ($box->load_b != null ) {
            $totallB = DB::table('boxes') ->where
            ('transformer_id' ,$transformer_id)
            ->where('deleted_at' ,null)
            ->sum('load_b');

             $updateTrance = DB::table('transeformers')
              ->where('id' ,$transformer_id)
             ->update(['box_load_b' => $totallB  ]);

             $transformerLoad_b = DB::table('transeformers')
             ->where('id' ,$transformer_id)
             ->first(['load_b']);

             $transformerLoad_b =$transformerLoad_b->load_b;
             $divereceLoadB =( ($totallB - $transformerLoad_b )/ $transformerLoad_b *100)  ;

             $divereceLoadY = DB::table('transeformers')
             ->where('id' ,$transformer_id)
             ->update(['defrence_b' => $divereceLoadB  ]);
 
        }
        if ($box->load_r != null) {
            $totallR = DB::table('boxes') ->where
            ('transformer_id' ,$transformer_id)
            ->where('deleted_at' ,null)
            ->sum('load_r');

            $updateTrance = DB::table('transeformers')
            ->where('id' ,$transformer_id)
           ->update(['box_load_r' => $totallR ]);

           $transformerLoad_r = DB::table('transeformers')
           ->where('id' ,$transformer_id)
           ->first(['load_r']);

           $transformerLoad_r =$transformerLoad_r->load_r;
           $divereceLoadR =( ($totallR - $transformerLoad_r )/ $transformerLoad_r *100)  ;

           $divereceLoadY = DB::table('transeformers')
           ->where('id' ,$transformer_id)
           ->update(['defrence_r' => $divereceLoadR  ]);
           return $divereceLoadY;

        }
      
      
    }

    /**
     * Handle the Box "deleted" event.
     *
     * @param  \App\Models\Box  $box
     * @return void
     */
    public function deleted(Box $box)
    {
        //
    }

    /**
     * Handle the Box "restored" event.
     *
     * @param  \App\Models\Box  $box
     * @return void
     */
    public function restored(Box $box)
    {
        //
    }

    /**
     * Handle the Box "force deleted" event.
     *
     * @param  \App\Models\Box  $box
     * @return void
     */
    public function forceDeleted(Box $box)
    {
        //
    }
}
