<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    use HasFactory;
    protected $table = 'announces';
    protected $primaryKey = 'announce_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $guarded = [];
}
