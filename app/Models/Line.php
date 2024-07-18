<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Line extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'lines';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'station_id',
        'line_no',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function feederProjects()
    {
        return $this->hasMany(Project::class, 'feeder_id', 'id');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id');
    }

    public function trans()
    {
        return $this->belongsToMany(Transeformer::class);
    }
}
