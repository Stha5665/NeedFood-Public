<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\uuid;

class Request extends Model
{
    use HasFactory, SoftDeletes, uuid;

    protected $fillable = ['address', 'description', 'category_id',
        'remarks', 'received_date_time', 'status', 'user_id', 'type', 'is_archived'];

//    for search functionality
//    public function scopeSearch($query): void
//    {
//        if(request('search') ?? false){
//            $query->where('')
//        }
//    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasOne
    {
        return $this->hasOne(Item::class);
    }
    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    public function collaboration(): HasOne
    {
        return $this->hasOne(Collaboration::class);
    }

    public function totalDonations(){
        return $this->donations()->where('status', '!=', 'unverified')
            ->where('status', '!=', 'rejected')
            ->count();

    }
}
