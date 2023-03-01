<?php
require_once("db_connect.php");
$metadata = pg_query($db, "SELECT * FROM frontend.c_14_metadata");
$date_updated = "";
while ($row = pg_fetch_assoc($metadata)) {
	if ($row["Variable"] == "date_updated") {
		$date_updated = $row["Value"];
	};
}
$date_now = date("d.m.Y");
?>
<div class="column">
<h2 class="first">About the Database</h2>
<p>The purpose of the Czech Archaeological Radiocarbon Database (Arch14CZ) is to gather all radiocarbon dates from archaeological contexts in Czechia. Outside the scope remains radiocarbon dating of palaeoecological contexts without direct human impact, like palynological cores or anthracological sampling. On the other hand, unlimited is the chronological scope of Arch14CZ, meaning that all periods of archaeological research are covered.</p>
<p>It was developed within the project RAMSES (Ultra-trace isotope research in social and environmental studies using accelerator mass spectrometry) and has been available online since March 2023. It is integrated into the framework of the <a href="https://www.aiscr.cz">Archaeological Information System of the Czech Republic</a> administered by the Institutes of Archaeology of the Czech Academy of Sciences with the intention to ensure long-term maintenance and periodic updates.</p>

<h2>Citation</h2>
<p>Please cite the database as</p>
<blockquote>
<p>Vondrovský, V. - Demján, P. - Dreslerová, D. 2023: Arch14CZ - Czech Archaeological Radiocarbon Database. Available at: <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/">http://<?php echo $_SERVER['SERVER_NAME']; ?>/</a> [accessed <?php echo $date_now;?>].</p>
</blockquote>

<h2>Data Structure</h2>
<p>The database contains the following fields:</p>
<ol>
	<li><strong>Arch14CZ ID</strong> - Unique ID.</li>
	<li><strong>Lab Code</strong> - The laboratory code is unique for each sample and serves to identify it. It also carries information about the laboratory that measured the sample.</li>
	<li><strong>14C Activity</strong> - C-14 measurement in radiocarbon (uncalibrated) years BP.</li>
	<li><strong>14C Uncertainty</strong> - 1-sigma uncertainty of the measurement.</li>
	<li><strong>Cal CE From, Cal CE To</strong> - 95.45% range of the calibrated radiocarbon date in calendar years of the Common Era.</li>
	<li><strong>Notes</strong></li>
	<li><strong>Reliability</strong> - Reliability of the C-14 dating in respect to the archaeological context.</li>
	<li><strong>Reliability Notes</strong></li>
	<li><strong>Country</strong></li>
	<li><strong>Country Code</strong></li>
	<li><strong>District</strong></li>
	<li><strong>District Code</strong></li>
	<li><strong>Cadastre</strong></li>
	<li><strong>Cadastre Code</strong></li>
	<li><strong>Site</strong> - Unique name of the site where the sample was collected.</li>
	<li><strong>Site AMCR ID</strong> - ID of the Site in the Archaeological Map of the Czech Republic.</li>
	<li><strong>Coordinates</strong> - WGS 84 standard, format XX.XXXXXXXN, XX.XXXXXXXE</li>
	<li><strong>Activity Area</strong> - Type of the archaeological activity area according to the AMCR dictionary.</li>
	<li><strong>Activity Area AMCR ID</strong></li>
	<li><strong>Feature</strong> - Type of the archaeological feature according to the AMCR dictionary.</li>
	<li><strong>Feature AMCR ID</strong></li>
	<li><strong>Context Description</strong> - Description of the position of the sample within the feature.</li>
	<li><strong>Depth cm</strong> - Depth at which the sample was retrieved.</li>
	<li><strong>Context Name</strong> - Identifier of the context within the site.</li>
	<li><strong>Published Relative Dating</strong> - Relative dating of the context as published in the original source.</li>
	<li><strong>Relative Dating AMCR ID</strong></li>
	<li><strong>Dating Order From, Dating Order To</strong> - Ordering of the relative dating of the context based on relative chronological relations with the other datings.</li>
	<li><strong>Sample Number</strong> - ID assigned by the submitter of the dated sample.</li>
	<li><strong>Sample Notes</strong> - Includes collagen values and other accompanying measurements.</li>
	<li><strong>Material</strong> - General type of the material of the sample.</li>
	<li><strong>Material AMCR ID</strong></li>
	<li><strong>Material Notes</strong> - Detailed description of the material.</li>
	<li><strong>Source</strong> - Primary (usually a publication) and Secondary (usually a database) sources of information about the C-14 measurement.</li>
