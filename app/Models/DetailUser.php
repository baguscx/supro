<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'address',
    ];

    public function users(){
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
}
