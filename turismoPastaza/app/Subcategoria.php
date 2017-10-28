<?php

namespace turismoPastaza;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table='subcategoria';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable=[
    'NOMBRE',
    'ICONO',
    'DESCRIPCION'
    ];

    protected $guarded = [
    ];
}
