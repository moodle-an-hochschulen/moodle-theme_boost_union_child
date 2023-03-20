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
 * Theme Boost Union Child - Library
 *
 * @package    theme_boost_union_child
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
* Returns the main SCSS content.
* @return string
*/
function theme_boost_union_child_get_main_scss_content():string {
    global $CFG;
    // Reuse the scss of Boost Union to be able to just use Boost Union's settings
    $scss = theme_boost_union_get_main_scss_content(theme_config::load('boost_union'));
    $scss .= file_get_contents($CFG->dirroot . '/theme/boost_union_child/scss/post.scss');
    return $scss;
}

/**
 * Note: This is necessary if we just want to use the configured Boost Union settings
 *  and we don't want to reimplement them.
 *  Although theme_boost_union_get_pre_scss gets called earlier,
 *  $theme there is this theme which doesn't necessarily reimplement Boost Union's settings.
 *
 * Get SCSS to prepend.
 *
 * @return string
 */
function theme_boost_union_child_get_pre_scss():string {
    return theme_boost_union_get_pre_scss(theme_config::load('boost_union'));
}

/**
 * This is necessary as long as MDL-77657 isn't finished.
 * We need to recreate the extra scss from Boost Union and append it after Boost's extra SCSS overwrote everything.
 *
 * Get SCSS to append.
 *
 * @return string
 */
function theme_boost_union_child_get_extra_scss():string {
    // theme_boost_union replicates the boost setting, so we need to use that
    $boostExtraScss = theme_boost_get_extra_scss(theme_config::load('boost_union'));
    $boostUnionExtraScss = theme_boost_union_get_extra_scss(theme_config::load('boost_union'));
    return $boostExtraScss.$boostUnionExtraScss;
}

