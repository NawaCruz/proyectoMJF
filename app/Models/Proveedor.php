<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';

    protected $fillable = [
        'ruc',
        'telefono',
        'razon_social',
        'correo',
        'direccion',
        'representante',
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_proveedor', 'id_proveedor');
    }

    public function productos()
    {
        return $this->belongsToMany(
            Producto::class,
            'productosxproveedores',
            'id_proveedor',
            'id_producto'
        );
    }
}
