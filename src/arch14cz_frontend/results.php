<?php
session_start();
$query = "SELECT * FROM frontend.c_14_main";
$conditions = [];

if ($_POST["Cadastre"] != "") {
	$cadastre = explode("#", $_POST["Cadastre"]);
	array_push($conditions, "(\"Cadastre\" = '".$cadastre[2]."' AND \"District\" = '".$cadastre[1]."' AND \"Country_Code\" = '".$cadastre[0]."')");
} elseif ($_POST["District"] != "") {
	$district = explode("#", $_POST["District"]);
	array_push($conditions, "(\"District\" = '".$district[1]."' AND \"Country_Code\" = '".$district[0]."')");
} elseif ($_POST["Country"] != "") {
	array_push($conditions, "(\"Country\" = '".$_POST["Country"]."')");
};

$relative_datings = [];
if ($_POST["RelativeDatingFrom"] != "") {
	$from = explode("#", $_POST["RelativeDatingFrom"])[0];
	if ($_POST["RelativeDatingTo"] != "") {
		$to = explode("#", $_POST["RelativeDatingTo"])[1];
	} else {
		$to = explode("#", $_POST["RelativeDatingFrom"])[1];
	};
	$relative_datings = range(intval($from), intval($to));
};
if ($relative_datings) {
	array_push($conditions, "(\"Relative_Dating_Order\" && ARRAY[".implode(",", $relative_datings)."])");
};

if ($_POST["AbsoluteDatingFrom"] != "") {
	array_push($conditions, "(NOT (\"C_14_CE_From\" < ".$_POST["AbsoluteDatingFrom"]."))");
};

if ($_POST["AbsoluteDatingTo"] != "") {
	array_push($conditions, "(NOT (\"C_14_CE_To\" > ".$_POST["AbsoluteDatingTo"]."))");
};

if (isset($_POST["ActivityArea"])) {
	array_push($conditions, "(\"Activity_Area\" IN ('".implode("','", $_POST["ActivityArea"])."'))");
};

if (isset($_POST["Feature"])) {
	array_push($conditions, "(\"Feature\" IN ('".implode("','", $_POST["Feature"])."'))");
};

if (isset($_POST["Material"])) {
	array_push($conditions, "(\"Material\" IN ('".implode("','", $_POST["Material"])."'))");
};

if ($conditions) {
	$query = $query." WHERE ".implode(" AND ", $conditions);
};
$query = $query." ORDER BY \"Arch14CZ_ID\" ASC";

$columns = array(
	"Arch14CZ_ID" => "Arch14CZ_ID", 
	"C_14_Lab_Code" => "Lab Code", 
	"C_14_Activity" => "<sup>14</sup>C Activity", 
	"C_14_Uncertainty" => "<sup>14</sup>C Uncertainty", 
	"C_14_CE_From" => "Cal. CE From", 
	"C_14_CE_To" => "Cal. CE To", 
	"C_14_Note" => "Notes", 
	"Reliability" => "Reliability", 
	"Reliability_Note" => "Reliability Notes", 
	"Country" => "Country", 
	"District" => "District", 
	"Cadastre" => "Cadastre",
	"Site" => "Site", 
	"Coordinates" => "Coordinates",
	"Site_AMCR_ID" => "Site AMCR",
	"Activity_Area" => "Activity Area",
	"Feature" => "Feature",
	"Context_Description" => "Context Description",
	"Context_Depth" => "Depth cm",
	"Context_Name" => "Context Name",
	"Relative_Dating_Name" => "Published Relative Dating",
	"Sample_Number" => "Sample Number",
	"Sample_Note" => "Sample Notes", 
	"Material" => "Material", 
	"Material_Note" => "Material Notes", 
	"Source" => "Source"
);

require_once("db_connect.php");
$results = pg_query($db, $query);
$num_rows = pg_num_rows($results);
$_SESSION['conditions'] = $conditions;
?>
<p>Found <?php echo $num_rows; ?> entries matching the query.</p>
<form action="export.php" method="post" enctype="multipart/form-data" id="exportform">
	<input type="submit" name="Export_CSV" value="Export to CSV"/>
	<input type="submit" name="Export_Excel" value="Export to Excel"/>
</form>
<table id="results">
	<thead>
		<tr>
			<?php
			foreach($columns as $field => $label) {
				echo "<td>".$label."</td>";
			};
			?>
		</tr>
	</thead>
	<tbody>
	<?php
	while ($row = pg_fetch_assoc($results)) {
		echo "<tr>";
		foreach($columns as $field => $label) {
			if ($field == "Source") {
				$sources = explode("\n", $row[$field]);
				if (count($sources) > 1) {
					echo "<td><div><ol>";
					foreach ($sources as $source) {
						echo "<li>".$source."</li>";
					}
					echo "</ol></div></td>";
				} else {
					echo "<td><div>".$sources[0]."</div></td>";
				}
			} elseif ($field == "Site_AMCR_ID") {
				echo "<td><div><a href=\"https://digiarchiv.aiscr.cz/id/".$row[$field]."\">".$row[$field]."</a></div></td>";
			} else {
				echo "<td><div>".$row[$field]."</div></td>";
			};
		};
		echo "</tr>";
	};
	?>
	</tbody>
</table>
