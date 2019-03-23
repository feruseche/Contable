@extends('inicio.app')
@section('contenido')

<div class="content">     
<div class="row">

  <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">  

    <div class="box box-primary">

      <div class="box-header with-border">
        <h3 class="box-title">Registro de Nuevo Producto</h3>
      </div>
  
      <div class="box-body">

        <form action="{{ route('nuevoProducto') }}" method="POST">
          {{ csrf_field() }}
          
          <div class="form-group">
            <label for="nombre">Nombre del producto</label>
            <input type="text" name="nombre" value="" class="form-control" placeholder="Nombre del Producto..."> 
          </div>

          <div class="form-group">
            <label for="codigo">Código del producto</label>
            <input type="text" name="codigo" value="" class="form-control" placeholder="Código del producto...">
          </div>

          <div class="form-group">
            <label for="existencia">Existencia</label>
            <input type="number" name="existencia" min="0" class="form-control" placeholder="Existencia..."> 
          </div>

          <div class="form-group">
            <label for="bodega">Bodega</label>
            <select name="bodega">
              <option value="1">Cabecera</option>
              <option value="2">Cañaveral</option>
              <option value="3">Centro</option>
            </select> 
          </div>          

          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" value="" class="form-control" placeholder="Descripción el producto...">
          </div>

          <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado">
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
              <option value="Pendiente">Pendiente</option>
            </select> 
          </div>


        <div class="form-group pull-right">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <a href="productos" class="btn btn-danger"><i class="fa fa-users"></i> Regresar a la lista</a>
        </div>

        </form>
        
      </div> <!-- box-body -->
  
      <div class="box-footer">
          <div class="pull-right">Avances Software</div>
      </div>

    </div><!-- box-primary -->

  </div><!-- col-lg-6 -->
</div><!-- row -->
</div><!-- content -->

@endsection