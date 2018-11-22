@extends('inicio.app')
@section('contenido')

<div class="content">

<div class="row">

  <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">  

    <div class="box box-primary">

      <div class="box-header with-border">
        <h3 class="box-title"><b>Registro de Nuevo Contribuyente</b></h3>
      </div>
  
      <div class="box-body">

        <form action="{{ route('nuevoContribuyente') }}" method="POST">
          {{ csrf_field() }}
          
          <div class="form-group">
            <label for="nombreContribuyente">Nombres del Contribuyente</label>
            <input type="text" name="nombreContribuyente" value="" class="form-control" placeholder="Nombre del contribuyente"> 
          </div>

          <div class="form-group">
            <input type="text" name="rifContribuyente" value="" class="form-control" placeholder="Rif">
          </div>

          <div class="form-group">
            <input type="phone" name="nitContribuyente" value="" class="form-control" placeholder="Nit"> 
          </div>

          <div class="form-group">
            <input type="email" name="emailContribuyente" value="" class="form-control" placeholder="Email">
          </div>

          <div class="form-group">
            <input type="text" name="direccionContribuyente" value="" class="form-control" placeholder="Dirección Fiscal"> 
          </div>
<!--
          <div class="form-group">
            <label for="usuarioPortal">Usuario del Portal Web</label>
            <input type="text" name="usuarioPortal" class="form-control" placeholder="Usuario del portal web">
          </div>

          <div class="form-group">
            <label for="clavePortal" class="form-group">Clave del Portal Web</label>
            <input type="text" class="form-control" name="clavePortal" placeholder="Clave del portal web">          
          </div>

          <div class="form-group">
            <label for="ciudad">Ciudad del RIF del Contribuyente</label>
            <input type="text" class="form-control" name="ciudad" placeholder="Ciudad registrada en el RIF">
          </div>

          <div class="form-group">
            <label for="estado">Estado del RIF del Contribuyente</label>
            <input type="text" class="form-control" name="estado" placeholder="Estado registrado en el RIF">
          </div>
          
          <div class="form-group">
            <label for="actividad">Actividad Económica</label>
            <input type="text" name="actividad" class="form-control" placeholder="Actividad que desarrolla el contribuyente">
          </div>

          <div class="form-group">
            <label for="udi">Último día de Imposición</label>
            <input type="date" name="udi" class="form-control" placeholder="Último dia de imposición">
          </div>          

          <div class="form-group">
            <label for="exedente">Exedente de Créditos Fiscales</label>
            <input type="number" min="0" value="0" class="form-control" name="exedente" placeholder="Indique si hay exedentes">
          </div>

          <div class="form-group">
            <label for="retencionesAcumuladas">Retenciones Acumuladas</label>
            <input type="number" class="form-control" value="0" name="retencionesAcumuladas" placeholder="Idique retenciones acumuladas de meses anteriores"  min="0">
          </div>

          <div class="form-group">
            <label for="fechaElaboracion">Fecha de Elaboración de Última Planilla</label>
            <input type="date" class="form-control" name="fechaElaboracion" placeholder="Fecha de última planilla">
          </div>

          <div class="form-group">
            <label for="alicuotaG">Alicuota General</label>
            <input type="number" name="alicuotaG" value="0" class="form-control" placeholder="Alicuota general impuesta" min="0" max="100" step="1">
          </div>

          <div class="form-group">
            <label for="alicuotaR">Alicuta Reducida</label>
            <input type="number" class="form-control" value="0" name="alicuotaR" placeholder="Alicuota reducida impuesta" min="0" max="100" step="1">
          </div>

          <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <input type="text" class="form-control" name="observaciones" placeholder="Indique observaciones generales">
          </div>
-->
          <div class="form-group">
            <label for="estatus">Estatus del Contribuyente en el Sistema</label>
            <select name="estatus" id="estatus" class="form-control">
              <option value="1">Activo</option>
              <option value="0">Suspendido</option>
            </select>
          </div>


        <div class="form-group pull-right">
          <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
          @if(Auth::user()->vista==='2')
            <a href="contribuyentes" class="btn btn-danger">Regresar</a>
          @else
            <a href="contribuyentes.listado" class="btn btn-danger">Regresar</a>
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