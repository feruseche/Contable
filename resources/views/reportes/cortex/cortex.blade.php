@extends('inicio.app')
@section('contenido')

<?php
  $fecha = $datos->fecha;
  $fecha = date("d-m-Y");
?>
<div class="content" id="corteX">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <h3 class="box-title">SAPVEM - Peaje : {{ $peaje->nombrePeaje }}</h3>

        <table class="table responsive">
          
	          <tr>
            <td colspan="2">
              <small class="text-muted">Dirección : </small>{{ $peaje->direccionPeaje }}<br/>
              <small class="text-muted">Teléfonos : </small>{{ $peaje->telefonosPeaje }}<br/>
              <small class="text-muted">Email : </small>{{ $peaje->emailCoordinador }}<br/>
              <!-- <small class="text-muted">Director : </small>{{ $peaje->coordinadorPeaje }}<br/> -->              
            </td>
            <td>
              <div style="text-align: right;">
                Jornada del {{ $fecha }}<br />
                Turno ({{$datos->numeroTurno}}) - Bloque ({{$datos->bloque}}) - Canal ({{$datos->cabina}}).
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <h4 center>DESGLOSE</h4>
            </td>
          </tr>
          <tr>
            <td>
                <input type="text" size="7" value="{{ number_format($datos->d11,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 100.000</small><br />
                <input type="text" size="7" value="{{ number_format($datos->d10,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 20.000</small><br />
                <input type="text" size="7" value="{{ number_format($datos->d9,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 10.000</small><br />
                <input type="text" size="7" value="{{ number_format($datos->d8,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 5.000</small><br />
                <input type="text" size="7" value="{{ number_format($datos->d7,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 2.000</small><br />
                <input type="text" size="7" value="{{ number_format($datos->d6,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 1.000</small><br />          
            </td>
            <td>
                <input type="text" size="7" value="{{ number_format($datos->d5,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 500</small><br />          
                <input type="text" size="7" value="{{ number_format($datos->d4,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 100</small><br />
                <input type="text" size="7" value="{{ number_format($datos->d3,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 50</small><br />
                <input type="text" size="7" value="{{ number_format($datos->d2,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 20</small><br />
                <input type="text" size="7" value="{{ number_format($datos->d1,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Billetes 10</small><br />
            </td>
            <td>
                <input type="text" value="{{ number_format($datos->montoSistema,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Total Sistema</small><br />
                <input type="text" value="{{ number_format($datos->montoManual,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> Total Recaudadora</small><br />
                <input type="text" value="+{{ number_format($datos->sobrante,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> (+) Sobrante</small><br />
                <input type="text" value="-{{ number_format($datos->faltante,0,',','.') }}" disabled="disabled" style="text-align: right;"><small class="text-muted"> (-) Faltante</small><br />
            </td>
          </tr>
          <tr>
            <td colspan="3">
              
            </td>
          </tr>
          <tr>
            <td style="text-align: center;">
              ----------------------------------------<br />
              {{ $datos->operador }}<br />
              Operador
            </td>
            <td style="text-align: center;">
              ----------------------------------------<br />
              {{ $datos->supervisor }}<br />
              Supervisor
            </td>
            <td style="text-align: center;">
              ----------------------------------------<br />
              <br />
              Tesorero
            </td>
          </tr>
        </table>
        
    </div>
  </div>
  <div style="margin-top: 25px; text-align: center;">
    <input type="button" id="imprimir" name="Imprimir" value="Imprimir Corte">
  </div>
</div>


@push ('scripts')
<script type="text/javascript">

  $(document).ready(function(){
        
    $('#imprimir').click(function(){

    document.getElementById('imprimir').style.display="none";
   //   window.print(); 
   //   window.location='jornadas';

      $('#corteX').printThis();        
   //   window.location='jornadas';

    });   

  });

</script>
@endpush
@endsection
