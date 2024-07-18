<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Cb extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'cbs';

    public static $searchable = [
        'trans_cb_fider_number',
    ];

    protected $appends = [
        'temperature_picture',
        'refrence_pic',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function cbMinibllers()
    {
        return $this->hasMany(Minibller::class, 'cb_id', 'id');
    }
    protected $fillable = [
        'transformer_id',
        'trans_cb_fider_number',
        'temperature',
        'temperature_refrence',
        'note',
         'load_y',
        'load_b',
        'load_r',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function transformer()
    {
        return $this->belongsTo(Transeformer::class, 'transformer_id');
    }

    public function minbilars()
    {
        return $this->belongsToMany(Minibller::class);
    }

    public function getTemperaturePictureAttribute()
    {
        $files = $this->getMedia('temperature_picture');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getRefrencePicAttribute()
    {
        $files = $this->getMedia('refrence_pic');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}