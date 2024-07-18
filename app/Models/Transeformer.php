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

class Transeformer extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'transeformers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const GAS_INDICATOR_SELECT = [
        '1' => 'green',
        '2' => 'red',
    ];
      public const OIL_INDICATOR_SELECT = [
        '1' => 'green',
        '2' => 'red',
    ];
  public const SMART_SELECT = [
        '1' => 'not smart',
        '2' => 'smart',
    ];
    public const TRANSFORMER_TYPE_SELECT = [
        '1' => 'over head',
        '2' => 'unit',
        '3' => 'platform',
        '4' => 'indoor',
    ];

    public const RMU_TYPE_SELECT = [
        '1' => '3-WAY',
        '2' => '4-WAY 3+1',
        '3' => 'oil',
        '3' => '4-way 2+2',
       
    ];
  public const EQUIPMENT_TYPE_SELECT = [
        '1' => 'SGR',
        '2' => 'Transformer',
        '3' => 'SGR + Transformer',
    ];
    public const DATA_ENTRY_STATUS_SELECT = [
        '1' => 'In processing',
        '2' => 'Some data needs to be clarified',
        '3' => 'completed',
    ];

    public const KVA_RATING_SELECT = [
        '1' => '500',
        '2' => '1000',
        '3' => '1500',
        '4' => '100',
        '5' => '200',
        '6' => '300',
    ];

    public const MV_CABLE_SELECT = [
        '1' => '50/16',
        '2' => '1*70',
        '3' => '3*240',
        '4' => '3-400',
        '5' => '3*500',
        '6' => '3*300',
    ];

    public static $searchable = [
        't_no',
        'x_minb',
        'manuf_sno',
        'manufacturer',
        'y_minb',
        'left_ss',
        'right_ss',
        'serial_no',
    ];

    protected $appends = [
        'transformer_temperature_picture',
        'picture_befor',
        'photo_after',
        'noise_r_picture',
        'noise_l_picture',
        'noise_o_picture',
        'noise_t_picture',
    ];

    protected $fillable = [
        't_no',
        'equipment_type',
        'city_name_id',
        'x_minb',
        'transformer_type',
        'kva_rating',
        'primary_voltage',
        'sec_voltage',
        'manuf_sno',
        'manufacturer',
        'manafac_year',
        'over_load',
        'load_y',
        'load_b',
        'load_r',
        'box_load_y',
        'box_load_b',
        'box_load_r',
        'defrence_y',
        'defrence_b',
        'defrence_r',
        'no_of_cb',
        'no_of_minbilar',
        'no_of_boxes',
        'feeder_transeformers_id',
        'transformer_temperature',
        'reference_temperature',
        'notes',
        'rmu_type',
        'y_minb',
        'manuf',
        'mv_cable',
        'left_ss',
        'right_ss',
        'serial_no',
        'gas_indicator',
        'created_at',
        'noise_r',
        'noise_l',
        'noise_o',
        'noise_t',
        'noise_refreence',
        'side_scan_by_id',
        'data_intery_by_id',
        'panal_capasity',
        'ct',
        'panal_year',
        'panel_serial_no',
        'panel_manufacture',
        'smart',
        'data_entry_status',
          'rmu_note',
        'oil_indicator',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
    public function transformerMinibllers()
    {
        return $this->hasMany(Minibller::class, 'transformer_id', 'id');
    }

  public function transformerFouses()
    {
        return $this->hasMany(Fouse::class, 'transformer_id', 'id');
    }

    public function transformerBoxes()
    {
        return $this->hasMany(Box::class, 'transformer_id', 'id');
    }

    public function transformerCbs()
    {
        return $this->hasMany(Cb::class, 'transformer_id', 'id');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function transeferProjects()
    {
        return $this->hasMany(Project::class, 'transefer_id', 'id');
    }

    public function transDiagrams()
    {
        return $this->belongsToMany(Diagram::class);
    }

    public function cbs()
    {
        return $this->belongsToMany(Cb::class);
    }

    public function city_name()
    {
        return $this->belongsTo(City::class, 'city_name_id');
    }

    public function feeder_transeformers()
    {
        return $this->belongsTo(Line::class, 'feeder_transeformers_id');
    }

    public function getTransformerTemperaturePictureAttribute()
    {
        $files = $this->getMedia('transformer_temperature_picture');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function transe_notes()
    {
        return $this->belongsToMany(Allnote::class);
    }

    public function getPictureBeforAttribute()
    {
        $files = $this->getMedia('picture_befor');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getPhotoAfterAttribute()
    {
        $files = $this->getMedia('photo_after');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getNoiseRPictureAttribute()
    {
        $files = $this->getMedia('noise_r_picture');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getNoiseLPictureAttribute()
    {
        $files = $this->getMedia('noise_l_picture');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getNoiseOPictureAttribute()
    {
        $files = $this->getMedia('noise_o_picture');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getNoiseTPictureAttribute()
    {
        $files = $this->getMedia('noise_t_picture');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function side_scan_by()
    {
        return $this->belongsTo(User::class, 'side_scan_by_id');
    }

    public function data_intery_by()
    {
        return $this->belongsTo(User::class, 'data_intery_by_id');
    }
}