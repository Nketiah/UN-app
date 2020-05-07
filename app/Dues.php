<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dues extends Model
{
  
     public function user()
     {
       return $this->belondsTo(User::class);
     }
     //fetch by $dues->user-surname

     //protected $guarded = [];
    protected $fillable = [
        'amount', 'paid_month', 'paid_year', 'user_id',
    ];
}
