<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'status',
    ];

    public function sender(){
    	return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver(){
    	return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
}
