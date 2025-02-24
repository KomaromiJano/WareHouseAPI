<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'contact_person',
        'phone'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
