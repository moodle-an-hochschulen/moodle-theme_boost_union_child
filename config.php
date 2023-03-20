<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme Boost Union Child - Theme config
 *
 * @package    theme_boost_union_child
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$THEME->name = 'boost_union_child';
$THEME->parents = ['boost_union','boost'];
$THEME->prescsscallback = 'theme_boost_union_child_get_pre_scss';
$THEME->scss = function() {
    return theme_boost_union_child_get_main_scss_content();
};
// Note: This is necessary as long as MDL-77657 isn't done, as the order for grandchild themes is mixed up
$THEME->extrascsscallback = 'theme_boost_union_child_get_extra_scss';
# This is for fallback compiled scss if compilation fails (use Boost Union's)
$THEME->precompiledcsscallback = 'theme_boost_union_get_precompiled_css';
# We don't provide our own fallback CSS file
$THEME->usefallback = false;

// The $THEME->layouts setting is not duplicated here as they are properly inherited from theme_boost_union.
// Note: layouts are taken youngest to oldest, first found
$THEME->enable_dock = false;
$THEME->yuicssmodules = [];
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->requiredblocks = '';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
$THEME->iconsystem = \core\output\icon_system::FONTAWESOME;
$THEME->haseditswitch = true;
$THEME->usescourseindex = true;
$THEME->removedprimarynavitems = explode(',', get_config('theme_boost_union', 'hidenodesprimarynavigation'));
// By default, all boost theme do not need their titles displayed.
$THEME->activityheaderconfig = [
    'notitle' => true
];
