<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonationImage extends Model
{
    use HasFactory, uuid;

    protected $fillable = ['image_path', 'donation_id'];
    public function donation(): BelongsTo
    {
        return $this->belongsTo(Donation::class);
    }
}
