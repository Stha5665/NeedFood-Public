<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\uuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecieverDetail extends Model
{
    use HasFactory,uuid, SoftDeletes;

    protected $fillable = ['address', 'receiver_id', 'donation_id'];

    public function donation(): BelongsTo
    {
        return $this->belongsTo(Donation::class);

    }


}
