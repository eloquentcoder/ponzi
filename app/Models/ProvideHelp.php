<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProvideHelp extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['created_at'];


    public function gethelp()
    {
        return $this->belongsToMany(GetHelp::class, 'get_provide');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function transactions()
    // {
    //     return $this->hasMany(PHTransaction::class);
    // }

    public function getExpirydateAttribute()
    {
       return $this->created_at->addHours(24)->diffForHumans();
    }

    // public function geexpiryTimeAttribute(Type $var = null)
    // {
    //     # code...
    // }


}
