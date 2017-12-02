<?php

namespace turismoPastaza;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
     protected $table='recurso';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable=[
    'ID_SITIO', 
    'ID_SERVICIO',
    'PATH',
    'DESCRIPCION'
    ];

    protected $guarded = [    
    ];
}
