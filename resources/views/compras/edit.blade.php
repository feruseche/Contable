@extends('inicio.app')
@section('contenido')

<div class="content">     
<div class="row">

  <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">  

    <div class="box box-primary">

      <div class="box-header with-border">
        <h3 class="box-title">Editar Registro de Producto</h3>
      </div>
  
      <div class="box-body">
        <form action="{{ route('updateProducto') }}" method="POST">
          {{ csrf_field() }}

              <div class="box-body">
                @foreach($productos as $producto)

                <?php 
                  $ruta_img = "img/productos/o".$producto->id.".jpg";
                  if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/productos/o0.jpg";}
                ?>        

                <div class="form-group">
                    <img src="{{ $ruta_foto }}" style="height: 128px" alt="foto del producto" class="img img-rounded">
                </div>

                <div class="form-group">
                  <label for="nombre">Nombre del Producto</label>
                  <input type="text" name="nombre" value="{{$producto->nombre}}" class="form-control" placeholder="Nombre del Producto"> 
                  <input type="hidden" name="idproducto" value="{{$producto->id}}">
                </div>

                <div class="form-group">
                  <label for="codigo">Código</label>
                  <input type="text" name="codigo" value="{{$producto->codigo}}" class="form-control" placeholder="Código del Producto">
                </div>

                <div class="form-group">
                  <label for="existencia">Existencia</label>
                  <input type="number" name="existencia" value="{{$producto->existencia}}" class="form-control" placeholder="Existencia"> 
                </div>

                <div class="form-group">
                  <label for="bodega">Bodega</label>
                  <input type="text" name="bodega" 
                    value="{{ $producto->idBodega==1 }}" class="form-control" placeholder="Bodega" disabled>
                  <select name="bodega">
                    <option value="1">Cabecera</option>
                    <option value="2">Cañaveral</option>
                    <option value="3">Centro</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" name="descripcion" value="{{$producto->descripcion}}" class="form-control" placeholder="Descripción"> 
                </div>

                <div class="form-group">
                  <label for="estado">Estado</label>
                  <input type="text" name="estado" value="{{$producto->estado}}" class="form-control" placeholder="Estado" disabled> 
                  <select name="estado">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                    <option value="Pendiente">Pendiente</option>
                  </select> 
                </div>

                @endforeach

              </div> <!-- /.box-body -->

              <div class="box-footer">
                <button class="btn btn-primary" type="submit">Actualizar</button>
                <button class="btn btn-danger" type="reset">Reset</button>
                <a href="productos" class="btn btn-danger"><i class="fa fa-users"></i> Regresar a la lista de productos</a>
              </div>
              <!-- /.box-footer -->
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