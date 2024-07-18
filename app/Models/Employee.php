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

class Employee extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'employees';

    public static $searchable = [
        'emp_name',
        'emp',
    ];

    protected $appends = [
        'id_photo',
        'persion_pic',
    ];

    protected $dates = [
        'id_expire',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const BRANCH_SELECT = [
        'Hail'    => 'حائل',
        'Aljoof'  => 'الجوف',
        'ElShnan' => 'الشنان',
    ];

    public const OCCUPATION_AGREE_SELECT = [
        '1' => 'مهنة الإقامة مطابقة مع مهنة الموقع',
        '2' => 'غير مطابقة',
    ];

    protected $fillable = [
        'emp_name',
        'branch',
        'nationlaty',
        'emp',
        'id_expire',
        'car_id',
        'occupation',
        'occupation_agree',
        'occupation_insite',
        'en_flow_id',
        'supervisor_id',
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

    public function employeeNameCustodies()
    {
        return $this->hasMany(Custody::class, 'employee_name_id', 'id');
    }

    public function employeeNameCertificates()
    {
        return $this->hasMany(Certificate::class, 'employee_name_id', 'id');
    }

    public function driverCars()
    {
        return $this->hasMany(Car::class, 'driver_id', 'id');
    }

    public function enFlowEmployees()
    {
        return $this->hasMany(self::class, 'en_flow_id', 'id');
    }

    public function supervisorEmployees()
    {
        return $this->hasMany(self::class, 'supervisor_id', 'id');
    }

    public function lastDriverCarMoves()
    {
        return $this->hasMany(CarMove::class, 'last_driver_id', 'id');
    }

    public function getIdExpireAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setIdExpireAttribute($value)
    {
        $this->attributes['id_expire'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function getIdPhotoAttribute()
    {
        $files = $this->getMedia('id_photo');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getPersionPicAttribute()
    {
        $file = $this->getMedia('persion_pic')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function en_flow()
    {
        return $this->belongsTo(self::class, 'en_flow_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(self::class, 'supervisor_id');
    }
}
