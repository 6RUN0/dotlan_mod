<?php
if(isset($_GET['kll_id'])) {
  $kll_id = intval($_GET['kll_id']);
}
else {
  $kll_id = 0;
}

$kill = new Kill($kll_id);
$kill->system = $kill->getSystem();

// We are looking for the system name, constellation name and region name
$sysname = $kill->system->getName();
$sysconstel = $kill->system->getConstellationName();
$sysregion = $kill->system->getRegionName();

// Replaces spaces by underscores
$sysname = str_replace(' ', '_', $sysname);
$sysconstel = str_replace(' ', '_', $sysconstel);
$sysregion = str_replace(' ', '_', $sysregion);

$smarty->assign('dotlan_sys_name', $sysname);
$smarty->assign('dotlan_sys_constel', $sysconstel);
$smarty->assign('dotlan_sys_region', $sysregion);

// Classified ?
if($kill->isClassified()) {
  $smarty->assign('classified', 'display: none');
}
else {
  $smarty->assign('notClassified', 'display: none');
}
?>
