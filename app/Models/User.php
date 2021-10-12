<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $slack_url = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function isAdmin()
    {
        $admins = collect(['mianumair1678@gmail.com', 'bilalafzal367@gmail.com', 'hassanwahla540@gmail.com']);
        if ($admins->contains($this->email)) {
            return true;
        }
        return false;
    }

    public function setSlackChannel($name)
    {
        if (isset($this->slackChannels[$name])) {
            if($name == 'online'){
                $this->setSlackUrl(env('SLACK_ONLINE_ORDER'));
            }
        }
        else {
                $this->setSlackUrl(env('SLACK_OFFLINE_ORDER'));
        }
        return $this;
    }

    public function setSlackUrl($url)
    {
        $this->slack_url = $url;

        return $this;
    }

    public function routeNotificationForSlack($notification)
    {
        return $this->slack_url;
    }
}
