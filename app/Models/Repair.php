<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Repair extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'repairs';

    protected $appends = [
        'pic',
        'pic_after',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const DEPARTMENT_SELECT = [
        '1' => 'الكهرباء',
        '2' => 'المشاريع',
    ];

    public const BRANCH_SELECT = [
        '1' => 'حائل',
        '2' => 'الشنان',
        '3' => 'الجوف',
    ];

    public const STUTS_SELECT = [
        '1' => 'تم استلام الطلب',
        '2' => 'جاري الإصلاح',
        '3' => 'في انتظار قطع الغيار',
        '4' => 'تم الإصلاح',
    ];

    protected $fillable = [
        'car_number_id',
        'branch',
        'department',
        'issue',
        'details',
        'order_by',
        'stuts',
        'cost',
        'opinion',
        'repair_id',
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

    public function car_number()
    {
        return $this->belongsTo(Car::class, 'car_number_id');
    }

    public function getPicAttribute()
    {
        $files = $this->getMedia('pic');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getPicAfterAttribute()
    {
        $files = $this->getMedia('pic_after');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function repair()
    {
        return $this->belongsTo(User::class, 'repair_id');
    }
}
