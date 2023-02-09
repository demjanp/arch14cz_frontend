<!doctype html>
<html>
<head>
	<title>Arch14CZ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="static/arch14cz_icon.ico?" />
	<link rel="stylesheet" type="text/css" href="static/style.css"/>
	<meta name="keywords" content="radiocarbon,czech republic,bohemia,moravia,chronology,dating,database,archaeology" />
	<meta property="og:title" content="Arch14CZ">
	<script type="text/javascript" src="static/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="static/results.js"></script>
</head>
<body>
	<div id="headline">
		<header>
			<h1><a href="?">Arch<span class="logo_a">14</span><span class="logo_b">C</span>Z</a></h1>
			<p>Radiocarbon Database of the Archaeological Institute of the Czech Academy of Sciences</p>
		</header>
		<div id="navigation">
			<ul>
				<li><a href="?page=query">QUERY</a></li>
				<li><a href="?page=about">ABOUT</a></li>
			</ul>
		</div>
	</div>
	<div id="content">
		<?php
			$page = isset($_GET['page']) ? $_GET['page'] : "query";
			require_once($page.".php");
		?>
	</div>
	<footer>
		<div class="footer">Powered by <img height="20" src="static/dep_cube.svg"/> <a href = "https://github.com/demjanp/deposit">Deposit</a></div>
	</footer>
</body>
</html>