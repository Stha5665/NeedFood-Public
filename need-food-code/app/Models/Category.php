<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\uuid;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, uuid;
    protected $fillable = ['name', 'description', 'priority'];

    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }
}
