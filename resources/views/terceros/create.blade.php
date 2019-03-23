@extends('inicio.app')
@section('contenido')

<div class="content">

<div class="row">

 <section class="content-header">
      <h1>
        <a href="empresas.listado"><button type="button" class="btn btn-info"><i class="fa fa-table"></i></button></a>
         Registrar Nuevo Tercero
      </h1>
      <section class="content-header">
        
      </section>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Principal</a></li>
        @if(Auth::user()->vista=='2')
          <li><a href="terceros">Terceros</a></li>
        @else
          <li><a href="terceros.listado">Terceros</a></li>
        @endif
        <li class="active">Nuevo Tercero</li>
      </ol>
    </section>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  

    <div class="box box-primary">

      <div class="box-header with-border">
        <h3 class="box-title"><b>Registro de Nuevo Tercero</b></h3>
      </div>
  
      <div class="box-body">

        <form action="{{ route('nuevoTercero') }}" method="POST">
          {{ csrf_field() }}
          
          <div class="form-group">
            <label for="nombreTercero">Nombres del Tercero</label>
            <input type="text" name="nombreTercero" value="" class="form-control" placeholder="Nombre del tercero"> 
          </div>

          <div class="form-group">
            <input type="text" name="rifTercero" value="" class="form-control" placeholder="Rif">
          </div>

        <div class="form-group pull-right">
          <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
          @if(Auth::user()->vista==='2')
            <a href="terceros" class="btn btn-danger">Regresar</a>
          @else
            <a href="terceros.listado" class="btn btn-danger">Regresar</a>
          @endif
        </div>

        </form>
        
      </div> <!-- box-body -->
  
      <div class="box-footer">
        <div class="pull-right">
            <small>Sistema {{ config('app.name','Laravel') }}</small>
        </div>
      </div>

    </div><!-- box-primary -->

  </div><!-- col-lg-6 -->
</div><!-- row -->
</div>

@endsection