@extends('inicio.app')
@section('contenido')

<?php
  foreach($contribuyentes as $contribuyente){
    $empresa = $contribuyente->contribuyente;
  }
?>

  <div class="content">

      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
            <li class=""><a href="#tab_0-1" data-toggle="tab" aria-expanded="false">99030</a></li>
            <li class=""><a href="#tab_1-1" data-toggle="tab" aria-expanded="false">Ventas</a></li>
            <li class=""><a href="#tab_2-1" data-toggle="tab" aria-expanded="false">Compras</a></li>
            <li class="active"><a href="#tab_3-1" data-toggle="tab" aria-expanded="true">Datos</a></li>
            <li class="pull-left header"><i class="fa fa-folder"></i> {{ $empresa }}</li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="tab_0-1">
              <b>Planilla 99030:</b>
          </div><!-- tab-1 -->
          <div class="tab-pane" id="tab_1-1">
              <b>Libro de Ventas:</b>
          </div><!-- tab-1 -->
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2-1">
            <b>Libro de Compras:</b>
          </div><!-- tab-2 -->
          <div class="tab-pane active" id="tab_3-1">

                  <form action="{{ route('updateContribuyente') }}" method="POST">
                    {{ csrf_field() }}

                      @foreach($contribuyentes as $contribuyente)
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">  
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title"><b>Datos Básicos</b></h3>
                          </div>
                          <div class="box-body">
                            <div class="form-group">
                              <input type="text" name="nombreContribuyente" value="{{$contribuyente->contribuyente}}" class="form-control" placeholder="Nombre del contribuyente"> 
                              <input type="hidden" name="idContribuyente" value="{{$contribuyente->idContribuyente}}">
                            </div>
                            <div class="form-group">
                              <input type="email" name="emailContribuyente" value="{{$contribuyente->email}}" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                              <input type="text" name="telefonoFijo" value="{{$contribuyente->telefonoFijo}}" class="form-control" placeholder="Teléfono Fijo">
                            </div>
                            <div class="form-group">
                              <input type="text" name="celular" value="{{$contribuyente->celular}}" class="form-control" placeholder="Celular de la empresa">
                            </div>                          
                            <div class="form-group">
                              <input type="text" name="contacto" value="{{$contribuyente->contacto}}" class="form-control" placeholder="Persona de Contácto">
                            </div>
                            <div class="form-group">
                              <input type="text" name="webSite" value="{{$contribuyente->website}}" class="form-control" placeholder="Página web">
                            </div>
                            <div class="form-group">
                              <input type="text" name="actividad" class="form-control" value="{{$contribuyente->actividad}}" placeholder="Actividad que desarrolla">
                              </div>
                          </div><!-- box-body -->
                        </div><!-- box-primary -->
                      </div><!-- col-lg -->

                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">  
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title"><b>Registro SENIAT</b></h3>
                          </div>
                          <div class="box-body">
                            <div class="form-group">
                              <input type="text" name="rifContribuyente" value="{{$contribuyente->rif}}" class="form-control" placeholder="Rif">
                            </div>
                            <div class="form-group">
                              <input type="text" name="nitContribuyente" value="{{$contribuyente->nit}}" class="form-control" placeholder="Nit"> 
                            </div>                            
                            <div class="form-group">
                              <input type="text" name="usuarioPortal" class="form-control" value="{{$contribuyente->usuario}}" placeholder="Usuario del portal web">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="clavePortal" value="{{$contribuyente->clave}}" placeholder="Clave del portal web">          
                            </div>
                            <div class="form-group">
                              <input type="text" name="direccionContribuyente" value="{{$contribuyente->direccion}}" class="form-control" placeholder="Dirección del Contribuyente"> 
                            </div>                              
                            <div class="form-group">
                              <input type="text" class="form-control" name="ciudad" value="{{$contribuyente->ciudad}}" placeholder="Ciudad registrada en el RIF">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="estado" value="{{$contribuyente->estado}}" placeholder="Estado registrado en el RIF">
                            </div>
                          </div><!-- box-body -->
                        </div><!-- box-primary -->
                      </div><!-- col-lg -->

                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">  
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title"><b>Datos SENIAT</b></h3>
                          </div>
                          <div class="box-body">
                            <div class="form-group">
                              <label for="udi">Último día de Imposición</label>
                              <input type="date" name="udi" class="form-control" value="{{$contribuyente->ultimoDiaImposicion}}" placeholder="Último dia de imposición">
                            </div>          
                            <div class="form-group">
                              <input type="number" min="0" class="form-control" value="{{$contribuyente->exedenteCreditosFiscales}}" name="exedente" placeholder="Exedentes">
                            </div>
                            <div class="form-group">
                              <input type="number" class="form-control" value="{{$contribuyente->retencionesAcumuladas}}" name="retencionesAcumuladas" placeholder="Retenciones acumuladas"  min="0">
                            </div>
                            <div class="form-group">
                              <label for="fechaElaboracion">Elaboración de Última Planilla</label>
                              <input type="date" class="form-control" name="fechaElaboracion" value="{{$contribuyente->fechaElaboracion}}" placeholder="Fecha de última planilla 99030">
                            </div>
                            <div class="form-group">
                              <input type="number" name="alicuotaG" class="form-control" value="{{$contribuyente->alicuotaGeneral}}" placeholder="Alicuota general" min="0" max="100" step="1">
                            </div>
                            <div class="form-group">
                              <input type="number" class="form-control" value="{{$contribuyente->alicuotaReducida}}" name="alicuotaR" placeholder="Alicuota reducida" min="0" max="100" step="1">
                            </div>
                          </div><!-- box-body -->
                        </div><!-- box-primary --> 
                      </div><!-- col-lg -->

                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">  
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title"><b>Generales</b></h3>
                          </div>
                          <div class="box-body">  
                            <div class="form-group">
                              <label for="observaciones">Observaciones</label>
                              <input type="text" class="form-control" name="observaciones" value="{{$contribuyente->observaciones}}" placeholder="Observaciones generales">
                            </div>                                                 
                            <div class="form-group">
                              <label for="estatus">Estatus del Contribuyente</label>
                              <select name="estatus" id="estatus" class="form-control">
                                @if($contribuyente->estatus == '1')
                                  <option value="1" Active>Activo</option>
                                  <option value="0">Suspendido</option>
                                @else
                                  <option value="0" Active>Suspendido</option>
                                  <option value="1">Activo</option>
                                @endif
                              </select>
                            </div>
                            </div><!-- box-body -->
                        
                        
                        </div><!-- box-body -->
                        </div><!-- box-primary --> 
                      </div><!-- col-lg -->

                      @endforeach
                    
                    <div class="box-footer">   
                      <div class="form-group">
                        <div class="pull-right">
                          <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Actualizar</button>
                          <button class="btn btn-danger" type="reset">Reset</button>
                          @if(Auth::user()->vista=='2')
                            <a href="contribuyentes" class="btn btn-danger">Regresar</a>
                          @else
                            <a href="contribuyentes.listado" class="btn btn-danger">Regresar</a>
                          @endif
                        </div>
                      </div> 
                    </div>
                  </form>
                </div><!-- box-body -->
                <div class="box-footer">
                </div><!-- box-footer -->
              </div><!-- box-primary -->

          </div> <!-- tab-3 -->

        </div><!-- tab-content -->
      </div> <!-- nav-tabs-custom -->          

  </div> <!-- row -->


@endsection