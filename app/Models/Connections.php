<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connections extends Model
{
    use HasFactory;

    protected $table = 'connections';
    protected $guarded;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getInConnections()
    {
        return $this->where('connected_user_id', $this->connected_user_id)->get();
    }
}
