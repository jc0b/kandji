<h2>Kandji  <a data-i18n="kandji.recheck" class="btn btn-default btn-xs" href="<?php echo url('module/kandji/recheck_kandji/' . $serial_number);?>"></a>  <span id="kandji_view_in"></span></h2>

<div id="kandji-msg" data-i18n="listing.loading" class="col-lg-12 text-center"></div>

<div id="kandji-view" class="row hide">
    <div class="col-md-12">

        <!--Top nav tabs-->
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#kandji-inventory" data-i18n="kandji.inventory"></a></li>
          <li><a data-toggle="tab" href="#kandji-management" data-i18n="kandji.management"></a></li>
        </ul>

        <!--Top tabs content-->
        <div class="tab-content">
          <!--Inventory tab-->
          <div id="kandji-inventory" class="tab-pane in active">
            <!--Inventory side tabs-->
            <ul class="nav nav-tabs kandji-left">
              <li class="active" id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-General" id="kandji_general_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-Hardware" id="kandji_hardware_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-UserLocation" id="kandji_userlocation_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-Purchasing" id="kandji_purchasing_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-ExtensionAttributes" id="kandji_extension_attributes_button"></a></li>
            </ul>  
            <!--Inventory side tabs content-->
            <div class="tab-content kandji-tab-content">
                <!--General tab content-->
                <div id="Kandji-General" class="tab-pane in active">
                    <h4 data-i18n="kandji.general"></h4>
                    <!--General table-->
                    <table class="table table-striped">
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.name"></th>
                            <td class="kandji-table-left" id="kandji_name"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.report_date_epoch"></th>
                            <td class="kandji-table-left" id="kandji_report_date_epoch"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.last_contact_time_epoch"></th>
                            <td class="kandji-table-left" id="kandji_last_contact_time_epoch"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.initial_entry_date_epoch"></th>
                            <td class="kandji-table-left" id="kandji_initial_entry_date_epoch"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.ip_address"></th>
                            <td class="kandji-table-left" id="kandji_ip_address"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.last_reported_ip"></th>
                            <td class="kandji-table-left" id="kandji_last_reported_ip"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.kandji_version"></th>
                            <td class="kandji-table-left" id="kandji_version"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.managed"></th>
                            <td class="kandji-table-left" id="kandji_managed"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.last_cloud_backup_date_epoch"></th>
                            <td class="kandji-table-left" id="kandji_last_cloud_backup_date_epoch"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.last_enrolled_date_epoch"></th>
                            <td class="kandji-table-left" id="kandji_last_enrolled_date_epoch"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.mdm_capable"></th>
                            <td class="kandji-table-left" id="kandji_mdm_capable"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.enrolled_via_dep"></th>
                            <td class="kandji-table-left" id="kandji_enrolled_via_dep"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.user_approved_mdm"></th>
                            <td class="kandji-table-left" id="kandji_user_approved_mdm"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.user_approved_enrollment"></th>
                            <td class="kandji-table-left" id="kandji_user_approved_enrollment"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.mdm_capable_users"></th>
                            <td class="kandji-table-left" id="kandji_mdm_capable_users"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.kandji_id"></th>
                            <td class="kandji-table-left" id="kandji_id"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.asset_tag"></th>
                            <td class="kandji-table-left" id="kandji_asset_tag"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.barcode_1"></th>
                            <td class="kandji-table-left" id="kandji_barcode_1"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.barcode_2"></th>
                            <td class="kandji-table-left" id="kandji_barcode_2"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.ble_capable"></th>
                            <td class="kandji-table-left" id="kandji_ble_capable"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.itunes_store_account_is_active"></th>
                            <td class="kandji-table-left" id="kandji_itunes_store_account_is_active"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.distribution_point"></th>
                            <td class="kandji-table-left" id="kandji_distribution_point"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.sus"></th>
                            <td class="kandji-table-left" id="kandji_sus"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.netboot_server"></th>
                            <td class="kandji-table-left" id="kandji_netboot_server"></td>
                        </tr>
                    </table>
                </div>
                <!--Hardware tab content-->
                <div id="Kandji-Hardware" class="tab-pane">
                    <h4 data-i18n="hardware.hardware"></h4>
                    <!--Hardware table-->
                    <table class="table table-striped">
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.model"></th>
                            <td class="kandji-table-left" id="kandji_model"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.model_identifier"></th>
                            <td class="kandji-table-left" id="kandji_model_identifier"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.udid"></th>
                            <td class="kandji-table-left" id="kandji_udid"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="serial"></th>
                            <td class="kandji-table-left" id="kandji_serial_number"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.processor_speed"></th>
                            <td class="kandji-table-left" id="kandji_processor_speed"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.number_processors"></th>
                            <td class="kandji-table-left" id="kandji_number_processors"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.number_cores"></th>
                            <td class="kandji-table-left" id="kandji_number_cores"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.processor_type"></th>
                            <td class="kandji-table-left" id="kandji_processor_type"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.processor_architecture"></th>
                            <td class="kandji-table-left" id="kandji_processor_architecture"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.bus_speed"></th>
                            <td class="kandji-table-left" id="kandji_bus_speed"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.cache_size"></th>
                            <td class="kandji-table-left" id="kandji_cache_size"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.mac_address"></th>
                            <td class="kandji-table-left" id="kandji_mac_address"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.alt_mac_address"></th>
                            <td class="kandji-table-left" id="kandji_alt_mac_address"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.total_ram"></th>
                            <td class="kandji-table-left" id="kandji_total_ram"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.available_ram_slots"></th>
                            <td class="kandji-table-left" id="kandji_available_ram_slots"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.battery_capacity"></th>
                            <td class="kandji-table-left" id="kandji_battery_capacity"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.smc_version"></th>
                            <td class="kandji-table-left" id="kandji_smc_version"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.nic_speed"></th>
                            <td class="kandji-table-left" id="kandji_nic_speed"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.optical_drive"></th>
                            <td class="kandji-table-left" id="kandji_optical_drive"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.boot_rom"></th>
                            <td class="kandji-table-left" id="kandji_boot_rom"></td>
                        </tr>
                    </table>
                </div>
                <!--UserLocation tab content-->
                <div id="Kandji-UserLocation" class="tab-pane">
                  <h4 data-i18n="kandji.userlocation"></h4>
                  <!--UserLocation table-->
                    <table class="table table-striped">
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.username"></th>
                            <td class="kandji-table-left" id="kandji_username"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.realname"></th>
                            <td class="kandji-table-left" id="kandji_realname"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.email_address"></th>
                            <td class="kandji-table-left" id="kandji_email_address"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.phone"></th>
                            <td class="kandji-table-left" id="kandji_phone"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.position"></th>
                            <td class="kandji-table-left" id="kandji_position"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.department"></th>
                            <td class="kandji-table-left" id="kandji_department"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.building"></th>
                            <td class="kandji-table-left" id="kandji_building"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.room"></th>
                            <td class="kandji-table-left" id="kandji_room"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right hide" id="kandji_site_name_head" data-i18n="kandji.site_name"></th>
                            <td class="kandji-table-left hide" id="kandji_site_name"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right hide" id="kandji_site_id_head" data-i18n="kandji.site_id"></th>
                            <td class="kandji-table-left hide" id="kandji_site_id"></td>
                        </tr>
                    </table>
                </div>
                <!--Purchasing tab content-->
                <div id="Kandji-Purchasing" class="tab-pane">
                  <h4 data-i18n="kandji.purchasing"></h4>
                  <!--Purchasing table-->
                    <table class="table table-striped">
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.purchased_or_leased"></th>
                            <td class="kandji-table-left" id="kandji_is_purchased"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.po_number"></th>
                            <td class="kandji-table-left" id="kandji_po_number"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.po_date_epoch"></th>
                            <td class="kandji-table-left" id="kandji_po_date_epoch"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.vendor"></th>
                            <td class="kandji-table-left" id="kandji_vendor"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.warranty_expires_epoch"></th>
                            <td class="kandji-table-left" id="kandji_warranty_expires_epoch"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.applecare_id"></th>
                            <td class="kandji-table-left" id="kandji_applecare_id"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.lease_expires_epoch"></th>
                            <td class="kandji-table-left" id="kandji_lease_expires_epoch"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.purchase_price"></th>
                            <td class="kandji-table-left" id="kandji_purchase_price"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.life_expectancy"></th>
                            <td class="kandji-table-left" id="kandji_life_expectancy"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.purchasing_account"></th>
                            <td class="kandji-table-left" id="kandji_purchasing_account"></td>
                        </tr>
                        <tr>
                            <th class="kandji-table-right" data-i18n="kandji.purchasing_contact"></th>
                            <td class="kandji-table-left" id="kandji_purchasing_contact"></td>
                        </tr>
                    </table>
                </div>
                <!--ExtensionAttributes tab content-->
                <div id="Kandji-ExtensionAttributes" class="tab-pane">
                  <!--ExtensionAttributes table-->
                    <div id="Kandji-ExtensionAttributes-Table"></div>
                </div>
            </div>
          </div>      
          <!--Mangement tab-->
          <div id="kandji-management" class="tab-pane">
            <!--Mangement side tabs-->
            <ul class="nav nav-tabs kandji-left">
              <li class="active" id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-ManagementCommands" id="kandji_managementcommands_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-Policies" id="kandji_policies_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-eBooks" id="kandji_ebooks_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-MacAppStoreApps" id="kandji_mac_apps_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-ConfigurationProfiles" id="kandji_config_profiles_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-ManagedPreferences" id="kandji_man_prefs_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-RestrictedSoftware" id="kandji_restricted_software_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-ComputerGroups" id="kandji_computergroups_button"></a></li>
              <li id="kandji-button"><a class="kandji-tablink" data-toggle="tab" href="#Kandji-PatchMangement" id="kandji_patchmanagement_button"></a></li>
            </ul>
            <!--Mangement side tabs content-->
            <div class="tab-content kandji-tab-content">
                <!--ManagementCommands tab content-->
                <div id="Kandji-ManagementCommands" class="tab-pane in active">
                  <!--ManagementCommands table-->
                  <div id="Kandji-ManagementCommands-Table"></div>
                </div>
                <!--Policies tab content-->
                <div id="Kandji-Policies" class="tab-pane">
                  <!--Policies table-->
                  <div id="Kandji-Policies-Table"></div>
                </div>
                <!--eBooks tab content-->
                <div id="Kandji-eBooks" class="tab-pane">
                  <!--eBooks table-->
                  <div id="Kandji-eBooks-Table"></div>
                </div>
                <!--MacAppStoreApps tab content-->
                <div id="Kandji-MacAppStoreApps" class="tab-pane">
                  <!--MacAppStoreApps table-->
                  <div id="Kandji-MacApps-Table"></div>
                </div>
                <!--ConfigurationProfiles tab content-->
                <div id="Kandji-ConfigurationProfiles" class="tab-pane">
                  <!--ConfigurationProfiles table-->
                  <div id="Kandji-ConfigurationProfiles-Table"></div>
                </div>
                <!--ManagedPreferences tab content-->
                <div id="Kandji-ManagedPreferences" class="tab-pane">
                  <!--ManagedPreferences table-->
                  <div id="Kandji-ManagedPreferences-Table"></div>
                </div>
                <!--RestrictedSoftware tab content-->
                <div id="Kandji-RestrictedSoftware" class="tab-pane">
                  <!--RestrictedSoftware table-->
                  <div id="Kandji-RestrictedSoftware-Table"></div>
                </div>
                <!--ComputerGroups tab content-->
                <div id="Kandji-ComputerGroups" class="tab-pane">
                    <!--ComputerGroups table-->
                    <h4 data-i18n="kandji.computergroups"></h4>
                    <!--ComputerGroups button group-->
                    <div class="btn-group btn-group-justified">
                        <a data-toggle="tab" class="btn btn-primary active" href="#Kandji-Groups-Smart-Table" id="kandji_groups_smart_button"></a>
                        <a data-toggle="tab" class="btn btn-primary" href="#Kandji-Groups-Static-Table" id="kandji_groups_static_button"></a>
                    </div>
                    <br/>
                    <!--ComputerGroups tables-->
                    <div class="tab-content kandji-tab-content">
                        <div id="Kandji-Groups-Smart-Table" class="tab-pane in active"></div>
                        <div id="Kandji-Groups-Static-Table" class="tab-pane"></div>
                    </div>                
                </div>
                <!--PatchMangement tab content-->
                <div id="Kandji-PatchMangement" class="tab-pane">
                    <!--PatchMangement table-->
                    <h4 data-i18n="kandji.patch_management_logs_history"></h4>
                    <!--PatchMangement button group-->
                    <div class="btn-group btn-group-justified">
                        <a data-toggle="tab" class="btn btn-primary active" href="#Kandji-Software-Titles-Table" id="kandji_software_titles_button"></a>
                        <a data-toggle="tab" class="btn btn-primary" href="#Kandji-Patch-Policies-Table" id="kandji_patch_policies_button"></a>
                    </div>
                    <br/>
                    <!--PatchMangement tables-->
                    <div class="tab-content kandji-tab-content">
                        <div id="Kandji-Software-Titles-Table" class="tab-pane in active"></div>
                        <div id="Kandji-Patch-Policies-Table" class="tab-pane"></div>
                    </div>                    
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

