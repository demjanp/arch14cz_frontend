<?php
require_once("db_connect.php");
$metadata = pg_query($db, "SELECT * FROM frontend.c_14_metadata");
$date_updated = "";
while ($row = pg_fetch_assoc($metadata)) {
	if ($row["Variable"] == "date_updated") {
		$date_updated = $row["Value"];
	};
}
?>
<p>Last update: <?php echo $date_updated; ?></p>