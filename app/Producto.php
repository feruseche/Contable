<?php

namespace Contable;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='productos';
    protected $primaryKey='id';
    public $timestamp=false;
	protected $fillable = ['nombre','codigo','existencia','idBodega','descripcion','estado','updated_at'];
}

