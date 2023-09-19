<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected  $table = 'organizations';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function groups()
    {
        return $this->belongsTo(Group::class);
    }
    public function types()
    {
        return $this->belongsTo(Type::class);
    }
    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }
    public function regencies()
    {
        return $this->belongsTo(Regency::class);
    }
    public function districts()
    {
        return $this->belongsTo(District::class);
    }
    public function villages()
    {
        return $this->belongsTo(Village::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
