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

class BoxesDetail extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'boxes_details';

    protected $appends = [
        'outside_pic',
        'inside_pic',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const SUBSCRIPTION_CLASS_SELECT = [
        '1' => 'سكني',
        '2' => 'تجاري',
        '3' => 'حكومي',
        '4' => 'زراعي ',
        '5' => 'تعليمي ',
    ];

    public const ABSURDITY_SELECT = [
        '1' => 'لا يوجد عبث',
        '2' => 'يوجد عبث',
    ];

    protected $fillable = [
        'subscription_number',
        'cb',
        'rating',
        'watcher',
        'watch_size',
        'ct_transe',
        'subscription_class',
        'absurdity',
        'account_number',
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

    public function getOutsidePicAttribute()
    {
        $files = $this->getMedia('outside_pic');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getInsidePicAttribute()
    {
        $files = $this->getMedia('inside_pic');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}