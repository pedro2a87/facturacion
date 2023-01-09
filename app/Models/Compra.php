<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'producto_id',
        'impuesto',
        'monto',
        'factura',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function factura(){
        return $this->hasOne(Factura::class);
    }

    public function producto(){
        return $this->hasOne(Producto::class, 'id', 'producto_id');
    }
}
