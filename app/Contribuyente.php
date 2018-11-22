<?php

namespace Contable;

use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model
{
    protected $table      = 'contribuyentes';
    protected $primaryKey = 'idContribuyente';
    
    public $timestamp = false;

    protected $fillable = 
    ['contribuyente','rif','nit','direccion','email','usuario','clave',
    'ciudad','estado','actividad','ultimoDiaImposicion','exedenteCreditosFiscales',
    'retencionesAcumuladas','fechaElaboracion','alicuotaGeneral','alicuotaReducida',
    'observaciones','estatus'];


}
