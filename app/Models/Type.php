<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected  $table = 'types';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function organization(): HasMany
    {
        return $this->hasMany(Organization::class, "type_id", "id");
    }
}
