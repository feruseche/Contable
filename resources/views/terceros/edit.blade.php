@extends('inicio.app')
@section('contenido')

<?php
  foreach($terceros as $tercero){
    $tercero = $tercero->tercero;
  }
?>

  <div class="content">

      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#tab_0-1" data-toggle="tab" aria-expanded="true">Datos</a></li>
            <li class="pull-left header"><i class="fa fa-folder"></i> {{ $tercero }}</li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_0-1">

                  <form action="{{ route('updateTercero') }}" method="POST">
                    {{ csrf_field() }}

                   

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <div class="row-fluid">
          <select class="selectpicker" data-show-subtext="true" data-live-search="true">
            <option data-subtext="Rep California">Tom Foolery</option>
            <option data-subtext="Sen California">Bill Gordon</option>
            <option data-subtext="Sen Massacusetts">Elizabeth Warren</option>
            <option data-subtext="Rep Alabama">Mario Flores</option>
            <option data-subtext="Rep Alaska">Don Young</option>
            <option data-subtext="Rep California" disabled="disabled">Marvin Martinez</option>
          </select>
          <span class="help-inline">With <code>data-show-subtext="true" data-live-search="true"</code>. Try searching for california</span>
        </div>
      </div>
    </div>

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