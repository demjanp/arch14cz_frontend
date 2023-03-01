<?php
require_once("db_connect.php");
$countries = pg_query($db, "SELECT * FROM frontend.c_14_dict_country ORDER BY \"Name\" ASC");
$districts = pg_query($db, "SELECT * FROM frontend.c_14_dict_district ORDER BY \"Code\" ASC");
$cadastres = pg_query($db, "SELECT * FROM frontend.c_14_dict_cadastre ORDER BY \"Name\" ASC");
$relative_datings = pg_query($db, "SELECT * FROM frontend.c_14_dict_relative_dating");
$activity_areas = pg_query($db, "SELECT * FROM frontend.c_14_dict_activity_area ORDER BY \"Name\" ASC");
$features = pg_query($db, "SELECT * FROM frontend.c_14_dict_feature ORDER BY \"Name\" ASC");
$materials = pg_query($db, "SELECT * FROM frontend.c_14_dict_material ORDER BY \"Name\" ASC");
?>

<div id="searchform">
	<h2 class="first">Query Database</h2>
	<form action="" method="post">
		<div class="searchgroup">
			<fieldset>
				<legend>Location</legend>
				<table>
					<tr>
						<td>Country:</td>
						<td>Czech Republic</td>
					</tr>
					<tr>
						<td>District:</td>
						<td>
							<select name="District" id="District">
								<option value=""></option>
								<?php
								while ($row = pg_fetch_assoc($districts)) { ?>
									<option value="<?php echo $row["Code"]; ?>"><?php echo $row["Name"]; ?></option>
								<?php };?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Cadastre:</td>
						<td>
							<select name="Cadastre" id="Cadastre">
								<option value=""></option>
								<?php
								while ($row = pg_fetch_assoc($cadastres)) { ?>
									<option value="<?php echo $row["Code"]; ?>"><?php echo $row["Name"]; ?></option>
								<?php };?>
							</select>
						</td>
					</tr>
					<tr>
				</table>
			</fieldset>
			<fieldset>
				<legend>Published Relative Dating</legend>
				<table>
					<tr>
						<td>From:</td>
						<td>
							<select name="RelativeDatingFrom" id="RelativeDatingFrom">
								<option value=""></option>
								<?php
								while ($row = pg_fetch_assoc($relative_datings)) { ?>
									<option value="<?php echo $row["Code"]; ?>"><?php echo $row["Name"]; ?></option>
								<?php };?>
							</select>
						</td>
					</tr>
					<tr>
						<td>To:</td>
						<td>
							<select name="RelativeDatingTo" id="RelativeDatingTo">
								<option value=""></option>
								<?php
								pg_result_seek($relative_datings, 0);
								while ($row = pg_fetch_assoc($relative_datings)) { ?>
									<option value="<?php echo $row["Code"]; ?>"><?php echo $row["Name"]; ?></option>
								<?php };?>
							</select>
						</td>
					</tr>
				</table>
			</fieldset>
			
			<fieldset>
				<legend>Absolute Dating</legend>
				<table>
					<tr>
						<td>From:</td>
						<td>
							<input type="text" name="AbsoluteDatingFrom" id="AbsoluteDatingFrom" placeholder="Years (Common Era)">
						</td>
					</tr>
					<tr>
						<td>To:</td>
						<td>
							<input type="text" name="AbsoluteDatingTo" id="AbsoluteDatingTo" placeholder="Years (Common Era)">
						</td>
					</tr>
				</table>
				Note: BCE dates are entered as negative values.
			</fieldset>
		</div>
		
		<div class="searchgroup">
		
			<fieldset>
				<legend>Activity Area:</legend>
				<div class = "checklist">
					<?php
					while ($row = pg_fetch_assoc($activity_areas)) { ?>
						<input type="checkbox" name="ActivityArea[]" value="<?php echo $row["Name"]; ?>" id="<?php echo $row["Name"]; ?>"><label for="<?php echo $row["Name"]; ?>"><?php echo $row["Name"]; ?></label><br/>
					<?php };?>
				</div>
			</fieldset>
			
			<fieldset>
				<legend>Feature:</legend>
				<div class = "checklist">
					<?php
					while ($row = pg_fetch_assoc($features)) { ?>
						<input type="checkbox" name="Feature[]" value="<?php echo $row["Name"]; ?>" id="<?php echo $row["Name"]; ?>"><label for="<?php echo $row["Name"]; ?>"><?php echo $row["Name"]; ?></label><br/>
					<?php };?>
				</div>
			</fieldset>
			
			<fieldset>
				<legend>Material:</legend>
				<div class = "checklist">
					<?php
					while ($row = pg_fetch_assoc($materials)) { ?>
						<input type="checkbox" name="Material[]" value="<?php echo $row["Name"]; ?>" id="<?php echo $row["Name"]; ?>"><label for="<?php echo $row["Name"]; ?>"><?php echo $row["Name"]; ?></label><br/>
					<?php };?>
				</div>
			</fieldset>
		
		</div>
		
		<div class="searchgroup">
			<input type="submit" name="submit" value="Submit" id="btn">
		</div>
	</form>
</div>
<div class="column">
	<h2>Relative Dating Ordering</h2>
	<div class='zoom' id='datings_overview'>
	   <img src='static/relative_datings.png' width='100%'/>
	</div>
</div>