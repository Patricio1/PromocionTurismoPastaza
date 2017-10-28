<?php

namespace turismoPastaza;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     protected $table='categoria';

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
