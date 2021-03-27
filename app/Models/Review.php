<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'reporter_name',
        'reporter_profile_link',
        'affected_name',
        'affected_profile_link',
        'fb_group_name',
        'fb_group_link',
        'fb_post_link',
        'feedback',
        'commentary',
        'reported_profile_id'
    ];
}
