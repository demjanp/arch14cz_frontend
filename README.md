# Arch14CZ - Frontend
Frontend interface for Arch14CZ - Czech Archaeological Radiocarbon Database

:warning: Unofficial development version :warning:

Active version at <https://github.com/ARUP-CAS/aiscr-arch14cz-frontend>

Created on 14. 12. 2021

**Table of Contents**
1. [About Arch14CZ](#about)
2. [Developer Notes](#developer)
   1. [Cloning the GitHub Project](#cloning)
   2. [Publishing the Frontend](#publishing)
3. [Contact](#contact)
4. [Acknowledgements](#acknowledgements)
5. [License](#license)

## About Arch14CZ - Frontend <a name="about"></a>
Frontend web interface for Arch14CZ - Czech Archaeological Radiocarbon Database.

For the backend interface see the [arch14cz_backend](https://github.com/demjanp/arch14cz_backend) project.

## Developer Notes <a name="developer"></a>
Arch14CZ - Frontend requires PHP 5 and PostgreSQL installed on the server.

### Cloning the GitHub Project <a name="cloning"></a>

To clone the `arch14cz_frontend` GitHub project, follow these steps:

1. Make sure you have [Git](https://git-scm.com/downloads) installed on your computer.
2. Open a terminal or command prompt window.
3. Navigate to the Arch14CZ - Frontend root directory.
4. Run the following command:
<pre><code>git clone https://github.com/demjanp/arch14cz_frontend.git</code></pre>
5. The repository will be cloned to a new directory named `arch14cz_frontend` in your current directory.

### Publishing the Frontend <a name="publishing"></a>

1. Download the [latest release](https://github.com/demjanp/arch14cz_frontend/releases/latest).
2. Edit the `db_connect.php` file to reflect the correct the hostname, database name, username and password of the Arch14CZ frontend database.
3. Upload the contents of the folder `src/arch14cz_frontend` to the root directory on the web server. 

## Contact: <a name="contact"></a>
Peter Demján (peter.demjan@gmail.com)

Institute of Archaeology of the Czech Academy of Sciences, Prague, v.v.i.

## Acknowledgements <a name="acknowledgements"></a>

Development of this software was supported by OP RDE, MEYS, under the project "Ultra-trace isotope research in social and environmental studies using accelerator mass spectrometry", Reg. No. CZ.02.1.01/0.0/0.0/16_019/0000728.

This software uses the following open source packages:
* [PHP_XLSXWriter](https://github.com/mk-j/PHP_XLSXWriter)
* [Zoom](https://github.com/jackmoore/zoom)

## License <a name="license"></a>

This code is licensed under the [GNU GENERAL PUBLIC LICENSE](https://www.gnu.org/licenses/gpl-3.0.en.html) - see the [LICENSE](LICENSE) file for details
