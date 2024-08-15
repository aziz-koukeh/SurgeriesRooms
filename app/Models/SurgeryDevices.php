<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurgeryDevices extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the surgeryDevices
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Surgery(): BelongsTo
    {
        return $this->belongsTo(Surgery::class);
    }
}
