<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\uuid;

class Donation extends Model
{
    use HasFactory, uuid;

    protected $fillable = ['address', 'quantity', 'type', 'remarks', 'donated_date_time', 'status', 'is_archived', 'user_id', 'expiry_date' ,'request_id', 'description',
        'category_id', 'delivery_type'];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);

    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->request()->with('items');
    }

//    relationship with donation images
    public function images(): HasMany
    {
        return $this->hasMany(DonationImage::class);
    }

//    this relationship establish when user donate item
//from donation page
    public function donationItem(): HasOne
    {
        return $this->hasOne(Item::class);
    }

    public function recieverDetail(): HasOne
    {
        return $this->hasOne(RecieverDetail::class);
    }

    public function donatedItemName(){
        return ($this->donationItem->name ?? ''). ' '.($this->donationItem->quantity ?? '').' '.($this->donationItem->unit ?? '');
    }
}
