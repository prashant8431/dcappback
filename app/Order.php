<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
