      <div class="content">      
                          
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-btn">
                    <input type="text" class="form-control" name="numeroFactura" value="000123" class="form-control" placeholder="Número de la Factura Manual">
                    <button type="button" class="btn btn-primary" name="buscarFactura" id="buscarFactura">Buscar</button>
                  </span>
                </div>
              </div>
          </div>

            <div name="datosFactura" id="datosFactura" style="display: none;">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">  
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label for "fechaEmision">Fecha de Emisión</label>
                  <input type="date" name="fechaEmision" id="fechaEmision" value="" class="form-control" placeholder="Fecha de Emisión" alt="Fecha de Emisión">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label for "fechaRecepcion">Fecha de Recepción</label>
                  <input type="date" name="fechaRecepcion" id="fechaRecepcion" value="" class="form-control" placeholder="Fecha de Recepción" alt="Fecha de Recepción">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label for "numeroControl">Número de Control</label>
                  <input type="text" name="numeroControl" id="numeroControl" value="" class="form-control" placeholder="Número de Control de la Factura Manual">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label for "baseimponible">Base Imponible</label>
                  <input type="number" name="baseimponible" id="baseimponible" class="form-control" value="" placeholder="Base Imponible" step="0,1" min="0">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label for "alicuota12">Base al 16%</label>
                  <input type="number" name="alicuota12" id="alicuota12" class="form-control" value="" placeholder="Base al 16%" min="0" step="0,1">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label for "iva12">IVA al 16%</label>
                  <input type="number" name="iva12" id="iva12" class="form-control" value="" placeholder="IVA al 16%" min="0" max="100" step="0,1">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label for "alicuota8">Base al 10%</label>
                  <input type="number" name="alicuota8" id="alicuota8" class="form-control" value="" placeholder="Base al 10%" min="0" step="0,1">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label for "iva8">IVA al 10%</label>
                  <input type="number" name="iva8" id="iva8" class="form-control" value="" placeholder="IVA al 10%" min="0" max="100" step="0,1">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label for "ivaRetenido">IVA Retenido</label>
                  <input type="number" name="ivaRetenido" id="ivaRetenido" class="form-control" value="" placeholder="IVA Retenido" min="0" step="0,1">
                </div>              
              </div>
            </div>
          </div><!-- box-primary -->
        

@push('scripts')
<script>
  $(document).ready(function(){

    
    $("#buscarFactura").click(function(){

        var form= $('#formulario');
        var url = form.attr('action');
        var data = form.serialize();

/*        $.ajax({
              type: 'POST',
              url: form.attr('action'),
              data: form.serialize(),
              dataType: 'json',
              beforeSend: function() {
                $('#numeroControl').html('Saving ...');
              }.
              success: function(response) {
                if (response["status"] === 'ok'){
                  $('#numeroFactura').html('Save data');
                }else{
                  $('#numeroFactura').html(response['status']);
                };
              },
            });
*/

        $.post(url,data,function(result){
          //var valores=result;
          console.log(result);
          $("#fechaEmision").val(result[0].emision);
          $("#fechaRecepcion").val(result[0].recepcion);
          $("#numeroControl").val(result[0].numeroControl);
          $("#baseimponible").val(result[0].baseImponible);
          $("#alicuota12").val(result[0].alicuotaGeneral);
          $("#iva12").val(result[0].ivaG);
          $("#alicuota8").val(result[0].alicuotaReducida);
          $("#iva8").val(result[0].ivaR);
          $("#ivaRetenido").val(result[0].ivaRetenido);
          $("#datosFactura").css("display","block");  
        }); //$.post ajax

    }); // #buscarfactura

  }); //document.ready
</script>
@endpush