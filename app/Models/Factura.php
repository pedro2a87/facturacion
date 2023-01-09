<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'impuesto',
        'total',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function compra(){
        return $this->belongsTo(Compra::class);
    }
}
