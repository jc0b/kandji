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
* integer - kandji_id
* string - name
* string - kandji_agent_version
* text - asset_tag
* bigInteger - last_check_in
* bigInteger - last_enrollment
* bigInteger - first_enrollment
* string - blueprint_id
* text - blueprint_name
* text - realname
* string - email_address
