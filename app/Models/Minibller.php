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

class Minibller extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'minibllers';

    protected $appends = [
        'minibller_photo',
    ];

    public static $searchable = [
        'minibller_number',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'transformer_id',
        'cb_id',
        'minibller_number',
        'longitude',
        'rating',
        'manufacturer_serial_no',
        'no_circuits_ici_kva_rating_manuf_ly',
        'no_of_used_circuits',
        'manufacturer',
        'cable_size_id',
        'area_name_id',
        'other_note',
        'load',
        'load_b',
        'load_y',
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

    public function minibilerFouses()
    {
        return $this->hasMany(Fouse::class, 'minibiler_id', 'id');
    }

    public function minibllerNoBoxes()
    {
        return $this->hasMany(Box::class, 'minibller_no_id', 'id');
    }

    public function minbilarCbs()
    {
        return $this->belongsToMany(Cb::class);
    }

    public function transformer()
    {
        return $this->belongsTo(Transeformer::class, 'transformer_id');
    }

    public function cb()
    {
        return $this->belongsTo(Cb::class, 'cb_id');
    }

    public function cable_size()
    {
        return $this->belongsTo(Cable::class, 'cable_size_id');
    }

    public function minibllar_notes()
    {
        return $this->belongsToMany(Minibllarnote::class);
    }

    public function getMinibllerPhotoAttribute()
    {
        $files = $this->getMedia('minibller_photo');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function area_name()
    {
        return $this->belongsTo(City::class, 'area_name_id');
    }
}