<?php

namespace turismoPastaza;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
     protected $table='modulo';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable=[
    'NOMBRE',
    'DESCRIPCION',
    'PATH'  
    ];

    protected $guarded = [    
    ];
}
