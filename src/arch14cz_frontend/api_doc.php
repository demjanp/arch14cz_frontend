<?php
require_once("Parsedown.php");
$parsedown = new Parsedown();
$text = file_get_contents("api_manual.md");
?>
<div class="column">
<?php
echo $parsedown->text($text);
//echo $text;
?>
</div>