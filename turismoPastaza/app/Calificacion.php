<?php

namespace turismoPastaza;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table='calificacion';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable=[
    'ID_SITIO',
    'ID_FILTRO'
    ];

    protected $guarded = [
    ];
}
