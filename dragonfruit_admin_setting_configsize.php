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

require_once($CFG->dirroot . '/lib/adminlib.php');

class dragonfruit_admin_setting_configsize extends admin_setting_configtext {

    private $lower;
    private $upper;

    public function __construct($name, $visiblename, $description, $defaultsetting, $lower, $upper) {
        $this->lower = $lower;
        $this->upper = $upper;
        parent::__construct($name, $visiblename, $description, $defaultsetting, PARAM_INT);
    }

    public function output_html($data, $query='') {
        global $OUTPUT;

        $default = $this->get_defaultsetting();
        $context = (object) [
            'size' => $this->size,
            'id' => $this->get_id(),
            'name' => $this->get_full_name(),
            'value' => $data,
            'forceltr' => $this->get_force_ltr(),
        ];
        $element = $OUTPUT->render_from_template('theme_dragonfruit/setting_configsize', $context);

        $warning = '';

        return format_admin_setting($this, $this->visiblename, $element, $this->description, true, $warning, $default, $query);
    }
    public function validate($data) {
        if (((string)(int)$data === (string)$data && $data >= $this->lower && $data <= $this->upper)) {
            return true;
        } else {
            return get_string('sizeerror', 'theme_dragonfruit', array('lower' => $this->lower, 'upper' => $this->upper));
        }
    }

    public function write_setting($data) {
        if ($data === '') {
            $data = (int)$this->defaultsetting;
        } else {
            $data = $data;
        }
        return parent::write_setting($data);
    }
}