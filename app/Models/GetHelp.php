<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetHelp extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function providehelp()
    {
        return $this->hasMany(ProvideHelp::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
