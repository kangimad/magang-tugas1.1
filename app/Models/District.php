<?php

namespace App\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function organization(): HasMany
    {
        return $this->hasMany(Organization::class, "district_id", "id");
    }

}
