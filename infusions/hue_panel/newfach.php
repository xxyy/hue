<?php
/*---------------------------------------------------------------------------+
| Hausübungsinformationssystem HÜ
| Copyright (C) 2010 - 2010 
| http://blacktigers.bplaced.net/
+----------------------------------------------------------------------------+
| Filename: newfach.php
| Author: xxyy
+----------------------------------------------------------------------------+
| This program is released as free software under the Affero GPL license.
| You can redistribute it and/or modify it under the terms of this license
| which you can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this copyright header is
| strictly prohibited without written permission from the original author(s).
+---------------------------------------------------------------------------*/
require_once "../../maincore.php";
require_once THEMES."templates/header.php";
$nooff=true;
require_once "hue.icl.php";
if(isset($_POST['submit'])){
openside("Neues Fach erstellt");
echo'<div class="admin-message">Neues Fach erstellt</div>';
$edit=dbquery("INSERT INTO ".DB_HUE_FACH." SET name='".$_POST['name']."',kurz='".$_POST['kurz']."'");
closeside();
footer_hue();
} elseif(isset($_GET['delete'])) {
openside("Fach l&ouml;schen");
echo'<a href="newfach.php?del=true&fach='.$_GET['fach'].'">Wirklich l&ouml;schen?</a>';
closeside();
footer_hue();
} elseif(isset($_GET['del'])) {
openside("Klasse gel&ouml;scht");
dbquery("DELETE FROM ".DB_HUE_FACH." WHERE id='".$_GET['fach']."'");
echo'gel&ouml;scht.';
closeside();
footer_hue();
} else {
openside("Neues Fach erstellen");
echo'Du bist gerade im Begriff, ein neues Fach zu erstellen.Dieses kann dann f&uuml;r neue Haus&uuml;bungsinformationen verwendet werden.Bitte vergewissere dich, dass das zu erstellende Fach noch nicht existiert!';
echo"Fach erstellen:<form name='inputform' action='newfach.php' method='post'><table cellpadding='0' cellspacing='0' width='100%' class='tbl-border'>";
echo"<tr class='tbl1'><td>Name:</td><td><input name='name' type='text' class='textbox' /></td></tr>
<tr class='tbl2'><td>K&uuml;rzel:</td><td><input name='kurz' type='text' class='textbox' /></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Fach erstellen' class='button' /></td></tr></table></form>";
closeside();
footer_hue();
}
?>