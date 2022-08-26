<?php $this->view('partials/head'); 
  // Add local config
  configAppendFile(__DIR__ . '/../config.php');
?>

<div class="container">
    <div class="row"><span id="kandji_pull_all"></span></div>
    <div class="col-lg-6">
        <div id="GetAllKandji-Progress" class="progress hide">
            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 0%;">
                <span id="Progress-Bar-Percent"></span>
            </div>
        </div>
        <br id="Progress-Space" class="hide">
        <div id="Kandji-System-Status"></div>
    </div>
</div>  <!-- /container -->

<script>
var kandji_pull_all_running = 0;

$(document).on('appReady', function(e, lang) {

    // Generate pull all button and header    
    $('#kandji_pull_all').html('<h3 class="col-lg-6" >&nbsp;&nbsp;'+i18n.t('kandji.title_admin')+'&nbsp;&nbsp;<button id="GetAllKandji" class="btn btn-default btn-xs hide">'+i18n.t("kandji.pull_in_all")+'</button></h3>');

    // Get Kandji server URL
    var kandji_api_endpoint = "<?php echo rtrim(conf('kandji_api_endpoint'), '/'); ?>";

    // Check if Kandji lookups are enabled
    if ("<?php echo conf('kandji_enable'); ?>" == true) {
        var kandji_enabled = i18n.t('yes');
        var kandji_enabled_int = 1;
        $('#GetAllKandji').removeClass('hide');
    } else { 
        var kandji_enabled = i18n.t('no');
        var kandji_enabled_int = 0;
    }

    kandji_pull_all_running = 0;

    // Check if Kandji API password is set
    if (parseInt("<?php echo strlen(conf('kandji_api_key')); ?>") > 0) {
        var kandji_api_key = i18n.t('yes');    
    } else { 
        var kandji_api_key = i18n.t('no');
    }

    // Build table
    var kandjirows = '<table class="table table-striped table-condensed"><tbody>'
    kandjirows = kandjirows + '<tr><th>'+i18n.t('kandji.lookups_enabled')+'</th><td>'+kandji_enabled+'</td></tr>';
    kandjirows = kandjirows + '<tr><th>'+i18n.t('kandji.api_endpoint')+'</th><td><a target="_blank" href="'+kandji_api_endpoint+'">'+kandji_api_endpoint+'</a></td></tr>';
    kandjirows = kandjirows + '<tr><th>'+i18n.t('kandji.token_set')+'</th><td>'+kandji_api_key+'</td></tr>';

    $('#Kandji-System-Status').html(kandjirows+'</tbody></table>') // Close table framework and assign to HTML ID

    $('#GetAllKandji').click(function (e) {
        // Disable button and unhide progress bar
        $('#GetAllKandji').html(i18n.t('kandji.processing')+'...');
        $('#Progress-Bar-Percent').text('0%');
        $('#GetAllKandji-Progress').removeClass('hide');
        $('#Progress-Space').removeClass('hide');
        $('#GetAllKandji').addClass('disabled');
        kandji_pull_all_running = 1;

        // Get JSON of all serial numbers
        $.getJSON(appUrl + '/module/kandji/pull_all_kandji_data', function (processdata) {

            // Set count of serial numbers to be processed
            var progressmax = (processdata.length);
            var progessvalue = 0;;
            $('.progress-bar').attr('aria-valuemax', progressmax);

            var serial_index = 0;
            var serial = processdata[0]

            // Process the serial numbers
            process_serial(serial,progessvalue,progressmax,processdata,serial_index)
        });
    });
});

// Process each Kandji request one at a time
function process_serial(serial,progessvalue,progressmax,processdata,serial_index){

        // Get JSON for each serial number
        request = $.ajax({
        url: appUrl + '/module/kandji/pull_all_kandji_data/'+processdata[serial_index],
        type: "get",
        success: function (obj, resultdata) {

            // Calculate progress bar's percent
            var processpercent = Math.round((((progessvalue+1)/progressmax)*100));
            progessvalue++
            $('.progress-bar').css('width', (processpercent+'%')).attr('aria-valuenow', processpercent);
            $('#Progress-Bar-Percent').text(progessvalue+"/"+progressmax);

            // Cleanup and reset when done processing serials
            if ((progessvalue) == progressmax) {
                // Make button clickable again and hide process bar elements
                $('#GetAllKandji').html(i18n.t('kandji.pull_in_all'));
                $('#GetAllKandji').removeClass('disabled');
                kandji_pull_all_running = 0;
                $("#Progress-Space").fadeOut(1200, function() {
                    $('#Progress-Space').addClass('hide')
                    var progresselement = document.getElementById('Progress-Space');
                    progresselement.style.display = null;
                    progresselement.style.opacity = null;
                });
                $("#GetAllKandji-Progress").fadeOut( 1200, function() {
                    $('#GetAllKandji-Progress').addClass('hide')
                    var progresselement = document.getElementById('GetAllKandji-Progress');
                    progresselement.style.display = null;
                    progresselement.style.opacity = null;
                    $('.progress-bar').css('width', 0+'%').attr('aria-valuenow', 0);
                });

                return true;
            }

            // Go to the next serial
            serial_index++

            // Get next serial
            serial = processdata[serial_index];

            // Run function again with new serial
            process_serial(serial,progessvalue,progressmax,processdata,serial_index)
        },
        statusCode: {
            500: function() {
                kandji_pull_all_running = 0;
                alert("An internal server occurred. Please refresh the page and try again.");
            }
        }
    });
}

// Warning about leaving page if Kandji pull all is running
window.onbeforeunload = function() {
    if (kandji_pull_all_running == 1) {
        return i18n.t('kandji.leave_page_warning');
    } else {
        return;
    }
};

</script>

<?php $this->view('partials/foot'); ?>
