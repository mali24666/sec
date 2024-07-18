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

class CarMove extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'car_moves';

    protected $appends = [
        'file',
        'photo',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'car_no_id',
        'last_driver_id',
        'driver_id',
        'date',
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

    public function car_no()
    {
        return $this->belongsTo(Car::class, 'car_no_id');
    }

    public function last_driver()
    {
        return $this->belongsTo(Employee::class, 'last_driver_id');
    }

    public function driver()
    {
        return $this->belongsTo(Employee::class, 'driver_id');
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file');
    }

    public function getPhotoAttribute()
    {
        $files = $this->getMedia('photo');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}
