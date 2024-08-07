<?php $this->view('partials/head'); ?>

<?php // Initialize models needed for the table
new Machine_model;
new Reportdata_model;
new Kandji_model;
?>

<div class="container">
  <div class="row">
  	<div class="col-lg-12">
      <h3><span data-i18n="kandji.report"></span> <span id="total-count" class='label label-primary'>…</span></h3>
      <table class="table table-striped table-condensed table-bordered">
        <thead>
          <tr>
            <th data-i18n="listing.computername" data-colname='machine.computer_name'></th>
            <th data-i18n="serial" data-colname='reportdata.serial_number'></th>
            <th data-i18n="kandji.kandji_agent_version" data-colname='kandji.kandji_agent_version'></th>
            <th data-i18n="kandji.realname" data-colname='kandji.realname'></th>
            <th data-i18n="kandji.last_check_in" data-colname='kandji.last_check_in'></th>
            <th data-i18n="kandji.passport_enabled" data-colname='kandji.passport_enabled'></th>
            <th data-i18n="kandji.last_enrollment" data-colname='kandji.last_enrollment'></th>
            <th data-i18n="kandji.device_id_short" data-colname='kandji.device_id'></th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td data-i18n="listing.loading" colspan="7" class="dataTables_empty"></td>
            </tr>
        </tbody>
      </table>
    </div> <!-- /span 12 -->
  </div> <!-- /row -->
</div>  <!-- /container -->

<script type="text/javascript">

	$(document).on('appUpdate', function(e){

		var oTable = $('.table').DataTable();
		oTable.ajax.reload();
		return;

	});
    
	$(document).on('appReady', function(e, lang) {
		// Get column names from data attribute
		var columnDefs = [],
           	col = 0; // Column counter
		$('.table th').map(function(){
              		columnDefs.push({name: $(this).data('colname'), targets: col});
             		col++;
		});
	    oTable = $('.table').dataTable( {
	        columnDefs: columnDefs,
	        ajax: {
                url: appUrl + '/datatables/data',
                type: "POST",
                data: function(d){
                    d.mrColNotEmpty = "kandji.device_id"
                }
            },
            dom: mr.dt.buttonDom,
            buttons: mr.dt.buttons,
	        createdRow: function( nRow, aData, iDataIndex ) {
	        	// Update name in first column to link
	        	var name=$('td:eq(0)', nRow).html();
	        	if(name == ''){name = "No Name"};
	        	var sn=$('td:eq(1)', nRow).html();
	        	var link = mr.getClientDetailLink(name, sn, '#tab_kandji-tab');
	        	$('td:eq(0)', nRow).html(link);
	        	// Make serial number in second column link to Kandji
	        	var serial=$('td:eq(1)', nRow).html();
	        	var device_id=$('td:eq(7)', nRow).html();
            var kandji_tenant_address = "<?php configAppendFile(__DIR__ . '/../config.php'); echo rtrim(conf('kandji_tenant_address'), '/'); ?>"; // Get the Kandji server address
	        	var link = '<a class="btn btn-default btn-xs" href="'+kandji_tenant_address+'/devices/'+device_id+'" target="_blank" title="'+i18n.t('kandji.view_in_kandji')+'">'+serial+'</a>';
	        	$('td:eq(1)', nRow).html(link);

	        	// Format last_check_in timestamp
	        	var date = parseInt($('td:eq(4)', nRow).html())*1000;
	        	$('td:eq(4)', nRow).html('<span title="'+moment(date).format('llll')+'">'+moment(date).fromNow()+'</span>');

	        	// Format last_enrollment timestamp
	        	var date = parseInt($('td:eq(6)', nRow).html())*1000;
	        	$('td:eq(6)', nRow).html('<span title="'+moment(date).format('llll')+'">'+moment(date).fromNow()+'</span>');
	        }
	    });
	});
</script>

<?php $this->view('partials/foot'); ?>
