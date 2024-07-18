<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionLazy extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'section_lazies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'section_lazey',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function sectionlazyProjects()
    {
        return $this->hasMany(Project::class, 'sectionlazy_id', 'id');
    }

    public function sectionLazyStations()
    {
        return $this->belongsToMany(Station::class);
    }

    public function sectionLazeyLines()
    {
        return $this->belongsToMany(Line::class);
    }
}
