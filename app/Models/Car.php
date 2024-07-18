<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Car extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'cars';

    protected $appends = [
        'estmara',
    ];

    public const TAHEEL_SELECT = [
        '1' => 'مؤهله',
        '2' => 'غير مؤهله',
    ];

    public const CHECK_SELECT = [
        '1' => 'مفوحصه',
        '2' => 'غير مفحوصه',
    ];

    protected $dates = [
        'estmara_date',
        'tameen',
        'check_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'car_number',
        'car_type',
        'moror_number',
        'estmara_date',
        'tameen',
        'factory',
        'modol',
        'check',
        'check_date',
        'taheel',
        'driver_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const CAR_TYPE_SELECT = [
        '1'  => 'سيارة خاصه',
        '2'  => 'ونش',
        '3'  => 'كي سي',
        '4'  => 'ترنشر',
        '5'  => 'بوكلين',
        '6'  => 'سطحه',
        '7'  => 'دينا',
        '8'  => 'قلاب صغير',
        '9'  => 'قلاب كبير',
        '10' => 'باص',
        '11' => 'رصاصه',
        '12' => 'مولد',
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

    public function carEmployees()
    {
        return $this->hasMany(Employee::class, 'car_id', 'id');
    }

    public function carNumberRepairs()
    {
        return $this->hasMany(Repair::class, 'car_number_id', 'id');
    }

    public function carNoCarMoves()
    {
        return $this->hasMany(CarMove::class, 'car_no_id', 'id');
    }

    public function getEstmaraAttribute()
    {
        $file = $this->getMedia('estmara')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getEstmaraDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEstmaraDateAttribute($value)
    {
        $this->attributes['estmara_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTameenAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTameenAttribute($value)
    {
        $this->attributes['tameen'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCheckDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCheckDateAttribute($value)
    {
        $this->attributes['check_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function driver()
    {
        return $this->belongsTo(Employee::class, 'driver_id');
    }
}
