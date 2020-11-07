<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
        'activated' => 'boolean'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['referral_link'];

    /**
     * Get the user's referral link.
     *
     * @return string
     */
    public function getReferralLinkAttribute()
    {
        return $this->referral_link = env('APP_URL').'/register?ref='.$this->user_name;
    }

    public function getFullNameAttribute()
    {
        return $full_name = $this->first_name. ' '.$this->last_name;
    }

    /**
     * A user has many referrals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    public function account_detail()
    {
        return $this->hasOne(AccountDetail::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function testimonies()
    {
        return $this->hasMany(Testimonies::class);
    }

    public function gethelp()
    {
        return $this->hasMany(GetHelp::class);
    }

    public function providehelp()
    {
        return $this->hasMany(ProvideHelp::class);
    }

    public function ghtransactions()
    {
        return $this->hasManyThrough(GHTransaction::class, GetHelp::class);
    }

    public function phtransactions()
    {
        return $this->hasManyThrough(PHTransaction::class, ProvideHelp::class);
    }


}
