<?php
$server = "http://".$_SERVER['SERVER_NAME'];
?>

<div class="column">
<h2 class="first">Arch14CZ - API</h2>
<p>The Arch14CZ database can be accessed via an API in XML format.</p>
<p><a href="<?php echo $server; ?>/schema/1.0/">XML schema</a></p>
<p>Different types of data are queried using the following verbs:</p>
<h3>ListMetadata</h3>
<p>Query: <a href="?verb=ListMetadata"><?php echo $server; ?>/?verb=ListMetadata</a></p>
<p>Retrieves metadata about the database, such as the date of last update.</p>
<h3>ListRecords</h3>
<p>Query: <a href="?verb=ListRecords"><?php echo $server; ?>/?verb=ListRecords</a></p>
<p>Retrieves all records of the database.</p>
<h3>GetRecord</h3>
<p>Query: <a href="?verb=GetRecord&amp;identifier=A14CZ_20230301_0004"><?php echo $server; ?>/?verb=GetRecord&amp;identifier=A14CZ_20230301_0004</a></p>
<p>Retrieves one record based on the identifier.</p>
<h3>ListDictionary</h3>
<p>Retrieves contents of different dictionaries used in the <a href="<?php echo $server; ?>/?page=query">query form</a>.
The following dictionaries can be retrieved:</p>
<h4>Country</h4>
<p>Query: <a href="?verb=ListDictionary&amp;name=Country"><?php echo $server; ?>/?verb=ListDictionary&amp;name=Country</a></p>
<h4>District</h4>
<p>Query: <a href="?verb=ListDictionary&amp;name=District"><?php echo $server; ?>/?verb=ListDictionary&amp;name=District</a></p>
<h4>Cadastre</h4>
<p>Query: <a href="?verb=ListDictionary&amp;name=Cadastre"><?php echo $server; ?>/?verb=ListDictionary&amp;name=Cadastre</a></p>
<h4>Relative Dating</h4>
<p>Query: <a href="?verb=ListDictionary&amp;name=Relative_Dating"><?php echo $server; ?>/?verb=ListDictionary&amp;name=Relative_Dating</a></p>
<h4>Activity Area</h4>
<p>Query: <a href="?verb=ListDictionary&amp;name=Activity_Area"><?php echo $server; ?>/?verb=ListDictionary&amp;name=Activity_Area</a></p>
<h4>Feature</h4>
<p>Query: <a href="?verb=ListDictionary&amp;name=Feature"><?php echo $server; ?>/?verb=ListDictionary&amp;name=Feature</a></p>
<h4>Material</h4>
<p>Query: <a href="?verb=ListDictionary&amp;name=Material"><?php echo $server; ?>/?verb=ListDictionary&amp;name=Material</a></p>
</div>