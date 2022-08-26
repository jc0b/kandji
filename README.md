Kandji module
==============

Kandji integration for MunkiReport. Based heavily on [tuxudo/jamf](https://github.com/tuxudo/jamf), which was a massive influence and motivation to write this module.

The Kandji Admin tab within the Admin dropdown menu allows an administrator to check if MunkiReport is able to access their Kandji instance, as well as some details as to how it is configured. There is the option to manually pull data for all Macs within MunkiReport.

The php-curl module is required for use with this module. You can install it on Ubuntu/Debian with `sudo apt-get install php-curl`

## Configuration

To enable the module add the following information to the `.env` file.

```sh
KANDJI_ENABLE="TRUE"
KANDJI_API_ENDPOINT="https://domain.clients.kandji.io/"
KANDJI_API_KEY="some_key_here"
KANDJI_TENANT_ADDRESS="https://domain.kandji.io/"
```

Table Schema
---
* increments - id
* string - serial_number
* integer - jamf_id
* string - name
* string - mac_address
* string - alt_mac_address
* string - ip_address
* string - last_reported_ip
* string - jamf_version
* text - barcode_1
* text - barcode_2
* text - asset_tag
* boolean - managed
* string - management_username
* text - management_password_sha256
* boolean - mdm_capable
* string - mdm_capable_users
* boolean - enrolled_via_dep
* boolean - user_approved_enrollment
* boolean - user_approved_mdm
* bigInteger - report_date_epoch
* bigInteger - last_contact_time_epoch
* bigInteger - initial_entry_date_epoch
* bigInteger - last_cloud_backup_date_epoch
* bigInteger - last_enrolled_date_epoch
* string - distribution_point
* string - sus
* string - netboot_server
* integer - site_id
* string - site_name
* string - udid
* boolean - disable_automatic_login
* boolean - itunes_store_account_is_active
* string - username
* text - realname
* string - email_address
* text - position
* string - phone
* text - department
* text - building
* string - room
* boolean - is_purchased
* boolean - is_leased
* string - po_number
* string - vendor
* string - applecare_id
* string - purchase_price
* string - purchasing_account
* bigInteger - po_date_epoch
* bigInteger - warranty_expires_epoch
* bigInteger - lease_expires_epoch
* integer - life_expectancy
* integer - comands_completed
* integer - comands_pending
* integer - comands_failed
* string - purchasing_contact
* boolean - ble_capable
* string - active_directory_status
* integer - available_ram_slots
* integer - battery_capacity
* string - boot_rom
* integer - bus_speed
* integer - cache_size
* string - disk_encryption_configuration
* text - filevault_2_users
* text - gatekeeper_status
* string - institutional_recovery_key
* boolean - master_password_set
* string - model
* string - model_identifier
* string - nic_speed
* integer - number_cores
* integer - number_processors
* string - optical_drive
* string - os_build
* string - os_version
* string - processor_architecture
* integer - processor_speed
* string - processor_type
* string - sip_status
* string - smc_version
* integer - total_ram
* string - xprotect_version
* text - unix_executables
* text - licensed_software
* text - installed_by_casper
* text - installed_by_installer_swu
* text - cached_by_casper
* text - available_software_updates
* text - running_services
* text - computer_group_memberships
* longText - certificates - Stored as JSON
* longText - attachments - Stored as JSON
* longText - storage - Stored as JSON
* longText - applications - Stored as JSON
* longText - mapped_printers - Stored as JSON
* longText - computer_usage_logs_history - Stored as JSON
* longText - audits_history - Stored as JSON
* longText - policy_logs_history - Stored as JSON
* longText - casper_remote_logs_history - Stored as JSON
* longText - screen_sharing_logs_history - Stored as JSON
* longText - casper_imaging_logs_history - Stored as JSON
* longText - commands_history - Stored as JSON
* longText - user_location_history - Stored as JSON
* longText - mac_app_store_applications_history - Stored as JSON
* longText - policies_management - Stored as JSON
* longText - ebooks_management - Stored as JSON
* longText - mac_app_store_apps_management - Stored as JSON
* longText - managed_preference_profiles_management - Stored as JSON
* longText - restricted_software_management - Stored as JSON
* longText - smart_groups_management - Stored as JSON
* longText - static_groups_management - Stored as JSON
* longText - patch_reporting_software_titles_management - Stored as JSON
* longText - patch_policies_management - Stored as JSON
* longText - extension_attributes - Stored as JSON
* longText - local_accounts - Stored as JSON
* longText - user_inventories - Stored as JSON
* longText - configuration_profiles - Stored as JSON
* longText - peripherals - Stored as JSON
