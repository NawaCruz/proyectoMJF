<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductoProveedor extends Pivot
{
    use HasFactory;
    protected $table = 'productosxproveedores';
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id_proveedor',
        'id_producto',
    ];
}
