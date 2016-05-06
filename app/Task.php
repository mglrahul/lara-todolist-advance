<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Task extends Model
{
    protected $fillable = ['name'];
    
     public function user()
    {
        //return $this->belongsTo(User::class);
         return $this->belongsTo('App\User', 'user_id');
    }
}
