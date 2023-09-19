<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function organizations() {
        return $this->hasMany(Organization::class, 'group_id');
    }
}
