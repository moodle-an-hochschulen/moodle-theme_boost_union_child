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
 * @copyright  2024 Alexander Bias <bias@alexanderbias.de>
 *             based on code by Lars Bonczek
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Let codechecker ignore some sniffs for this file as we do not need a login check here..
// phpcs:disable moodle.Files.RequireLogin.Missing

// Add Boost Union and Boost settings as defaults.
/** @var theme_config $THEME */
$THEME->settings = (object)((array)$THEME->settings + (array)get_config('theme_boost_union') + (array)get_config('theme_boost'));

// As a start, inherit the whole theme config from Boost Union.
// This move will save us from duplicating all lines from Boost Union's config.php into Boost Union Child's config.php.
// This statement uses require (and not require_once) by purpose to make sure that all Boost Union settings are added
// to the $THEME object even if the Boost Union config was already included in some other place.
require(__DIR__ . '/../boost_union/config.php');

// Then, we require Boost Union Child's locallib.php to make sure that it's always loaded.
require_once($CFG->dirroot . '/theme/boost_union_child/locallib.php');

// Next, we overwrite only the settings which differ between Boost Union and Boost Union Child.
$THEME->name = 'boost_union_child';
$THEME->scss = function($theme) {
    return theme_boost_union_child_get_main_scss_content($theme);
};
$THEME->parents = ['boost_union', 'boost'];
$THEME->extrascsscallback = 'theme_boost_union_child_get_extra_scss';
$THEME->prescsscallback = 'theme_boost_union_child_get_pre_scss';
