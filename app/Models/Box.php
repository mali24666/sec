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

class Box extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'boxes';

    protected $appends = [
        'box_photo',
    ];

    public static $searchable = [
        'box_number',
    ];
public const LOOP_SELECT = [
        '1' => 'Not loop',
        '2' => 'Loop',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const SUPPLY_TYPE_SELECT = [
        '1' => 'under ground',
        '2' => 'cr',
    ];

    public const BOX_TYPE_SELECT = [
        '1' => '1',
        '2' => '2',
        '4' => '4',
        '5' => 'CT',
    ];

    protected $fillable = [
        'transformer_id',
        'transformer_cb_id',
        'minibller_no_id',
        'fouse_id',
        'box_type',
        'box_number',
        'box_number_2',
        'box_number_3',
        'box_number_4',
        'box_location',
        'cable_id',
        'load',
        'load_b',
        'load_r',
        'supply_type',
        'note',
        'loop',
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

    public function transformer_cb()
    {
        return $this->belongsTo(Cb::class, 'transformer_cb_id');
    }

    public function minibller_no()
    {
        return $this->belongsTo(Minibller::class, 'minibller_no_id');
    }

    public function fouse()
    {
        return $this->belongsTo(Fouse::class, 'fouse_id');
    }

    public function box_notes()
    {
        return $this->belongsToMany(BoxNote::class);
    }

    public function cable()
    {
        return $this->belongsTo(Cable::class, 'cable_id');
    }

    public function getBoxPhotoAttribute()
    {
        $files = $this->getMedia('box_photo');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}