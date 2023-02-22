<?php
if (isset($_POST["submit"])) {
	require_once("results.php");
} else {
	require_once("searchform.php");
};
require_once("updated.php");
pg_close($db);
?>