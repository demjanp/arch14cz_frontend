<?php
header('Content-Type: application/xml; charset=utf-8');
header('Content-Disposition: attachment; filename=Relative_Dating.xml');
?>
<?xml version="1.0" encoding="utf-8" ?>
<arch14cz:table xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:arch14cz="<?php echo $schema_uri; ?>" xsi:schemaLocation="<?php echo $schema_uri." ".$schema_uri."arch14cz.xsd"; ?>">
<?php
$results = pg_query($db, "SELECT * FROM frontend.c_14_dict_relative_dating");
while($row = pg_fetch_assoc($results)) {
?>
  <arch14cz:term_row>
    <arch14cz:Name><?php sanitize_value($row["Name"]); ?></arch14cz:Name>
    <arch14cz:ID><?php sanitize_value($row["AMCR_ID"]); ?></arch14cz:ID>
    <arch14cz:Order_From><?php sanitize_value($row["Order_Min"]); ?></arch14cz:Order_From>
    <arch14cz:Order_To><?php sanitize_value($row["Order_Max"]); ?></arch14cz:Order_To>
 </arch14cz:term_row>
<?php
}
?>
</arch14cz:table>