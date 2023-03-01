<?php
header('Content-Type: application/xml; charset=utf-8');
?>
<?xml version="1.0" encoding="utf-8" ?>
<arch14cz:table xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:arch14cz="https://arch14.aiscr.cz/schema/1.0/" xsi:schemaLocation="https://arch14.aiscr.cz/schema/1.0/ https://arch14.aiscr.cz/schema/1.0/arch14cz.xsd">
<?php
$results = pg_query($db, "SELECT * FROM frontend.c_14_dict_feature");
while($row = pg_fetch_assoc($results)) {
?>
  <arch14cz:metadata_row>
    <arch14cz:Name><?php sanitize_value($row["Name"]); ?></arch14cz:Name>
	<arch14cz:AMCR_ID><?php sanitize_value($row["AMCR_ID"]); ?></arch14cz:AMCR_ID>
 </arch14cz:metadata_row>
<?php
}
?>
</arch14cz:table>