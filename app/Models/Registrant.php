<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registrant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Affiliate(): BelongsTo
    {
        return $this->belongsTo(AffiliateProfile::class);
    }
}