</ol>

<h2>Sources</h2>
<p>All data is based on published sources that are properly cited. Some of the records were previously published in other databases, such as the database <em>Archaeological Chronometry in Slovakia</em> (<a href="http://www.c14.sk">c14.sk</a>) <small><a href="#foot1">1</a></small>, the database of the project <em>Land use, social transformations and woodland in Central European Prehistory</em> (<a href="http://doi.org/10.5334/joad.85">LASOLES</a>) <small><a href="#foot2">2</a></small> and <em>The Cultural Evolution of Neolithic Europe</em> (<a href="https://discovery.ucl.ac.uk/id/eprint/1469811">EUROEVOL</a>) dataset <small><a href="#foot3">3</a></small>. Data from these sources have been verified with the original publications and further enhanced with information about the context and dated sample. In such cases, the database is cited as a secondary source.</p>

<h2>Last Update</h2>
<p>Latest database update: <?php echo $date_updated;?></p>

<h2>Contact</h2>
<p>Did you notice any mistakes or missing dates? Do you want to upload your radiocarbon dates? Do you have questions concerning the database?</p>
<p>Let us know at <a href="mailto:vondrovsky@arup.cas.cz">vondrovsky@arup.cas.cz</a></p>

<h2>Developer Notes</h2>
<p>The frontend and backend interface of this database is Free and Open Source and available at the following locations:</p>
<p><a href="https://github.com/demjanp/arch14cz_backend">Arch14CZ - Backend</a></p>
<p><a href="https://github.com/demjanp/arch14cz_frontend">Arch14CZ - Frontend</a></p>

<h2>Acknowledgements</h2>
<p>Development of this database was supported by OP RDE, MEYS, under the project &quot;Ultra-trace isotope research in social and environmental studies using accelerator mass spectrometry&quot;, Reg. No. CZ.02.1.01/0.0/0.0/16_019/0000728.</p>
<p><img src="static/EU_logo.png"/><img src="static/MSMT_logo.png"/></p>
<p>The operation of Arch14CZ is supported by the large research infrastructure project AIS CR (LM2023031).</p>
<p><img src="static/AISCR_logo.png"/></p>

<h2>License</h2>
<p>The content of this page is licensed under a <a href="https://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International Licence</a>. Use of data and metadata is subject to this license unless explicitly stated otherwise.</p>

<h2>References</h2>
<small>
<p>
[1]<a name="foot1"></a>: Barta, P. - Demján, P. - Hladíková, K. - Kmeťová, P. - Piatničková, K. 2013: Database of radiocarbon dates measured on archaeological samples from Slovakia, Czechia, and adjacent regions. Archaeological Chronometry in Slovakia, Slovak Research and Development Agency Project No. APVV-0598-10, 2011 -2014, Dept. of Archaeology, Faculty of Arts, Comenius University in Bratislava. Available at: <a href="http://www.c14.sk">http://www.c14.sk</a>
</p>
<p>[2]<a name="foot2"></a>: Tkáč, P. – Kolář, J. 2021: Towards New Demography Proxies and Regional Chronologies: Radiocarbon Dates from Archaeological Contexts Located in the Czech Republic Covering the Period Between 10,000 BC and AD 1250. Journal of Open Archaeology Data 9, 9. <a href="http://doi.org/10.5334/joad.85">http://doi.org/10.5334/joad.85</a>
</p>
<p>[3]<a name="foot3"></a>: Manning, K. - Colledge, S. - Crema, E. - Shennan, S. - Timpson, A. 2016: The Cultural Evolution of Neolithic Europe. EUROEVOL Dataset 1: Sites, Phases and Radiocarbon Data.  Journal of Open Archaeology Data,  5(0), p.e2. <a href="https://doi.org/10.5334/joad.40">https://doi.org/10.5334/joad.40</a>
</p>
</small>
</div>
