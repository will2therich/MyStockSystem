<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    protected $table = 'email_verification';
    public $timestamps = false;

    protected $fillable = [
        'token',
        'user_id'
    ];

    public function user() {
        $this->belongsTo('users');
    }
}
