<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'middle_initial',
        'avatar',
        'gender',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
