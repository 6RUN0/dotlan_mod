<?php
event::register("killDetail_context_assembling", "dotlan::add");

class dotlan {
	function add($page)
	{
		$page->addBehind("menu", "dotlan::show");
	}
  
  function show(){
  	global $smarty;
 		include_once('mods/dotlan_mod/dotlan_mod.php');
  	$html .= $smarty->fetch("../../../mods/dotlan_mod/dotlan_mod.tpl");
    return $html;
  }
}
?>
