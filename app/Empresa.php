<?php
 
namespace Contable;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table      = 'empresas';
    protected $primaryKey = 'idEmpresa';
    
    public $timestamp = false;

    protected $fillable = 
    ['empresa','rif','nit','direccion','email','usuario','clave',
    'ciudad','estado','actividad','ultimoDiaImposicion','exedenteCreditosFiscales',
    'retencionesAcumuladas','fechaElaboracion','alicuotaGeneral','alicuotaReducida',
    'observaciones','estatus'];
}
