<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, softDeletes, uuid;

    protected $fillable = ['name', 'quantity', 'unit', 'type', 'status', 'request_id', 'description',
        'remaining_quantity', 'is_expiry_date_needed', 'expiry_date', 'donation_id'];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
    public function donation(): BelongsTo
    {
        return $this->belongsTo(Donation::class);
    }

    public function itemFullCombineName()
    {
        return $this->name. ' '.$this->quantity .' '.$this->unit;
    }
}
