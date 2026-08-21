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
 * Settings page for plagiarism_dupli plugin.
 *
 * @copyright 2025, Duplichecker <support@duplichecker.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once __DIR__.'/../../config.php';
require_once $CFG->libdir.'/adminlib.php';
require_once $CFG->libdir.'/plagiarismlib.php';
require_once $CFG->dirroot.'/plagiarism/dupli/lib.php';
require_once $CFG->dirroot.'/plagiarism/dupli/classes/dupli_view.class.php';

require_login();

admin_externalpage_setup('plagiarismdupli');

$context = context_system::instance();
require_capability('moodle/site:config', $context, $USER->id, true, 'nopermissions');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname', 'plagiarism_dupli'), 2, 'main');

// Load plugin settings.
$plagiarism_plugin_dupli = new plagiarism_plugin_dupli();
$plugindefaults = $plagiarism_plugin_dupli->get_settings();
$pluginconfig = get_config('plagiarism_dupli');

// Load form.
$setupform = new dupli_setupform();

if ($setupform->is_cancelled()) {
    redirect(new moodle_url('/admin/category.php?category=plagiarism'));
}

// Save form data.
if (($data = $setupform->get_data()) && confirm_sesskey()) {
    $setupform->save($data);
    echo $OUTPUT->notification(get_string('savesuccess', 'plagiarism_dupli'), 'notifysuccess');
}

if (!isset($pluginconfig->plagiarism_dupli_studentdisclosure)) {
    $pluginconfig->plagiarism_dupli_studentdisclosure =
        get_string('studentdisclosuredefault', 'plagiarism_dupli');
}

// Set form data and display it.
$setupform->set_data($pluginconfig);
echo $setupform->display();

echo $OUTPUT->footer();
