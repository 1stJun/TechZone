<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'orderID';

    public function getOrderDateAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y g:i A');
    }
}
