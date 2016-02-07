<?php

$no_http_headers = true;

/* display no errors */
error_reporting(0);

if (!isset($called_by_script_server)) {
	include(dirname(__FILE__) . "/../include/global.php");
	array_shift($_SERVER["argv"]);
	print call_user_func_array("ss_mikrotik_procs", $_SERVER["argv"]);
}

function ss_mikrotik_procs($hostid = "") {
	$procs = db_fetch_cell("SELECT processes
		FROM plugin_mikrotik_system
		WHERE host_id=$hostid");

	if ($procs == '') $procs = 'U';

	return $procs;
}

?>
