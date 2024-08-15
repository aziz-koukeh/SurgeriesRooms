<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function Devices()
    // {
    //     return $this->belongsToMany(Device::class );
    // }

    // public function SurgeryDevices()
    // {

    //     return $this->belongsToMany(Device::class );
    // }


    /**
     * Get all of the comments for the Surgery
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function SurgeryDevices()
    {
        return $this->hasMany(SurgeryDevices::class, 'surgery_id');
    }


}
