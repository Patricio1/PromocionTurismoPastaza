<?php

namespace turismoPastaza;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'MODULO';
    protected $primarKey='ID';
    public $timestamps=false;
    protected %fillable=[
'NOMBRE',
'DESCRIPCION'
    ];

    protected $guarder =[
    ];

}
