@extends('inicio.app')
@section('contenido')


  <div class="content">

<section class="content-header">
      <h1>
         Archivos del Tercero {{ $tercero->tercero }}
        <small>{{ $tercero->rif }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Principal</a></li>
        @if(Auth::user()->vista=='2')
          <li><a href="terceros">Terceros</a></li>
        @else
          <li><a href="terceros.listado">Terceros</a></li>
        @endif
        <li class="active">{{ $tercero->tercero }}</li>
      </ol>
    </section>

    <section class="content-header">
      
    </section>

      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_0-1" data-toggle="tab" aria-expanded="true">Datos</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_0-1">

                  <form action="{{ route('updateTercero') }}" method="POST">
                    {{ csrf_field() }}

                   
                   

                    <div class="box-footer">   
                      <div class="form-group">
                        <div class="pull-right">
                          <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Actualizar</button>

                          <button class="btn btn-danger" type="reset">Reset</button>
                          @if(Auth::user()->vista=='2')
                            <a href="terceros" class="btn btn-danger">Regresar</a>
                          @else
                            <a href="terceros.listado" class="btn btn-danger">Regresar</a>
                          @endif
                          <a href="terceros.listado" class="btn btn-danger">Prueba</a>
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