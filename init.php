<?php
/**
* $Id$
*
* @category Init
* @package  Dotlan_Mod
* @author   Khi3l, boris_t <boris@talovikov.ru>
* @license  http://opensource.org/licenses/MIT MIT
*/

$modInfo['dotlan_mod'] = array(
    'name' => 'Dotlan Map',
    'abstract' => 'Provide menu with links to dotlan maps.',
    'about'=> 'by Greetings, Khi3l, for <a href="http://www.babylonknights.com">Babylon Knights</a>',
);

event::register('killDetail_context_assembling', 'Dotlan::add');

/**
 * Provides callback for event::register.
 */
class Dotlan
{

    /**
     * Adds a callbacks in the queue.
     *
     * @param pKillDetail $page object of pKillDetail class
     *
     * @return none
     */
    static function add($page)
    {
        $page->addBehind('menu', 'Dotlan::show');
    }

    /**
     * Render "Dotlan Maps" menu.
     *
     * @param pKillDetail $page object of pKillDetail class
     *
     * @return none
     */
    static function show($page)
    {
        global $smarty;

        if ($page->kll_id) {
            $kill = new Kill($page->kll_id);
        } else {
            $kill = new Kill($page->kll_external_id, true);
        }

        $system = $kill->getSystem();
        $system_id = $system->getID();
        $constellation_id = $system->getConstellationID();
        $region_id = $system->getRegionID();

        $menubox = new box('Dotlan Maps');
        $menubox->setIcon('menu-item.gif');
        $dotlan = 'http://evemaps.dotlan.net';
        if ($system_id) {
            $menubox->addOption('link', 'Show me on map', "${dotlan}/map/${system_id}");
            $menubox->addOption('link', 'System', "${dotlan}/system/${system_id}");
        }
        if ($constellation_id) {
            $menubox->addOption('link', 'Constellation', "${dotlan}/map/${constellation_id}");
        }
        if ($region_id) {
            $menubox->addOption('link', 'Region', "${dotlan}/map/${region_id}");
        }
        return $menubox->generate();
    }
}
