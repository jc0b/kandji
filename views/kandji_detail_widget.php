<div class="col-lg-4">
    <h4 data-i18n="kandji.title"></h4>
    <table id="kandji-data" class="table"></table>
</div>

<script>
$(document).on('appReady', function(){
	// Get kandji data
    var kandji_tenant_address = "<?php configAppendFile(__DIR__ . '/../config.php'); echo rtrim(conf('kandji_tenant_address'), '/'); ?>"; // Get the Kandji server address
	$.getJSON( appUrl + '/module/kandji/get_data/' + serialNumber, function( data ) {
            $('#kandji-data')
                .append($('<tbody>')
                    .append($('<tr>')
                        .append($('<th>')
                            .text(i18n.t('kandji.blueprint_name')))
                        .append($('<td>')
                            .text(data.blueprint_name)))
                    .append($('<tr>')
                        .append($('<th>')
                            .text(i18n.t('kandji.full_name')))
                        .append($('<td>')
                            .text(data.full_name)))
                    .append($('<tr>')
                        .append($('<th>')
                            .text(i18n.t('kandji.email_address')))
                        .append($('<td>')
                            .text(data.email_address)))
                    .append($('<tr>')
                        .append($('<th>')
                            .text(i18n.t('kandji.blueprint_name')))
                        .append($('<td>')
                            .text('<a class="btn btn-default btn-xs" href="'+kandji_tenant_address+'/devices/'+data.kandji_id+'" target="_blank" title="'+i18n.t('kandji.kandji_id_short')+'">'+data.kandji_id+'</a>'))));
    });
});
</script>