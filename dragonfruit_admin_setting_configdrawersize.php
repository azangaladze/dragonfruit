<?php
require_once($CFG->dirroot . '/lib/adminlib.php');
class dragonfruit_admin_setting_configdrawersize extends admin_setting_configtext {
        public function __construct($name, $visiblename, $description, $defaultsetting) {
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
        $element = $OUTPUT->render_from_template('theme_dragonfruit/setting_configdrawersize', $context);

        $warning = '';

        return format_admin_setting($this, $this->visiblename, $element, $this->description, true, $warning, $default, $query);
    }
    public function validate($data) {
        if (((string)(int)$data === (string)$data && $data >= 200 && $data <= 500)) {
            return true;
        } else {
            return get_string('drawersizeerror', 'theme_dragonfruit');
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