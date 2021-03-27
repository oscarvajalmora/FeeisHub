<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'url'
    ];


    /**
     * Get all of the reviews for the ReportedProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
