<?php

	/*
	|===============================================
	| Kandji
	|===============================================
	|
	| A working Kandji instance is required for use of this module.
	|
	| To use the Kandji module, set 'kandji_enable' to TRUE and
	| enter the instance URL and API key for accessing your
	| Kandji instance.
	|
	| This module pulls data about Macs that are in Kandji.
	|
	*/

return [
  'kandji_enable' => env('KANDJI_ENABLE', false),
  'kandji_api_key' => env('KANDJI_API_KEY', ""),
  'kandji_api_endpoint' => env('KANDJI_API_ENDPOINT', ""),
  'kandji_tenant_address' => env('KANDJI_TENANT_ADDRESS', ""),
];
