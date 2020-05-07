<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //protected $gaurded =[];
    protected $fillable = [
        'gender', 'dob', 'disability', 'occupation', 'marital', 'religion'
    ];

    public function user()
    {
        return $this->beloongsTo(User::class);
    }
}
