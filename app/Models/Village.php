<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected  $table = 'villages';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function organizations()
    {
        return $this->hasMany(Organization::class, 'regency_id');
    }
}
