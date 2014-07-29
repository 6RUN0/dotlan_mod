<?php

$modInfo['dotlan_mod']['name'] = 'Dotlan Map';
$modInfo['dotlan_mod']['abstract'] = 'Provide menu with links to dotlan maps.';
$modInfo['dotlan_mod']['about'] = 'by Greetings, Khi3l, for <a href="http://www.babylonknights.com">Babylon Knights</a>';

event::register('killDetail_context_assembling', 'dotlan::add');

class dotlan {

  function add($page) {
    $page->addBehind('menu', 'dotlan::show');
  }
  
  function show($page) {

    global $smarty;

    if($page->kll_id) {
      $kill = new Kill($page->kll_id);
    }
    else {
      $kill = new Kill($page->kll_external_id, TRUE);
    }

    $system = $kill->getSystem();
    $system_id = $system->getID();
    $constellation_id = $system->getConstellationID();
    $region_id = $system->getRegionID();

    $menubox = new box('Dotlan Maps');
    $menubox->setIcon('menu-item.gif');
    $dotlan = 'http://evemaps.dotlan.net';
    if($system_id) {
      $menubox->addOption('link', 'Show me on map', "${dotlan}/map/${system_id}");
      $menubox->addOption('link', 'System', "${dotlan}/system/${system_id}");
    }
    if($constellation_id) {
      $menubox->addOption('link', 'Constellation', "${dotlan}/map/${constellation_id}");
    }
    if($region_id) {
      $menubox->addOption('link', 'Region', "${dotlan}/map/${region_id}");
    }
    return $menubox->generate();
  }
}
