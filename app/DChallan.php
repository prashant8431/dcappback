<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DChallan extends Model
{
    public function getOrder()
    {
        return $this->belongsTo(Order::class, 'work_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
