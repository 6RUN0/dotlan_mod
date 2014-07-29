<?php
require_once("common/admin/admin_menu.php");
$page = new Page('Dotlan Mod - Settings');

$version = "1.11"; //Version Update for me, do not change!

$versiondb = config::get('dotlan_mod_ver');
if($version != $versiondb) 
{ 
  config::set('dotlan_mod_ver', $version); 
  $html .= "<br /><b>This Mod got updated, have fun with it! New version set!</b><br /><br />";
}

switch($_GET["step"]){
 default:
 
$html .= 'Thank you for using my mod!<br />Greetings, Khi3l, for <a href="http://www.babylonknights.com">Babylon Knights</a>';

break;
}
$page->setContent($html);
$page->addContext($menubox->generate());
$page->generate();
?>
