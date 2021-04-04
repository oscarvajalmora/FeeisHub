<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Review extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'reporter_name',
        'reporter_profile_link',
        'affected_name',
        'affected_profile_link',
        'fb_post_link',
        'feedback',
        'commentary',
        'reported_profile_id',
        'facebook_group_id'
    ];

    public function facebookGroup()
    {
        return $this->belongsTo(FacebookGroup::class);
    }

    public function routeNotificationForSlack($notification)
    {
        return env('SLACK_WEBHOOK_URL');
    }

}
