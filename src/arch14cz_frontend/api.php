<?php
require_once("db_connect.php");

function sanitize_value($value) {
	
	echo htmlspecialchars($value, ENT_XML1, 'UTF-8');
}

$schema_uri = "https://".$_SERVER['SERVER_NAME']."/schema/1.0/";

if (!isset($_GET["verb"])) {
	;
} else if (isset($_GET["name"])) {
	require_once($_SERVER['DOCUMENT_ROOT']."/api_verbs/".$_GET["verb"]."_".$_GET["name"].".php");
} else {
	require_once($_SERVER['DOCUMENT_ROOT']."/api_verbs/".$_GET["verb"].".php");
}
pg_close($db);
?>