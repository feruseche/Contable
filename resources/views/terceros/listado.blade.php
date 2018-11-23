@extends('inicio.app')
@section('contenido')

<div class="content">
    <div class="row">
        <section class="content-header">
            <h1>
                <a href="terceros.listado"><button type="button" class="btn btn-info"><i class="fa fa-table"></i></button></a>
                <a href="terceros"><button type="button" class="btn btn-info"><i class="fa fa-th-large"></i></button></a>
                 {{ $nRegistros }} Terceros
                <small>personas naturales y jurídicas</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="home"><i class="fa fa-dashboard"></i> Principal</a></li>
                <li><a href="terceros.listado">Terceros</a></li>
                <li class="active">Listado General</li>
            </ol>
        </section>

        <section class="content-header">
            @if ($searchText)
                La lista está filtrada por el texto "{{ $searchText }}"   y se encontraron "{{ $nr }}" coincidencia(s).
            @endif 
            @include('terceros.searchListado')
        </section>

    </div>

    <div class="box">
        <div class="box-body no-padding">
            <table class="table table-striped">
            <tbody>
                <tr class="info">
                    <th>NOMBRE O RAZÓN SOCIAL</th>
                    <th>RIF</th>
                </tr>
                @foreach($terceros as $tercero)
                    <tr> 
                        <td><a href="editaTercero?id={{$tercero->idTercero}}">{{ $tercero->tercero }}</a></td>
                        <td><a href="editaTercero?id={{$tercero->idTercero}}">{{ $tercero->rif }}</a></td>
                    </tr>
                @endforeach                
            </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    
</div>
@endsection
@push('scripts')
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endpush