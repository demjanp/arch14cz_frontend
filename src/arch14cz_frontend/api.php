<?php
require_once("db_connect.php");

function sanitize_value($value) {
	
	echo htmlspecialchars($value, ENT_XML1, 'UTF-8');
}

if (!isset($_GET["verb"])) {
	;
} else if (isset($_GET["name"])) {
	require_once($_SERVER['DOCUMENT_ROOT']."/api_verbs/".$_GET["verb"]."_".$_GET["name"].".php");
} else {
	require_once($_SERVER['DOCUMENT_ROOT']."/api_verbs/".$_GET["verb"].".php");
}

/*
} elseif ($_GET["verb"] == "ListMetadata") {
	$query = "SELECT * FROM query_to_xml_and_xmlschema('SELECT * FROM frontend.c_14_metadata', true, false, '')";
} elseif ($_GET["verb"] == "ListRecords") {
	$query = "SELECT * FROM query_to_xml_and_xmlschema('SELECT * FROM frontend.c_14_main', true, false, '')";
} elseif (($_GET["verb"] == "GetRecord") && isset($_GET["identifier"])) {
	$query = "SELECT * FROM query_to_xml_and_xmlschema('SELECT * FROM frontend.c_14_main WHERE \"Arch14CZ_ID\" = ''".$_GET["identifier"]."''', true, false, '')";
} elseif (($_GET["verb"] == "ListDictionary") && isset($_GET["name"])) {
	$table = "";
	switch ($_GET["name"]) {
		case "Country":
			$table = "c_14_dict_country";
			break;
		case "District":
			$table = "c_14_dict_district";
			break;
		case "Cadastre":
			$table = "c_14_dict_cadastre";
			break;
		case "Relative_Dating":
			$table = "c_14_dict_relative_dating";
			break;
		case "Activity_Area":
			$table = "c_14_dict_activity_area";
			break;
		case "Feature":
			$table = "c_14_dict_feature";
			break;
		case "Material":
			$table = "c_14_dict_material";
			break;
	}
	if ($table != "") {
		$query = "SELECT * FROM query_to_xml_and_xmlschema('SELECT * FROM frontend.".$table."', true, false, '')";
	}
};

if ($query == "") {
	header("Location: ?page=api_doc");
	die();
} else {
	$result = pg_query($db, $query);
	$row = pg_fetch_assoc($result);
	header('Content-Type: application/xml; charset=utf-8');
	echo $row["query_to_xml_and_xmlschema"];
}
*/
pg_close($db);
?>