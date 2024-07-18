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

class Custody extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'custodies';

    protected $appends = [
        'pic',
    ];

    protected $dates = [
        'date',
        'back_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const RECEIVED_SELECT = [
        '1' => 'جاري الاستلام',
        '2' => 'تم الاستلام',
    ];

    public const STUNTS_SELECT = [
        '1' => 'علي عهدة الموظف',
        '3' => 'الارجاع كتالف',
        '4' => 'الارجاع كمفقود',
        '2' => 'في حالة سليمه',
    ];

    protected $fillable = [
        'employee_name_id',
        'tools_id',
        'number',
        'date',
        'back_date',
        'stunts',
        'given_by_id',
        'receve_by_id',
        'received',
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

    public function employee_name()
    {
        return $this->belongsTo(Employee::class, 'employee_name_id');
    }

    public function tools()
    {
        return $this->belongsTo(Tool::class, 'tools_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBackDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBackDateAttribute($value)
    {
        $this->attributes['back_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function given_by()
    {
        return $this->belongsTo(User::class, 'given_by_id');
    }

    public function receve_by()
    {
        return $this->belongsTo(User::class, 'receve_by_id');
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
}
