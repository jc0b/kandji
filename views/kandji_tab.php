<h2>Kandji  <a data-i18n="kandji.recheck" class="btn btn-default btn-xs" href="<?php echo url('module/kandji/recheck_kandji/' . $serial_number);?>"></a><span id="kandji_view_in"></span></h2>

<script>    
// $(document).on('appReady', function(e, lang) {

// 	// Get Kandji data
// 	$.getJSON( appUrl + '/module/kandji/get_data/' + serialNumber, function(data) {
// 		if( ! data['kandji_id']){
// 			$('#kandji-msg').text(i18n.t('no_data'));
// 		}else{

// 			// Hide
// 			$('#kandji-msg').text('');
// 			$('#kandji-view').removeClass('hide');

//             var kandji_tenant_address = "<?php configAppendFile(__DIR__ . '/../config.php'); echo rtrim(conf('kandji_tenant_address'), '/'); ?>"; // Get the Kandji server address
            
//             // Generate buttons and tabs
//             $('#kandji_view_in').html('<a data-i18n-"kandji.view_in_kandji" class="btn btn-default btn-xs" href="'+kandji_tenant_address+'/devices/'+data['kandji_id']+'" target="_blank" title="'+i18n.t('kandji.view_in_kandji')+'">View in Kandji</a>'); // View in Kandji button
            
//             $.each(data, function(i,d){
            
//                 // Generate rows from data
//                 var rows = ''
//                 for (var prop in d){
//                     console.log(d[prop])
//                     if (d[prop] == '' && d[prop] !== 0){
//                        // Do nothing for empty values to blank them
                    
//                     } else if(prop.indexOf('kandji_id') > -1 || prop == 'name' || prop == 'kandji_agent_version' || prop == 'asset_tag' || prop == 'last_check_in' || prop == 'last_enrollment' || prop == 'first_enrollment' || prop == 'blueprint_id' || prop == 'blueprint_name' || prop == 'realname' || prop == 'email_address'){
//                        rows = rows + '<tr><th>'+i18n.t('kandji.'+prop)+'</th><td>'+fileSize(d[prop], 2)+'</td></tr>';
                        
//                     } else {
//                        rows = rows + '<tr><th>'+i18n.t('kandji.'+prop)+'</th><td>'+d[prop]+'</td></tr>';
//                     }   
//                 }
//                 $('#kandji-tab')
//                     .append($('<h4>')
//                         .append($('<i>')
//                             .addClass('fa fa-server'))
//                         .append(' '+d.groupdate))
//                     .append($('<div style="max-width:550px;">')
//                         .addClass('table-responsive')
//                         .append($('<table>')
//                             .addClass('table table-striped table-condensed')
//                             .append($('<tbody>')
//                                 .append(rows))))
//             })
//         }

// 	});
// });

$(document).on('appReady', function(){
    $.getJSON( appUrl + '/module/kandji/get_data/' + serialNumber, function(data) {
        formatted_data = []
        formatted_data.push(data)
        data = formatted_data
        // Check if we have data
        if( ! data[0]['kandji_id']){
            $('#kandji-msg').text(i18n.t('no_data'));
        }else{

            // Hide
            $('#kandji-msg').text('');
            $('#kandji-view').removeClass('hide');

            var kandji_tenant_address = "<?php configAppendFile(__DIR__ . '/../config.php'); echo rtrim(conf('kandji_tenant_address'), '/'); ?>"; // Get the Kandji server address
            
            // Generate buttons and tabs
            $('#kandji_view_in').html('<a data-i18n-"kandji.view_in_kandji" class="btn btn-default btn-xs" href="'+kandji_tenant_address+'/devices/'+data['kandji_id']+'" target="_blank" title="'+i18n.t('kandji.view_in_kandji')+'">View in Kandji</a>'); // View in Kandji button

            var skipThese = ['id','serial_number'];
            $.each(data, function(i,d){

                // Generate rows from data
                var rows = ''
                for (var prop in d){
                    // Skip skipThese
                    if(skipThese.indexOf(prop) == -1){
                        // Do nothing for empty values to blank them
                        if (d[prop] == '' || d[prop] == null){
                            rows = rows

                        // Format date
                        } else if((prop == "last_check_in" || prop == "last_enrollment" || prop == "first_enrollment") && d[prop] > 0){
                            var date = new Date(d[prop] * 1000);
                            rows = rows + '<tr><th>'+i18n.t('kandji.'+prop)+'</th><td><span title="'+moment(date).fromNow()+'">'+moment(date).format('llll')+'</span></td></tr>';
                        // Else, build out rows from entries
                        } else {
                            rows = rows + '<tr><th>'+i18n.t('kandji.'+prop)+'</th><td>'+d[prop]+'</td></tr>';
                        }
                    }
                }

                $('#kandji-tab')
                    .append($('<div style="max-width:1000px;">')
                        .append($('<table>')
                            .addClass('table table-striped table-condensed')
                            .append($('<tbody>')
                                .append(rows))))
            })
        }
    });
});
    
// Make button groups active
$(".btn-group > .btn").click(function(){
    $(this).addClass("active").siblings().removeClass("active");
});

</script>