<script>    
$(document).on('appReady', function(e, lang) {

	// Get Kandji data
	$.getJSON( appUrl + '/module/kandji/get_data/' + serialNumber, function( data ) {
		if( ! data['kandji_id']){
			$('#kandji-msg').text(i18n.t('no_data'));
		}
		else{

			// Hide
			$('#kandji-msg').text('');
			$('#kandji-view').removeClass('hide');

            var kandji_tenant_address = "<?php configAppendFile(__DIR__ . '/../config.php'); echo rtrim(conf('kandji_tenant_address'), '/'); ?>"; // Get the Kandji server address
            
            // Generate buttons and tabs
            $('#kandji_view_in').html('<a class="btn btn-default btn-xs" href="'+kandji_tenant_address+'/devices/'+data['kandji_id']+'" target="_blank" title="'+i18n.t('kandji.view_in_kandji')+'"></a>'); // View in Kandji button
            $('#kandji_general_button').html('<i class="fa fa-info-circle"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.general")); // General tab
            $('#kandji_hardware_button').html('<i class="fa fa-desktop"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("hardware.hardware")); // Hardware tab
            $('#kandji_operatingsystem_button').html('<i class="fa fa-apple"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.operatingsystem")); // Operating System tab
            $('#kandji_userlocation_button').html('<i class="fa fa-building"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.userlocation")); // User Location tab
            $('#kandji_security_button').html('<i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.security")); // Security tab
            $('#kandji_purchasing_button').html('<i class="fa fa-money"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.purchasing")); // Purchasing tab
            $('#kandji_extension_attributes_button').html('<i class="fa fa-puzzle-piece"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.extension_attributes")+'&nbsp;&nbsp;<span id="kandji-extensions-cnt" class="badge"></span>'); // Extension Attributes tab
            $('#kandji_managementcommands_button').html('<i class="fa fa-tachometer"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.managementcommands")); // Management Commands tab
            $('#kandji_policies_button').html('<i class="fa fa-window-restore"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.policies_management")+'&nbsp;&nbsp;<span id="kandji-policies-cnt" class="badge"></span>'); // Policies tab
            $('#kandji_ebooks_button').html('<i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.ebooks_management")+'&nbsp;&nbsp;<span id="kandji-ebooks-cnt" class="badge"></span>'); // eBooks tab
            $('#kandji_mac_apps_button').html('<i class="fa fa-caret-square-o-up"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.mac_app_store_applications_history")+'&nbsp;&nbsp;<span id="kandji-macapps-cnt" class="badge"></span>'); // Mac App Store tab
            $('#kandji_config_profiles_button').html('<i class="fa fa-cogs"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.configuration_profiles")+'&nbsp;&nbsp;<span id="kandji-profs-cnt2" class="badge"></span>'); // Configuration Profiles tab
            $('#kandji_man_prefs_button').html('<i class="fa fa-sliders"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.managed_preference_profiles_management")+'&nbsp;&nbsp;<span id="kandji-manprefs-cnt" class="badge"></span>'); // Managed Preferences tab
            $('#kandji_restricted_software_button').html('<i class="fa fa-shield"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.restricted_software_management")+'&nbsp;&nbsp;<span id="kandji-restsoft-cnt" class="badge"></span>'); // Restricted Software tab
            $('#kandji_computergroups_button').html('<i class="fa fa-desktop"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.computergroups")); // Computer Groups tab
            $('#kandji_patchmanagement_button').html('<i class="fa fa-arrows-alt"></i>&nbsp;&nbsp;&nbsp;'+i18n.t("kandji.patch_management_logs_history")); // Patch Management tab
            
            // Fix dates, after checking if date is set
            if ( data['last_contact_time_epoch'] !== null ){
                $('#kandji_last_contact_time_epoch').html(moment(parseInt(data['last_contact_time_epoch'])).format('llll')+' - '+moment(parseInt(data['last_contact_time_epoch'])).fromNow());
            }
            if ( data['initial_entry_date_epoch'] !== null ){
                $('#kandji_initial_entry_date_epoch').html(moment(parseInt(data['initial_entry_date_epoch'])).format('llll')+' - '+moment(parseInt(data['initial_entry_date_epoch'])).fromNow());
            }
            if ( data['po_date_epoch'] !== null ){
                $('#kandji_po_date_epoch').html(moment(parseInt(data['po_date_epoch'])).format('llll')+' - '+moment(parseInt(data['po_date_epoch'])).fromNow());
            }
            if ( data['report_date_epoch'] !== null ){
                $('#kandji_report_date_epoch').html(moment(parseInt(data['report_date_epoch'])).format('llll')+' - '+moment(parseInt(data['report_date_epoch'])).fromNow());
            }
            if ( data['last_enrolled_date_epoch'] !== null ){
                $('#kandji_last_enrolled_date_epoch').html(moment(parseInt(data['last_enrolled_date_epoch'])).format('llll')+' - '+moment(parseInt(data['last_enrolled_date_epoch'])).fromNow());
            }
            if ( data['warranty_expires_epoch'] !== null ){
                $('#kandji_warranty_expires_epoch').html(moment(parseInt(data['warranty_expires_epoch'])).format('llll')+' - '+moment(parseInt(data['warranty_expires_epoch'])).fromNow());
            }
            if ( data['lease_expires_epoch'] !== null ){
                $('#kandji_lease_expires_epoch').html(moment(parseInt(data['lease_expires_epoch'])).format('llll')+' - '+moment(parseInt(data['lease_expires_epoch'])).fromNow());
            }
            if ( data['last_cloud_backup_date_epoch'] !== null ){
                $('#kandji_last_cloud_backup_date_epoch').html(moment(parseInt(data['last_cloud_backup_date_epoch'])).format('llll')+' - '+moment(parseInt(data['last_cloud_backup_date_epoch'])).fromNow());
            }
            
            // Format battery percent
            if (parseInt(data['battery_capacity']) >= 0) {
                $('#kandji_battery_capacity').text(data['battery_capacity']+"%");
            } else {
                $('#kandji_battery_capacity').text("");
            }

            // Format managed row
            if ( data['managed'] == 1 ){
                $('#kandji_managed').html(i18n.t("yes")+', '+i18n.t("kandji.by")+'<span title="'+i18n.t("kandji.management_password_sha256")+': '+data['management_password_sha256']+'"> '+data['management_username']+'</span>');
            } else {
                $('#kandji_managed').text(i18n.t("no"));
            }
            
            // Format booleans
            if ( data['mdm_capable'] == 1 ){
                $('#kandji_mdm_capable').text(i18n.t("yes"));
            } else {
                $('#kandji_mdm_capable').text(i18n.t("no"));
            }
            if ( data['user_approved_enrollment'] == 1 ){
                $('#kandji_user_approved_enrollment').text(i18n.t("yes"));
            } else {
                $('#kandji_user_approved_enrollment').text(i18n.t("no"));
            }
            if ( data['user_approved_mdm'] == 1 ){
                $('#kandji_user_approved_mdm').text(i18n.t("yes"));
            } else {
                $('#kandji_user_approved_mdm').text(i18n.t("no"));
            }
            if ( data['enrolled_via_dep'] == 1 ){
                $('#kandji_enrolled_via_dep').text(i18n.t("yes"));
            } else {
                $('#kandji_enrolled_via_dep').text(i18n.t("no"));
            }
            if ( data['itunes_store_account_is_active'] == 1 ){
                $('#kandji_itunes_store_account_is_active').text(i18n.t("yes"));
            } else {
                $('#kandji_itunes_store_account_is_active').text(i18n.t("no"));
            }
            if ( data['ble_capable'] == 1 ){
                $('#kandji_ble_capable').text(i18n.t("yes"));
            } else {
                $('#kandji_ble_capable').text(i18n.t("no"));
            }
            if ( data['is_purchased'] == 1 ){
                $('#kandji_is_purchased').text(i18n.t("kandji.is_purchased"));
            } else {
                $('#kandji_is_purchased').text(i18n.t("kandji.is_leased"));
            }
			
            // Format hardware strings
            $('#kandji_processor_speed').html((parseInt(data['processor_speed'])/1000)+" Ghz");
            $('#kandji_cache_size').html('<span title="'+data['cache_size']+' KB">'+Math.round((parseInt(data['cache_size'])/1000), 0)+" MB</span>");
            $('#kandji_total_ram').html('<span title="'+data['total_ram']+' MB">'+Math.round((parseInt(data['total_ram'])/1000), 0)+" GB</span>");
            if ((parseInt(data['bus_speed'])) > 1000 ) { 
                $('#kandji_bus_speed').html((parseInt(data['bus_speed'])/1000)+" Ghz");
            } else if ((parseInt(data['bus_speed'])) > 0 ) { 
                $('#kandji_bus_speed').html(data['bus_speed']+" Mhz");
            } else {
                $('#kandji_bus_speed').html("")
            }
            
            // Format Site Name/ID            
            if (parseInt(data['site_id']) != -1 ){
                $('#kandji_site_name').html('<a title="'+i18n.t("kandji.view_in_kandji")+'" target="_blank" href="'+kandji_server+'/site.html?id='+data['site_id']+'"> '+data['site_name']+'</span>');
                $('#kandji_site_id').text(data['site_id']);
                $('#kandji_site_name_head').removeClass('hide');
                $('#kandji_site_name').removeClass('hide');
                $('#kandji_site_id_head').removeClass('hide');
                $('#kandji_site_id').removeClass('hide');
            } 


            // Make Extension Attributes table
            if(data['extension_attributes'] && data['extension_attributes'] != null && data['extension_attributes'] != 'null'){
                var extensionsdata = JSON.parse(data['extension_attributes']);
                // Set count of extension attributes
                $('#kandji-extensions-cnt').text(extensionsdata.length);
                // Make the table framework
                var extensionsrows = '<h4>'+i18n.t('kandji.extension_attributes')+'<a style="float: right;" class="btn btn-default btn-xs" target="_blank" href="'+kandji_server+'/computerExtensionAttributes.html"><i class="fa fa-cog"></i> '+i18n.t("kandji.extension_attributes")+'</a></h4><table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th><th>'+i18n.t('kandji.attribute')+'</th>'
                if (parseInt(extensionsdata.length) == 0 ){
                        extensionsrows = extensionsrows+'<tr><td>'+i18n.t('kandji.no_extension_attributes')+'</td><td></td></tr>';   
                } else {
                    $.each(extensionsdata, function(i,d){
                        // Generate rows from data
                        extensionsrows = extensionsrows + '<tr><td><a target="_blank" href="'+kandji_server+'/computerExtensionAttributes.html?id='+d["id"]+'&o=r'+'">'+d['name']+'</a></td><td>'+d['value']+'</td></tr>';
                    })
                }
                $('#Kandji-ExtensionAttributes-Table').html(extensionsrows+"</tbody></table>") // Close table framework and assign to HTML ID
            }

            // Make Profiles table
            if(data['configuration_profiles'] && data['configuration_profiles'] != null && data['configuration_profiles'] != 'null'){
                var profilesdata = JSON.parse(data['configuration_profiles']);
                // Set count of installed profiles
                $('#kandji-profs-cnt').text(profilesdata.length);
                $('#kandji-profs-cnt2').text(profilesdata.length);
                // Make the table framework
                var configprofilesrows = '<h4>'+i18n.t('kandji.profiles_scope')+'</h4><table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th>'
                // Make the table framework
                if (parseInt(profilesdata.length) == 0 ){
                    configprofilesrows = configprofilesrows+'<tr><td>'+i18n.t('kandji.no_profiles')+'</td></tr>';   
                } else {
                    $.each(profilesdata, function(i,d){
                        // Set yes/no
                        if (d['user_removable'] == 1){
                            var userremovebool = i18n.t('yes')
                        } else {
                            var userremovebool = i18n.t('no')
                        }
                        // Set level
                        if (d['level'] == 'computer'){
                            var profilelevel = i18n.t('kandji.computer')
                        } else if (d['level'] == 'user') {
                            var profilelevel = i18n.t('user.user')
                        } else {
                            var profilelevel = d['level']
                        }
                        // Generate rows from data
                        configprofilesrows = configprofilesrows + '<tr><td><a target="_blank" href="'+kandji_server+'/OSXConfigurationProfiles.html?id='+d["id"]+'&o=r'+'">'+d['name']+'</a></td></tr>';

                    })
                }
                $('#Kandji-ConfigurationProfiles-Table').html(configprofilesrows+"</tbody></table>") // Close table framework and assign to HTML ID
            }

            // Management Commands
            if (data['commands_history'] && data['commands_history'] != null && data['commands_history'] != 'null'){
                var commandsjson = JSON.parse(data['commands_history']);
                var commandscompleted = '<table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.command')+'</th><th>'+i18n.t('kandji.date_completed')+'</th><th>'+i18n.t('kandji.username')+'</th>'
                var commandsfailed = '<table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.command')+'</th><th>'+i18n.t('kandji.status')+'</th><th>'+i18n.t('kandji.date_issued')+'</th><th>'+i18n.t('kandji.date_last_push')+'</th><th>'+i18n.t('kandji.username')+'</th>'
                var commandspending = '<table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.command')+'</th><th>'+i18n.t('kandji.status')+'</th><th>'+i18n.t('kandji.date_issued')+'</th><th>'+i18n.t('kandji.date_last_push')+'</th><th>'+i18n.t('kandji.username')+'</th>'
                if (parseInt(commandsjson['completed'].length) == 0 ){
                    commandscompleted = commandscompleted+'<tr><td>'+i18n.t('kandji.no_completed_commands')+'</td><td></td><td></td></tr>';   
                } else {
                    $.each(commandsjson['completed'], function(i,d){ // Process completed commands
                    // Fix date/time
                    var timehuman = '<span title="'+moment(parseInt(d['completed_epoch'])).fromNow()+'">'+moment(parseInt(d['completed_epoch'])).format('llll')+'</span>'
                    // Generate rows from data
                    commandscompleted = commandscompleted+'<tr><td>'+d['name']+'</td><td>'+timehuman+'</td><td>'+d['username']+'</td></tr>';
                    })
                }
                if (parseInt(commandsjson['failed'].length) == 0 ){
                    commandsfailed = commandsfailed+'<tr><td>'+i18n.t('kandji.no_failed_commands')+'</td><td></td><td></td><td></td><td></td></tr>';   
                } else {
                    $.each(commandsjson['failed'], function(i,d){ // Process failed commands
                        // Fix date/time
                        var timehuman = '<span title="'+moment(parseInt(d['issued_epoch'])).fromNow()+'">'+moment(parseInt(d['issued_epoch'])).format('llll')+'</span>'
                        var timehuman2 = '<span title="'+moment(parseInt(d['last_push_epoch'])).fromNow()+'">'+moment(parseInt(d['last_push_epoch'])).format('llll')+'</span>'
                        // Generate rows from data
                        commandsfailed = commandsfailed+'<tr><td>'+d['name']+'</td><td>'+d['status']+'</td><td>'+timehuman+'</td><td>'+timehuman2+'</td><td>'+d['username']+'</td></tr>';
                    })
                }
                if (parseInt(commandsjson['pending'].length) == 0 ){
                        commandspending = commandspending+'<tr><td>'+i18n.t('kandji.no_pending_commands')+'</td><td></td><td></td><td></td><td></td></tr>';   
                } else {
                    $.each(commandsjson['pending'], function(i,d){ // Process pending commands
                        // Fix date/time
                        var timehuman = '<span title="'+moment(parseInt(d['issued_epoch'])).fromNow()+'">'+moment(parseInt(d['issued_epoch'])).format('llll')+'</span>'
                        var timehuman2 = '<span title="'+moment(parseInt(d['last_push_epoch'])).fromNow()+'">'+moment(parseInt(d['last_push_epoch'])).format('llll')+'</span>'
                        // Generate rows from data
                        commandspending = commandspending+'<tr><td>'+d['name']+'</td><td>'+d['status']+'</td><td>'+timehuman+'</td><td>'+timehuman2+'</td><td>'+d['username']+'</td></tr>';
                    })
                }
                $('#kandji_managementhistory_completed_button').text(data['comands_completed']+' '+i18n.t('kandji.completed_commands')); // Close table framework and assign to HTML ID 
                $('#kandji_managementhistory_failed_button').text(data['comands_failed']+' '+i18n.t('kandji.failed_commands')); // Close table framework and assign to HTML ID 
                $('#kandji_managementhistory_pending_button').text(data['comands_pending']+' '+i18n.t('kandji.pending_commands')); // Close table framework and assign to HTML ID 
                $('#Kandji-ManagementHistory-Completed-Table').html(commandscompleted) // Close table framework and assign to HTML ID            
                $('#Kandji-ManagementHistory-Failed-Table').html(commandsfailed) // Close table framework and assign to HTML ID            
                $('#Kandji-ManagementHistory-Pending-Table').html(commandspending) // Close table framework and assign to HTML ID            
                $('#Kandji-ManagementCommands-Table').html('<h4>'+i18n.t('kandji.pending_commands')+'&nbsp;&nbsp;<span class="badge">'+data['comands_pending']+'</h4>'+commandspending+"</tbody></table><h4>"+i18n.t('kandji.failed_commands')+'&nbsp;&nbsp;<span class="badge">'+data['comands_failed']+'</span>'+'</h4>'+commandsfailed+"</tbody></table>") // Close table framework and assign to HTML ID
            }

            // Make Policies table
            if (data['policies_management'] && data['policies_management'] != null && data['policies_management'] != 'null'){
                var policiesdata = JSON.parse(data['policies_management']);
                // Set count of policies
                $('#kandji-policies-cnt').text(policiesdata.length);
                // Make the table framework
                var policiesrows = '<h4>'+i18n.t('kandji.policies_scope')+'</h4><table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th><th>'+i18n.t('kandji.triggers')+'</th>'
                if (parseInt(policiesdata.length) == 0 ){
                        policiesrows = policiesrows+'<tr><td>'+i18n.t('kandji.no_policies')+'</td></tr>';   
                } else {
                    $.each(policiesdata, function(i,d){
                        // Generate rows from data
                        policiesrows = policiesrows + '<tr><td><a target="_blank" href="'+kandji_server+'/policies.html?id='+d["id"]+'&o=r'+'">'+d['name']+'</a></td><td>'+d['triggers']+'</td></tr>';
                    })
                }
                $('#Kandji-Policies-Table').html(policiesrows+"</tbody></table>") // Close table framework and assign to HTML ID
            }

            // Make eBooks table
            if(data['ebooks_management'] && data['ebooks_management'] != null && data['ebooks_management'] != 'null'){
                var ebooksdata = JSON.parse(data['ebooks_management']);
                // Set count of eBooks
                $('#kandji-ebooks-cnt').text(ebooksdata.length);
                // Make the table framework
                var ebooksrows = '<h4>'+i18n.t('kandji.ebooks_scope')+'</h4><table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th>'
                if (parseInt(ebooksdata.length) == 0 ){
                        ebooksrows = ebooksrows+'<tr><td>'+i18n.t('kandji.no_ebooks')+'</td></tr>';   
                } else {
                    $.each(ebooksdata, function(i,d){
                        // Generate rows from data
                        ebooksrows = ebooksrows + '<tr><td><a target="_blank" href="'+kandji_server+'/eBooks.html?id='+d["id"]+'&o=r'+'">'+d['name']+'</a></td></tr>';
                    })
                }
                $('#Kandji-eBooks-Table').html(ebooksrows+"</tbody></table>") // Close table framework and assign to HTML ID
            }

            // Make Mac App Store table
            if(data['mac_app_store_applications_history'] && data['mac_app_store_applications_history'] != null && data['mac_app_store_applications_history'] != 'null'){
                var macappssdata = JSON.parse(data['mac_app_store_applications_history']);
                // Set count of Mac App Store Apps
                $('#kandji-macapps-cnt').text(macappssdata['installed'].length);
                // Make the table framework
                var macappsrows = '<h4>'+i18n.t('kandji.mac_apps_scope')+'</h4><table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th>'
                if (parseInt(macappssdata.length) == 0 ){
                        macappsrows = macappsrows+'<tr><td>'+i18n.t('kandji.no_mac_apps')+'</td></tr>';   
                } else {
                    $.each(macappssdata['installed'], function(i,d){
                        // Generate rows from data
                        if (d["id"] !== undefined) {
                            macappsrows = macappsrows + '<tr><td><a target="_blank" href="'+kandji_server+'/macApps.html?id='+d["id"]+'&o=r'+'">'+d['name']+'</a></td></tr>';
                        } else {
                            macappsrows = macappsrows + '<tr><td>'+d['name']+'</td></tr>';
                        }
                    })
                }
                $('#Kandji-MacApps-Table').html(macappsrows+"</tbody></table>") // Close table framework and assign to HTML ID
            }
                
            // Make Managed Preferences table
            if(data['managed_preference_profiles_management'] && data['managed_preference_profiles_management'] != null && data['managed_preference_profiles_management'] != 'null'){
                var manprefsdata = JSON.parse(data['managed_preference_profiles_management']);
                // Set count of Managed Preferences
                $('#kandji-manprefs-cnt').text(manprefsdata.length);
                // Make the table framework
                var manprefsrows = '<h4>'+i18n.t('kandji.preferences_scope')+'</h4><table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th>'
                if (parseInt(manprefsdata.length) == 0 ){
                        manprefsrows = manprefsrows+'<tr><td>'+i18n.t('kandji.no_preferences')+'</td></tr>';   
                } else {
                    $.each(manprefsdata, function(i,d){
                        // Generate rows from data
                        manprefsrows = manprefsrows + '<tr><td>'+d['name']+'</td></tr>';
                    })
                }
                $('#Kandji-ManagedPreferences-Table').html(manprefsrows+"</tbody></table>") // Close table framework and assign to HTML ID   
            }
                
            // Make Restricted Software table
            if(data['restricted_software_management'] && data['restricted_software_management'] != null && data['restricted_software_management'] != 'null'){
                var restrictedsoftdata = JSON.parse(data['restricted_software_management']);
                // Set count of Restricted Software
                $('#kandji-restsoft-cnt').text(restrictedsoftdata.length);
                // Make the table framework
                var restrictedsoftrows = '<h4>'+i18n.t('kandji.restricted_scope')+'</h4><table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th>'
                if (parseInt(restrictedsoftdata.length) == 0 ){
                        restrictedsoftrows = restrictedsoftrows+'<tr><td>'+i18n.t('kandji.no_restricted')+'</td></tr>';   
                } else {
                    $.each(restrictedsoftdata, function(i,d){
                        // Generate rows from data
                        restrictedsoftrows = restrictedsoftrows + '<tr><td><a target="_blank" href="'+kandji_server+'/restrictedSoftware.html?id='+d["id"]+'&o=r'+'">'+d['name']+'</a></td></tr>';
                    })
                }
                $('#Kandji-RestrictedSoftware-Table').html(restrictedsoftrows+"</tbody></table>") // Close table framework and assign to HTML ID
            }
    
            // Smart Groups Table
            if(data['smart_groups_management'] && data['smart_groups_management'] != null && data['smart_groups_management'] != 'null'){
                var groupssmartdata = JSON.parse(data['smart_groups_management']);
                // Set count of Smart Groups
                $('#kandji_groups_smart_button').text(i18n.t('kandji.smart_groups_management')+' ('+groupssmartdata.length+')');
                // Make the table framework
                var groupssmartrows = '<table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th>'
                if (parseInt(groupssmartdata.length) == 0 ){
                        groupssmartrows = groupssmartrows+'<tr><td>'+i18n.t('kandji.no_smart_groups')+'</td></tr>';   
                } else {
                    $.each(groupssmartdata, function(i,d){
                        // Generate rows from data
                        groupssmartrows = groupssmartrows + '<tr><td><a target="_blank" href="'+kandji_server+'/smartComputerGroups.html?id='+d["id"]+'&o=r'+'">'+d['name']+'</a></td></tr>';
                    })
                }
                $('#Kandji-Groups-Smart-Table').html(groupssmartrows+"</tbody></table>") // Close table framework and assign to HTML ID            
            }
                
            // Static Groups Table
            if(data['static_groups_management'] && data['static_groups_management'] != null && data['static_groups_management'] != 'null'){
                var groupsstaticdata = JSON.parse(data['static_groups_management']);
                // Set count of Static Groups
                $('#kandji_groups_static_button').text(i18n.t('kandji.static_groups_management')+' ('+groupsstaticdata.length+')');
                // Make the table framework
                var groupsstaticrows = '<table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th>'
                if (parseInt(groupsstaticdata.length) == 0 ){
                        groupsstaticrows = groupsstaticrows+'<tr><td>'+i18n.t('kandji.no_static_groups')+'</td></tr>';   
                } else {
                    $.each(groupsstaticdata, function(i,d){
                        // Generate rows from data
                        groupsstaticrows = groupsstaticrows + '<tr><td><a target="_blank" href="'+kandji_server+'/staticComputerGroups.html?id='+d["id"]+'&o=r'+'">'+d['name']+'</a></td></tr>';
                    })
                }
                $('#Kandji-Groups-Static-Table').html(groupsstaticrows+"</tbody></table>") // Close table framework and assign to HTML ID
            }
            
            // Software Titles Table
            if(data['patch_reporting_software_titles_management'] && data['patch_reporting_software_titles_management'] != null && data['patch_reporting_software_titles_management'] != 'null'){
                var softwaretitlesdata = JSON.parse(data['patch_reporting_software_titles_management']);
                // Set count of Software Titles
                if (softwaretitlesdata.length !== undefined) {
                    var softwaretitlescount = softwaretitlesdata.length;
                } else {
                    var softwaretitlescount = 0
                }
                $('#kandji_software_titles_button').text(i18n.t('kandji.software_titles')+' ('+softwaretitlescount+')');
                // Make the table framework
                var softwaretitlesrows = '<table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th><th>'+i18n.t('kandji.latest_version')+'</th><th>'+i18n.t('kandji.installed_version')+'</th>'
                if (softwaretitlescount == 0 ){
                        softwaretitlesrows = softwaretitlesrows+'<tr><td>'+i18n.t('kandji.no_software_title')+'</td><td></td><td></td></tr>';   
                } else {
                    $.each(softwaretitlesdata, function(i,d){
                        // Generate rows from data
                        softwaretitlesrows = softwaretitlesrows + '<tr><td>'+d['name']+'</td><td>'+d['latest_version']+'</td><td>'+d['installed_version']+'</td></tr>';
                    })
                }
                $('#Kandji-Software-Titles-Table').html(softwaretitlesrows+"</tbody></table>") // Close table framework and assign to HTML ID            
            }
            
            // Patch Policies Table
            if(data['patch_policies_management'] && data['patch_policies_management'] != null && data['patch_policies_management'] != 'null'){
                var patchpoliciesdata = JSON.parse(data['patch_policies_management']);
                // Set count of Patch Policies
                if (patchpoliciesdata.length !== undefined) {
                    var patchpoliciescount = patchpoliciesdata.length;
                } else {
                    var patchpoliciescount = 0
                }
                $('#kandji_patch_policies_button').text(i18n.t('kandji.patch_policies')+' ('+patchpoliciescount+')');
                // Make the table framework
                var patchpoliciesrows = '<table class="table table-striped table-condensed"><tbody><th>'+i18n.t('kandji.name')+'</th><th>'+i18n.t('kandji.id')+'</th>'
                if (patchpoliciescount == 0 ){
                        patchpoliciesrows = patchpoliciesrows+'<tr><td>'+i18n.t('kandji.no_patch_policies')+'</td><td></td>';   
                } else {
                    $.each(patchpoliciesdata, function(i,d){
                        // Generate rows from data
                        patchpoliciesrows = patchpoliciesrows + '<tr><td>'+d['name']+'</td><td>'+d['id']+'</td></tr>';
                    })
                }
                $('#Kandji-Patch-Policies-Table').html(patchpoliciesrows+"</tbody></table>") // Close table framework and assign to HTML ID
            }

			// Add strings
			$('#kandji_serial_number').text(data['serial_number']);
			$('#kandji_id').text(data['kandji_id']); 
			$('#kandji_name').text(data['name']);
			$('#kandji_mac_address').text(data['mac_address']);
			$('#kandji_alt_mac_address').text(data['alt_mac_address']);
			$('#kandji_ip_address').text(data['ip_address']);
			$('#kandji_last_reported_ip').text(data['last_reported_ip']);
			$('#kandji_version').text(data['kandji_version']);
			$('#kandji_barcode_1').text(data['barcode_1']);
			$('#kandji_barcode_2').text(data['barcode_2']);
			$('#kandji_asset_tag').text(data['asset_tag']);
			$('#kandji_mdm_capable_users').text(data['mdm_capable_users']);
			$('#kandji_distribution_point').text(data['distribution_point']);
			$('#kandji_sus').text(data['sus']);
			$('#kandji_netboot_server').text(data['netboot_server']);
			$('#kandji_udid').text(data['udid']);
			$('#kandji_username').text(data['username']);
			$('#kandji_realname').text(data['realname']);
			$('#kandji_email_address').text(data['email_address']);
			$('#kandji_position').text(data['position']);
			$('#kandji_phone').text(data['phone']);
			$('#kandji_department').text(data['department']);
			$('#kandji_building').text(data['building']);
			$('#kandji_room').text(data['room']);
			$('#kandji_po_number').text(data['po_number']);
			$('#kandji_vendor').text(data['vendor']);
			$('#kandji_applecare_id').text(data['applecare_id']);
			$('#kandji_purchase_price').text(data['purchase_price']);
			$('#kandji_purchasing_account').text(data['purchasing_account']);
			$('#kandji_purchasing_contact').text(data['purchasing_contact']);
			$('#kandji_life_expectancy').text(data['life_expectancy']);
			$('#kandji_available_ram_slots').text(data['available_ram_slots']);
			$('#kandji_boot_rom').text(data['boot_rom']);
			$('#kandji_disk_encryption_configuration').text(data['disk_encryption_configuration']);
			$('#kandji_institutional_recovery_key').text(data['institutional_recovery_key']);
			$('#kandji_model').text(data['model']);
			$('#kandji_model_identifier').text(data['model_identifier']);
			$('#kandji_nic_speed').text(data['nic_speed']);
			$('#kandji_number_cores').text(data['number_cores']);
			$('#kandji_number_processors').text(data['number_processors']);
			$('#kandji_optical_drive').text(data['optical_drive']);
			$('#kandji_processor_architecture').text(data['processor_architecture']);
			$('#kandji_processor_type').text(data['processor_type']);
			$('#kandji_smc_version').text(data['smc_version']);
			$('#kandji_licensed_software').text(data['licensed_software']);
			$('#kandji_available_software_updates').text(data['available_software_updates']);
			$('#kandji_computer_group_memberships').text(data['computer_group_memberships']);
		}

	});

});
    
// Make button groups active
$(".btn-group > .btn").click(function(){
    $(this).addClass("active").siblings().removeClass("active");
});

</script>
