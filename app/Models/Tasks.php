<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tasks extends Model
{
    use HasFactory;

     protected $fillable = [
        'tasks',
        'day',
        'reminder' => 'boolean',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,);
    }
}
