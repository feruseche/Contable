@extends('inicio.app')
@section('contenido')
 

  <div class="content">

    <section class="content-header">
      <h1>
         Archivos de {{ $empresa->empresa }}
        <small>{{ $empresa->rif }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Principal</a></li>
        @if(Auth::user()->vista=='2')
          <li><a href="empresas">Empresas</a></li>
        @else
          <li><a href="empresas.listado">Empresas</a></li>
        @endif
        <li class="active">{{ $empresa->empresa }}</li>
      </ol>
    </section>

    <section class="content-header">
      
    </section>

      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_3-1" data-toggle="tab" aria-expanded="true">Datos</a></li>
            <li class=""><a href="#tab_2-1" data-toggle="tab" aria-expanded="false">Compras</a></li>
            <li class=""><a href="#tab_1-1" data-toggle="tab" aria-expanded="false">Ventas</a></li>
            <li class=""><a href="#tab_0-1" data-toggle="tab" aria-expanded="false">99030</a></li>            
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="tab_0-1">
              <b>Planilla 99030:</b>
          </div><!-- tab-1 -->


          <div class="tab-pane" id="tab_1-1">
            <div class="form-group" id="select-tercero">
              {!! Form::open(['route' => ['buscaFacturaManual'],'method'=>'post','id'=>'formulario']) !!}
            {{ csrf_field() }}  

              <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="idtercero" id="idtercero">
                @foreach($terceros as $tercero)
                  <option data-subtext="{{$tercero->rif}}" value="{{$tercero->idTercero}}">{{$tercero->tercero}}</option>
                @endforeach
              </select>
              <input type="button" value="Seleccionar" id="Seleccionar" name="Seleccionar">
            </div>
            <div class="submenu" style="display: none;" id="submenu">
              @include('ventas.index')
            </div>

             {!! Form::close() !!}
          </div><!-- tab-1 -->

          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2-1">
            <b>Libro de Compras:</b>
          </div><!-- tab-2 -->
          <div class="tab-pane active" id="tab_3-1">

                  <form action="{{ route('updateEmpresa') }}" method="POST">
                    {{ csrf_field() }}

                      
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">  
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title"><b>Datos Básicos</b></h3>
                          </div>
                          <div class="box-body">
                            <div class="form-group">
                              <input type="text" name="nombreEmpresa" value="{{$empresa->empresa}}" class="form-control" placeholder="Nombre de la empresa"> 
                              <input type="hidden" name="idEmpresa" value="{{$empresa->idEmpresa}}">
                            </div>
                            <div class="form-group">
                              <input type="email" name="emailEmpresa" value="{{$empresa->email}}" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                              <input type="text" name="telefonoFijo" value="{{$empresa->telefonoFijo}}" class="form-control" placeholder="Teléfono Fijo">
                            </div>
                            <div class="form-group">
                              <input type="text" name="celular" value="{{$empresa->celular}}" class="form-control" placeholder="Celular de la empresa">
                            </div>                          
                            <div class="form-group">
                              <input type="text" name="contacto" value="{{$empresa->contacto}}" class="form-control" placeholder="Persona de Contácto">
                            </div>
                            <div class="form-group">
                              <input type="text" name="webSite" value="{{$empresa->website}}" class="form-control" placeholder="Página web">
                            </div>
                            <div class="form-group">
                              <input type="text" name="actividad" class="form-control" value="{{$empresa->actividad}}" placeholder="Actividad que desarrolla">
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
                              <input type="text" name="rifEmpresa" value="{{$empresa->rif}}" class="form-control" placeholder="Rif">
                            </div>
                            <div class="form-group">
                              <input type="text" name="nitEmpresa" value="{{$empresa->nit}}" class="form-control" placeholder="Nit"> 
                            </div>                            
                            <div class="form-group">
                              <input type="text" name="usuarioPortal" class="form-control" value="{{$empresa->usuario}}" placeholder="Usuario del portal web">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="clavePortal" value="{{$empresa->clave}}" placeholder="Clave del portal web">          
                            </div>
                            <div class="form-group">
                              <input type="text" name="direccionEmpresa" value="{{$empresa->direccion}}" class="form-control" placeholder="Dirección de la empresa"> 
                            </div>                              
                            <div class="form-group">
                              <input type="text" class="form-control" name="ciudad" value="{{$empresa->ciudad}}" placeholder="Ciudad registrada en el RIF">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="estado" value="{{$empresa->estado}}" placeholder="Estado registrado en el RIF">
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
                              <input type="date" name="udi" class="form-control" value="{{$empresa->ultimoDiaImposicion}}" placeholder="Último dia de imposición">
                            </div>          
                            <div class="form-group">
                              <input type="number" min="0" class="form-control" value="{{$empresa->exedenteCreditosFiscales}}" name="exedente" placeholder="Exedentes">
                            </div>
                            <div class="form-group">
                              <input type="number" class="form-control" value="{{$empresa->retencionesAcumuladas}}" name="retencionesAcumuladas" placeholder="Retenciones acumuladas"  min="0">
                            </div>
                            <div class="form-group">
                              <label for="fechaElaboracion">Elaboración de Última Planilla</label>
                              <input type="date" class="form-control" name="fechaElaboracion" value="{{$empresa->fechaElaboracion}}" placeholder="Fecha de última planilla 99030">
                            </div>
                            <div class="form-group">
                              <input type="number" name="alicuotaG" class="form-control" value="{{$empresa->alicuotaGeneral}}" placeholder="Alicuota general" min="0" max="100" step="1">
                            </div>
                            <div class="form-group">
                              <input type="number" class="form-control" value="{{$empresa->alicuotaReducida}}" name="alicuotaR" placeholder="Alicuota reducida" min="0" max="100" step="1">
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
                              <input type="text" class="form-control" name="observaciones" value="{{$empresa->observaciones}}" placeholder="Observaciones generales">
                            </div>                                                 
                            <div class="form-group">
                              <label for="estatus">Estatus de la Empresa</label>
                              <select name="estatus" id="estatus" class="form-control">
                                @if($empresa->estatus == '1')
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
                    
                    <div class="box-footer">   
                      <div class="form-group">
                        <div class="pull-right">
                          <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Actualizar</button>
                          <button class="btn btn-danger" type="reset">Reset</button>
                          @if(Auth::user()->vista=='2')
                            <a href="empresas" class="btn btn-danger">Regresar</a>
                          @else
                            <a href="empresas.listado" class="btn btn-danger">Regresar</a>
                          @endif
                        </div>
                      </div> 
                    </div>                        

                  </div><!-- col-lg -->


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
@push('scripts')
<script>
  $(document).ready(function(){

    
    $("#Seleccionar").click(function(){

      $("#submenu").css("display","block");
      

    });



  });
</script>
@endpush