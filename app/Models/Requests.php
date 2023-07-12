<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $table = 'requests';
    protected $guarded;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function sent()
    {
        return $this->hasOne(User::class, 'id', 'requested_user_id');
    }
}
