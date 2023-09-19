<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    protected  $table = 'regencies';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function organizations()
    {
        return $this->hasMany(Organization::class, 'regency_id');
    }
}