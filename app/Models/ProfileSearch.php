<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProfileSearch extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'url'
    ];

    public function routeNotificationForSlack($notification)
    {
        return env('SLACK_WEBHOOK_URL');
    }
}
