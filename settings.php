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
 * Dragonfruit theme.
 *
 * @package    theme_dragonfruit
 * @copyright  &copy; 2020-onwards G J Barnard.
 * @author     G J Barnard - {@link http://moodle.org/user/profile.php?id=442195}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    // Add your settings here.

    //Drawer size change.
        global $CFG;
    if (file_exists("{$CFG->dirroot}/theme/dragonfruit/dragonfruit_admin_setting_configsize.php")) {
        require_once($CFG->dirroot . '/theme/dragonfruit/dragonfruit_admin_setting_configsize.php');
    } else if (!empty($CFG->themedir) && file_exists("{$CFG->themedir}/dragonfruit/dragonfruit_admin_setting_configsize.php")) {
        require_once($CFG->themedir . '/dragonfruit/dragonfruit_admin_setting_configsize.php');
    }
    $name = 'theme_dragonfruit/drawersize'; 
    $title = get_string('drawersize', 'theme_dragonfruit');
    $description = get_string('sizedesc', 'theme_dragonfruit', array('lower' => '200', 'upper' => '500'));
    $default = 285;
    $setting = new dragonfruit_admin_setting_configsize($name, $title, $description, $default, 200, 500);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    //Blocks size change.
    $name = 'theme_dragonfruit/blocksize';
    $title = get_string('blocksize', 'theme_dragonfruit');
    $description = get_string('sizedesc', 'theme_dragonfruit', array('lower' => '250', 'upper' => '650'));
    $default = 360;
    $setting = new dragonfruit_admin_setting_configsize($name, $title, $description, $default, 250, 650);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Custom CSS.
    $name = 'theme_dragonfruit/customcss';
    $title = get_string('customcss', 'theme_dragonfruit');
    $description = get_string('customcssdesc', 'theme_dragonfruit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
}
