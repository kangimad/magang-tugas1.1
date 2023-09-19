<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function organizations()
    {
        return $this->hasMany(Organization::class, 'district_id');
    }

}
