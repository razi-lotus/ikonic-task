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

    public function user()
    {
        if (auth()->user()->id == $this->user_id) {
            return $this->hasOne(User::class, 'id', 'connected_user_id');
        }else {
            return $this->hasOne(User::class, 'id', 'user_id');
        }
    }

    public function commonUser()
    {
        return $this->hasOne(User::class, 'id', 'connected_user_id');
    }

    public function getInConnections($connectedTo)
    {
        if (auth()->user()->id == $this->user_id) {
            return $this->with(['commonUser'])->where('user_id', $this->connected_user_id)
            ->whereIn('connected_user_id', $connectedTo)->get();
        }else {
            return $this->with(['commonUser'])->where('user_id', $this->user_id)
            ->whereIn('connected_user_id', $connectedTo)->get();
        }

    }
}
