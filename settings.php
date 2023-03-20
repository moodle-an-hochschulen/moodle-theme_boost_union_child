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
 * Theme Boost Union Child - Settings file
 *
 * @package    theme_boost_union_child
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/** @var admin_root $ADMIN */
if ($ADMIN->fulltree) {
    /** @var admin_settingpage $settings */

    // Replicate the unaddableblocks setting from theme_boost on the main theme settings page
    $name = 'theme_boost_union_child/unaddableblocks';
    $title = get_string('unaddableblocks', 'theme_boost', null, true);
    $description = get_string('unaddableblocks_desc', 'theme_boost', null, true);
    $default = 'navigation,settings,course_list,section_links';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $settings->add($setting);
}
