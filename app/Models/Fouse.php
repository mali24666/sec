<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fouse extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'fouses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'transformer_id',
        'transformer_cb_id',
        'minibiler_id',
        'fouse_no',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function transformer()
    {
        return $this->belongsTo(Transeformer::class, 'transformer_id');
    }

    public function transformer_cb()
    {
        return $this->belongsTo(Cb::class, 'transformer_cb_id');
    }

    public function minibiler()
    {
        return $this->belongsTo(Minibller::class, 'minibiler_id');
    }
}
