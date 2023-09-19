<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    protected  $table = 'types';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function organizations()
    {
        return $this->hasMany(Organization::class, 'type_id');
    }
}
