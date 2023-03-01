<?php
session_start();
$columns = array(
		"Arch14CZ ID" => "string", 
		"Lab Code" => "string", 
		"14C Activity" => "number", 
		"14C Uncertainty" => "number", 
		"Cal CE From" => "integer", 
		"Cal CE To" => "integer", 
		"Notes" => "string", 
		"Reliability" => "string", 
		"Reliability Notes" => "string", 
		"Country" => "string", 
		"Country Code" => "string", 
		"District" => "string", 
		"District Code" => "integer", 
		"Cadastre" => "string", 
		"Cadastre Code" => "integer", 
		"Site" => "string",
		"Site AMCR ID" => "string",
		"Coordinates" => "string",
		"Activity Area" => "string",
		"Activity Area AMCR ID" => "string",
		"Feature" => "string",
		"Feature AMCR ID" => "string",
		"Context Description" => "string",
		"Depth cm" => "string",
		"Context Name" => "string",
		"Published Relative Dating" => "string",
		"Relative Dating AMCR ID" => "string",
		"Dating Order From" => "integer",
		"Dating Order To" => "integer",
		"Sample Number" => "string",
		"Sample Notes" => "string", 
		"Material" => "string", 
		"Material AMCR ID" => "string", 
		"Material Notes" => "string", 
		"Source" => "string",
	);
$keys = array(
		"Arch14CZ_ID",
		"C_14_Lab_Code",
		"C_14_Activity",
		"C_14_Uncertainty",
		"C_14_CE_From",
		"C_14_CE_To",
		"C_14_Note",
		"Reliability",
		"Reliability_Note",
		"Country",
		"Country_Code",
		"District",
		"District_Code",
		"Cadastre",
		"Cadastre_Code",
		"Site",
		"Site_AMCR_ID",
		"Coordinates",
		"Activity_Area",
		"Activity_Area_AMCR_ID",
		"Feature",
		"Feature_AMCR_ID",
		"Context_Description",
		"Context_Depth",
		"Context_Name",
		"Relative_Dating_Name",
		"Relative_Dating_AMCR_ID",
		"Order_From",
		"Order_To",
		"Sample_Number",
		"Sample_Note",
		"Material",
		"Material_AMCR_ID",
		"Material_Note",
		"Source",
	);

function updateRow($row, $keys) {
	
	$order = explode(",", substr($row["Relative_Dating_Order"], 1, -1));
	$from = min($order);
	$to = max($order);
	$row["Order_From"] = $from;
	$row["Order_To"] = $to;
	
	$updated = array();
	foreach($keys as $key) {
		$updated[] = $row[$key];
	}
	
	return $updated;
}

require_once("db_connect.php");
$query = "SELECT \"Arch14CZ_ID\", \"C_14_Lab_Code\", \"C_14_Activity\", \"C_14_Uncertainty\", \"C_14_CE_From\", \"C_14_CE_To\", \"C_14_Note\", \"Reliability\", \"Reliability_Note\", \"Country\", \"Country_Code\", \"District\", \"District_Code\", \"Cadastre\", \"Cadastre_Code\", \"Site\", \"Site_AMCR_ID\", \"Coordinates\", \"Activity_Area\", \"Activity_Area_AMCR_ID\", \"Feature\", \"Feature_AMCR_ID\", \"Context_Description\", \"Context_Name\", \"Context_Depth\", \"Relative_Dating_Name\", \"Relative_Dating_AMCR_ID\", \"Relative_Dating_Order\", \"Sample_Number\", \"Sample_Note\", \"Material\", \"Material_AMCR_ID\", \"Material_Note\", \"Source\" FROM frontend.c_14_main";
$conditions = [];
if (!(isset($_GET["csv"]) or isset($_GET["excel"]))) {
	$conditions = $_SESSION['conditions'];
}
if ($conditions) {
	$query = $query." WHERE ".implode(" AND ", $conditions);
};
$query = $query." ORDER BY \"Arch14CZ_ID\" ASC";

$results = pg_query($db, $query);

if(isset($_POST["Export_Excel"]) or isset($_GET["excel"])) {
	require_once("xlsxwriter.class.php");
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment; filename=arch14cz.xlsx');
	header('Content-Transfer-Encoding: binary');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	
	$options = array();
	for ($i = 0; $i<count(array_keys($columns)); $i++) {
		$options[$i] = ["font-style" => "bold"];
	}
	$output = fopen("php://output", "wb");
	$writer = new XLSXWriter();
	$writer->writeSheetHeader('Sheet1', $columns, $options);
	while( $row = pg_fetch_assoc($results) ) {
	  $writer->writeSheetRow('Sheet1', updateRow($row, $keys));
	}
	$writer->writeToStdOut();

} elseif(isset($_POST["Export_CSV"]) or isset($_GET["csv"])) {

	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=arch14cz.csv');
	$output = fopen("php://output", "w");
	$header = array();
	foreach($columns as $field => $type) {
		$header[] = $field;
	}
	fputcsv($output, $header);
	while($row = pg_fetch_assoc($results))
	{
		fputcsv($output, updateRow($row, $keys));
	}
	fclose($output);

}
pg_close($db);
?>