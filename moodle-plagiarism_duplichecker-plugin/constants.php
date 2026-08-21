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

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');   ///  It must be included from a Moodle page
}

// Constants.
const PLAGIARISM_DUPLI_MAX_FILE_UPLOAD_SIZE = 104857600;
const PLAGIARISM_DUPLI_CRON_SUBMISSIONS_LIMIT = 100;
const PLAGIARISM_ACCEPTED_DUPLI_FILE_EXTS = ['.doc', '.docx', '.ppt', '.pptx', '.pps', '.ppsx',
    '.pdf', '.txt', '.htm', '.html', '.hwp', '.odt',
    '.wpd', '.ps', '.rtf', '.xls', '.xlsx', ];
const PLAGIARISM_DUPLI_API_BASE_URL = 'https://www.duplichecker.com';
const PLAGIARISM_DUPLI_PENDING_STATUS = 'pending';
const PLAGIARISM_DUPLI_QUEUED_STATUS = 'queued';
