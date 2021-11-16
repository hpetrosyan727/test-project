<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['customerName' , 'quantity' , 'offeringID'];

    public function offering()
    {
        return $this->hasOne(Offering::class, 'id', 'offeringID');
    }
}
