<?php
header('Content-Type: application/xml; charset=utf-8');

function calcOrder($row) {
	
	$order = explode(",", substr($row["Relative_Dating_Order"], 1, -1));
	$from = min($order);
	$to = max($order);
	$row["Order_From"] = $from;
	$row["Order_To"] = $to;
	
	return $row;
}

?>
<?xml version="1.0" encoding="utf-8" ?>
<arch14cz:table xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:arch14cz="https://arch14.aiscr.cz/schema/1.0/" xsi:schemaLocation="https://arch14.aiscr.cz/schema/1.0/ https://arch14.aiscr.cz/schema/1.0/arch14cz.xsd">
<?php
$results = pg_query($db, "SELECT * FROM frontend.c_14_main WHERE \"Arch14CZ_ID\" = '".$_GET["identifier"]."'");
while($row = pg_fetch_assoc($results)) {
	$row = calcOrder($row);
?>
  <arch14cz:record_row>
    <arch14cz:Arch14CZ_ID><?php sanitize_value($row["Arch14CZ_ID"]); ?></arch14cz:Arch14CZ_ID>
    <arch14cz:C_14_Lab_Code><?php sanitize_value($row["C_14_Lab_Code"]); ?></arch14cz:C_14_Lab_Code>
    <arch14cz:C_14_Activity><?php sanitize_value($row["C_14_Activity"]); ?></arch14cz:C_14_Activity>
    <arch14cz:C_14_Uncertainty><?php sanitize_value($row["C_14_Uncertainty"]); ?></arch14cz:C_14_Uncertainty>
    <arch14cz:C_14_CE_From><?php sanitize_value($row["C_14_CE_From"]); ?></arch14cz:C_14_CE_From>
    <arch14cz:C_14_CE_To><?php sanitize_value($row["C_14_CE_To"]); ?></arch14cz:C_14_CE_To>
    <arch14cz:C_14_Note><?php sanitize_value($row["C_14_Note"]); ?></arch14cz:C_14_Note>
    <arch14cz:Reliability><?php sanitize_value($row["Reliability"]); ?></arch14cz:Reliability>
    <arch14cz:Reliability_Note><?php sanitize_value($row["Reliability_Note"]); ?></arch14cz:Reliability_Note>
    <arch14cz:Country ID="<?php sanitize_value($row["Country_Code"]); ?>"><?php sanitize_value($row["Country"]); ?></arch14cz:Country>
    <arch14cz:District ID="<?php sanitize_value($row["District_Code"]); ?>"><?php sanitize_value($row["District"]); ?></arch14cz:District>
    <arch14cz:Cadastre ID="<?php sanitize_value($row["Cadastre_Code"]); ?>"><?php sanitize_value($row["Cadastre"]); ?></arch14cz:Cadastre>
    <arch14cz:Site><?php sanitize_value($row["Site"]); ?></arch14cz:Site>
    <arch14cz:Site_AMCR_ID><?php sanitize_value($row["Site_AMCR_ID"]); ?></arch14cz:Site_AMCR_ID>
    <arch14cz:Coordinates><?php sanitize_value($row["Coordinates"]); ?></arch14cz:Coordinates>
    <arch14cz:Activity_Area><?php sanitize_value($row["Activity_Area"]); ?></arch14cz:Activity_Area>
    <arch14cz:Activity_Area_AMCR_ID><?php sanitize_value($row["Activity_Area_AMCR_ID"]); ?></arch14cz:Activity_Area_AMCR_ID>
    <arch14cz:Feature><?php sanitize_value($row["Feature"]); ?></arch14cz:Feature>
    <arch14cz:Feature_AMCR_ID><?php sanitize_value($row["Feature_AMCR_ID"]); ?></arch14cz:Feature_AMCR_ID>
    <arch14cz:Context_Description><?php sanitize_value($row["Context_Description"]); ?></arch14cz:Context_Description>
    <arch14cz:Context_Depth><?php sanitize_value($row["Context_Depth"]); ?></arch14cz:Context_Depth>
    <arch14cz:Context_Name><?php sanitize_value($row["Context_Name"]); ?></arch14cz:Context_Name>
    <arch14cz:Relative_Dating_Name><?php sanitize_value($row["Relative_Dating_Name"]); ?></arch14cz:Relative_Dating_Name>
    <arch14cz:Relative_Dating_AMCR_ID><?php sanitize_value($row["Relative_Dating_AMCR_ID"]); ?></arch14cz:Relative_Dating_AMCR_ID>
    <arch14cz:Relative_Dating_Order_From><?php sanitize_value($row["Order_From"]); ?></arch14cz:Relative_Dating_Order_From>
    <arch14cz:Relative_Dating_Order_To><?php sanitize_value($row["Order_To"]); ?></arch14cz:Relative_Dating_Order_To>
    <arch14cz:Sample_Number><?php sanitize_value($row["Sample_Number"]); ?></arch14cz:Sample_Number>
    <arch14cz:Sample_Note><?php sanitize_value($row["Sample_Note"]); ?></arch14cz:Sample_Note>
    <arch14cz:Material><?php sanitize_value($row["Material"]); ?></arch14cz:Material>
    <arch14cz:Material_AMCR_ID><?php sanitize_value($row["Material_AMCR_ID"]); ?></arch14cz:Material_AMCR_ID>
    <arch14cz:Material_Note><?php sanitize_value($row["Material_Note"]); ?></arch14cz:Material_Note>
    <arch14cz:Source><?php sanitize_value($row["Source"]); ?></arch14cz:Source>
  </arch14cz:record_row>
<?php
}
?>
</arch14cz:table>