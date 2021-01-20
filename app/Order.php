<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'email', 'firstname', 'lastname', 'address', 'addressNumber',
        'city', 'province', 'postcode', 'phone', 'nameOnCard', 'total', 'error',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }
}
