<?php

namespace turismoPastaza;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
   protected $table='perfil';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable=[
    'NOMBRE'    
    ];

    protected $guarded = [
    'ID'
    ];
}
