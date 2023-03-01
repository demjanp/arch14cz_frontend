<?php
header('Content-Type: application/xml; charset=utf-8');
header('Content-Disposition: attachment; filename=Metadata.xml');
?>
<?xml version="1.0" encoding="utf-8" ?>
<arch14cz:table xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:arch14cz="<?php echo $schema_uri; ?>" xsi:schemaLocation="<?php echo $schema_uri." ".$schema_uri."arch14cz.xsd"; ?>">
<?php
$results = pg_query($db, "SELECT * FROM frontend.c_14_metadata");
while($row = pg_fetch_assoc($results)) {
?>
  <arch14cz:metadata_row>
    <arch14cz:Variable><?php sanitize_value($row["Variable"]); ?></arch14cz:Variable>
    <arch14cz:Value><?php sanitize_value($row["Value"]); ?></arch14cz:Value>
  </arch14cz:metadata_row>
<?php
}
?>
</arch14cz:table>