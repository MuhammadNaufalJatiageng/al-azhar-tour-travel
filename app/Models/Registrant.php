<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Registrant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Affiliate(): BelongsTo
    {
        return $this->belongsTo(AffiliateProfile::class);
    }

    public function registrantDetails(): HasMany
    {
        return $this->hasMany(RegistrantDetail::class);
    }
}
