Kandji module
==============

> [!WARNING]
> I no longer have access to a Kandji instance of my own. 
> I will continue to attempt to fix reported bugs based off of API documentation/error output, it is unlikely that new features will be added.
> Feel free to fork this repo and make your own improvements, if you want to.

Kandji integration for MunkiReport. Based heavily on [tuxudo/jamf](https://github.com/tuxudo/jamf), which was a massive influence and motivation to write this module.

The Kandji Admin tab within the Admin dropdown menu allows an administrator to check if MunkiReport is able to access their Kandji instance, as well as some details as to how it is configured. There is the option to manually pull data for all Macs within MunkiReport. 

The php-curl module is required for use with this module. You can install it on Ubuntu/Debian with `sudo apt-get install php-curl`

## Configuration

To enable the module add the following information to the `.env` file.

```sh
KANDJI_ENABLE="TRUE"
KANDJI_API_ENDPOINT="https://domain.api.kandji.io/"
KANDJI_API_KEY="API_key_here"
KANDJI_TENANT_ADDRESS="https://domain.kandji.io/"
```

The Kandji API key requires only one permission: GET on Device List (`/devices`).

Table Schema
---
* id - increments - Incremental value used by MunkiReport
* serial_number - string - Serial number of Mac
* ~~kandji_id - integer - Kandji ID of Mac~~ **deprecated**
* device_id - string - Kandji ID of Mac
* name - string - Name of Mac in Kandji
* kandji_agent_version - string - Kandji agent version
* asset_tag - text - Kandji asset tag
* last_check_in - bigInteger - Timestamp of last check in to Kandji
* last_enrollment - bigInteger - Timestamp of last enrollment with Kandji
* first_enrollment - bigInteger - Timestamp of first enrollment with Kandji
* blueprint_id - string - Kandji blueprint ID
* blueprint_name - text - Name of Kandji blueprint ID
* realname - text - Real name of Kandji blueprint
* email_address - string - Email address of Mac's assigned user in Kandji
