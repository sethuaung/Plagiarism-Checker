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

/*
 * @package   plagiarism_dupli
 * @copyright 2025, Duplichecker <support@duplichecker.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once $CFG->dirroot.'/plagiarism/dupli/lib.php';
require_once $CFG->libdir.'/formslib.php';

class dupli_setupform extends moodleform
{
    // Define the form.
    public function definition()
    {
        global $DB, $CFG;

        $mform = $this->_form;

        $mform->disable_form_change_checker();

        $mform->addElement('header', 'config', get_string('dupliconfig', 'plagiarism_dupli'));
        $mform->addElement('html', get_string('dupliexplain', 'plagiarism_dupli').'</br></br>');

        // Loop through all modules that support Plagiarism.
        $mods = array_keys(core_component::get_plugin_list('mod'));

        foreach ($mods as $mod) {
            if (plugin_supports('mod', $mod, FEATURE_PLAGIARISM)) {
                $mform->addElement('advcheckbox',
                    'plagiarism_dupli_mod_'.$mod,
                    get_string('usedupli_mod', 'plagiarism_dupli', ucfirst($mod)),
                    '',
                    null,
                    [0, 1]
                );
            }
        }

        $mform->addElement(
            'textarea',
            'plagiarism_dupli_studentdisclosure',
            get_string('studentdisclosure', 'plagiarism_dupli')
        );
        $mform->addHelpButton(
            'plagiarism_dupli_studentdisclosure',
            'studentdisclosure',
            'plagiarism_dupli'
        );

        $mform->addElement('header', 'plagiarism_dupliconfig', get_string('dupliaccountconfig', 'plagiarism_dupli'));
        $mform->setExpanded('plagiarism_dupliconfig');

        $mform->addElement('text', 'plagiarism_dupli_publickey', get_string('duplipublickey', 'plagiarism_dupli'));
        $mform->setType('plagiarism_dupli_publickey', PARAM_TEXT);
        $mform->addElement('passwordunmask', 'plagiarism_dupli_secretkey', get_string('duplisecretkey', 'plagiarism_dupli'));

        $this->add_action_buttons();
    }

    /**
     * Display the form, saving the contents of the output buffer overriding Moodle's
     * display function that prints to screen when called.
     *
     * @return the form as an object to print to screen at our convenience
     */
    public function display()
    {
        ob_start();
        parent::display();
        $form = ob_get_contents();
        ob_end_clean();

        return $form;
    }

    /**
     * Save the plugin config data.
     */
    public function save($data)
    {
        global $CFG;
        global $DB;

        // Save whether the plugin is enabled for individual modules.
        $mods = array_keys(core_component::get_plugin_list('mod'));
        $pluginenabled = 0;
        foreach ($mods as $mod) {
            if (plugin_supports('mod', $mod, FEATURE_PLAGIARISM)) {
                $property = 'plagiarism_dupli_mod_'.$mod;
                ${ 'plagiarism_dupli_mod_'."$mod" } = (!empty($data->$property)) ? $data->$property : 0;
                set_config('plagiarism_dupli_mod_'.$mod, ${ 'plagiarism_dupli_mod_'."$mod" }, 'plagiarism_dupli');
                if (${ 'plagiarism_dupli_mod_'."$mod" }) {
                    $pluginenabled = 1;
                }
            }
        }

        // save whether plugin is enabled or not in DB
        $defaultfield = new stdClass();
        $defaultfield->name = 'plagiarism_dupli_enable';
        $defaultfield->value = $pluginenabled;
        $id = $DB->get_field('plagiarism_dupli_config', 'id', (['cm' => null, 'name' => 'plagiarism_dupli_enable']));
        if ($id) {
            $defaultfield->id = $id;
            $DB->update_record('plagiarism_dupli_config', $defaultfield);
        } else {
            $DB->insert_record('plagiarism_dupli_config', $defaultfield);
        }

        // misc configs
        set_config('enabled', $pluginenabled, 'plagiarism_dupli');
        // TODO: Remove dupli_use completely when support for 3.8 is dropped.
        if ($CFG->branch < 39) {
            set_config('dupli_use', $pluginenabled, 'plagiarism');
        }
        $properties = ['publickey', 'secretkey', 'studentdisclosure'];

        foreach ($properties as $property) {
            $property = 'plagiarism_dupli_'.$property;
            set_config($property, $data->$property, 'plagiarism_dupli');
        }
    }
}
