<?php

namespace Contable;

use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    protected $table      = 'terceros';
    protected $primaryKey = 'idTercero';
    
    public $timestamp = false;

    protected $fillable = 
    ['tercero','rif'];
}
