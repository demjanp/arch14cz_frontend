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
<h2>About the Database</h2>
<p>The purpose of the Czech Archaeological Radiocarbon Database (Arch14CZ) is to gather all radiocarbon dates from archaeological contexts in Czechia. Outside the scope remains radiocarbon dating of palaeoecological contexts without direct human impact, like palynological cores or anthracological sampling. On the other hand, unlimited is the chronological scope of Arch14CZ, meaning that all periods of archaeological research are covered.</p>
<p>It was developed within the project RAMSES (Ultra-trace isotope research in social and environmental studies using accelerator mass spectrometry) and has been available online since March 2023. It is integrated into the structure of the Archaeological Map of the Czech Republic administered by the <a href="https://www.arup.cas.cz/">Institute of Archaeology of the Czech Academy of Sciences</a> with the intention to ensure long-term maintenance and periodic updates.</p>
<h3>Citation</h3>
<p>Please cite the database as</p>
<blockquote>
<p>Vondrovský, V. - Demján, P. - Dreslerová, D. 2023: Arch14CZ - Czech Archaeological Radiocarbon Database. Available at: <a href="https://www.arch14.cz/">https://www.arch14.cz/</a> [accessed <?php echo $date_now;?>].</p>
</blockquote>
<h3>Sources</h3>
<p>All data is based on published sources that are properly cited. Some of the records were previously published in other databases, such as the database <em>Archaeological Chronometry in Slovakia</em> (<a href="http://www.c14.sk">c14.sk</a>) <small><a href="#foot1">1</a></small>, the database of the project <em>Land use, social transformations and woodland in Central European Prehistory</em> (<a href="http://doi.org/10.5334/joad.85">LASOLES</a>) <small><a href="#foot2">2</a></small> and <em>The Cultural Evolution of Neolithic Europe</em> (<a href="https://discovery.ucl.ac.uk/id/eprint/1469811">EUROEVOL</a>) dataset <small><a href="#foot3">3</a></small>. Data from these sources have been verified with the original publications and further enhanced with information about the context and dated sample. In such cases, the database is cited as a secondary source.</p>
<h3>Last Update</h3>
<p>Latest database update: <?php echo $date_updated;?></p>
<h3>Contact</h3>
<p>Did you notice any mistakes or missing dates? Do you want to upload your radiocarbon dates? Do you have questions concerning the database?</p>
<p>Let us know at <a href="mailto:vondrovsky@arup.cas.cz">vondrovsky@arup.cas.cz</a></p>
<h3>Developer Notes</h3>
<p>The frontend and backend interface of this database is Free and Open Source and available at the following locations:</p>
<p><a href="https://github.com/demjanp/arch14cz_backend">Arch14CZ - Backend</a></p>
<p><a href="https://github.com/demjanp/arch14cz_frontend">Arch14CZ - Frontend</a></p>
<h3>Acknowledgements</h3>
<p>Development of this database was supported by OP RDE, MEYS, under the project &quot;Ultra-trace isotope research in social and environmental studies using accelerator mass spectrometry&quot;, Reg. No. CZ.02.1.01/0.0/0.0/16_019/0000728.</p>
<h3>License</h3>
<p>The content of this page is licensed under a <a href="https://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution 4.0 International Licence</a>. Use of data and metadata is subject to this license unless explicitly stated otherwise.</p>
<h3>References</h3>
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
