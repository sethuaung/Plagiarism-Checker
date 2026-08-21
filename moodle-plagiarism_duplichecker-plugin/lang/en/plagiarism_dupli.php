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

$string['pluginname'] = 'Duplichecker Plagiarism Checker';
$string['dupliconfig'] = 'Duplichecker Plagiarism Plugin Configuration';
$string['usedupli_mod'] = 'Enable Duplichecker for {$a}';
$string['enable'] = 'Enable Duplichecker';
$string['dupliexplain'] = 'Duplichecker Plagiarism Checker plugin ';
$string['setting'] = 'Settings';
$string['dupliaccountconfig'] = 'Duplichecker Account Configuration';
$string['dupliaccountid'] = 'Duplichecker Account ID';
$string['duplipublickey'] = 'Duplichecker Public Key';
$string['duplisecretkey'] = 'Duplichecker Secret Key';
$string['dupliapiurl'] = 'Duplichecker API URL';
$string['connecttest'] = 'Test Duplichecker Connection';
$string['duplistatus'] = 'Duplichecker status';
$string['error'] = 'Error Occurred';
$string['pending'] = 'Pending';
$string['queued'] = 'Queued';
$string['success'] = 'Completed Successfully';
$string['complete'] = 'Completed';
$string['similarity'] = 'Similarity';
$string['dupli'] = 'Duplichecker';

$string['studentdisclosure'] = 'Student disclosure';
$string['studentdisclosure_help'] = 'This text will be displayed to all students on the file upload page.';
$string['studentdisclosuredefault'] = '<span>By submitting your files you are agreeing to the plagiarism detection service </span><a target="_blank" href="https://dupli.com/legal/privacypolicy">privacy policy</a>';
$string['studentdagreedtoeula'] = '<span>You have already agreed to the plagiarism detection service </span><a target="_blank" href="https://dupli.com/legal/privacypolicy">privacy policy</a>';

$string['coursesettings'] = 'Duplichecker Settings';
$string['draftsubmit'] = 'Submit files only when students click the submit button';
$string['draftsubmit_help'] = "This option is only available if 'Require students to click the submit button' is Yes";
$string['reportgenspeed'] = 'When to generate report?';
$string['genereportimmediately'] = 'Generate reports immediately';
$string['genereportonduedate'] = 'Generate reports on due date';
$string['allowstudentaccess'] = 'Allow students access to plagiarism reports';
$string['reportpagetitle'] = 'dupli report';
$string['savesuccess'] = 'settings saved successfully!';
$string['dupli:enable'] = 'Enable Duplichecker Plagiarism Checker plugin';
$string['dupli:viewfullreport'] = 'View Similarity Report';
$string['disabledformodule'] = 'Duplichecker Plagiarism Checker plugin is disabled for this module.';
$string['nopageaccess'] = 'You dont have access to this page.';
$string['openfullscreen'] = 'Open in full screen';
$string['similaritystr'] = 'Similarity Score';
$string['viewreportstr'] = 'View Report';
$string['clickstr'] = 'click here';

$string['updateerror'] = 'Error while trying to update records in database';
$string['inserterror'] = 'Error while trying to insert records to database';

$string['digital_receipt_subject'] = 'Duplichecker Digital Receipt';
$string['digital_receipt_message'] = 'Dear {$a->firstname} {$a->lastname},<br /><br />You have successfully submitted the file <strong>{$a->submission_title}</strong> to the assignment <strong>{$a->assignment_name}{$a->assignment_part}</strong> in the class <strong>{$a->course_fullname}</strong> on <strong>{$a->submission_date}</strong>. Your full digital receipt can be viewed and printed from the print/download button in the Document Viewer.<br /><br />Thank you for using Duplichecker,<br /><br />The Duplichecker Team';

$string['errorcode0'] = 'This file has not been submitted to Duplichecker, please consult your system administrator';
$string['errorcode1'] = 'This file has not been sent to Duplichecker as it does not have enough content to produce a Similarity Report.';
$string['errorcode2'] = 'This file will not be submitted to Duplichecker as it exceeds the maximum size of {$a->maxfilesize} allowed';
$string['errorcode3'] = 'This file has not been submitted to Duplichecker because the user has not accepted the Duplichecker End User Licence Agreement.';
$string['errorcode4'] = 'You must upload a supported file type for this assignment. Accepted file types are; .doc, .docx, .ppt, .pptx, .pps, .ppsx, .pdf, .txt, .htm, .html, .hwp, .odt, .wpd, .ps and .rtf';
$string['errorcode5'] = 'This file has not been submitted to Duplichecker because there is a problem creating the module in Duplichecker which is preventing submissions, please consult your API logs for further information';
$string['errorcode6'] = 'This file has not been submitted to Duplichecker because there is a problem editing the module settings in Duplichecker which is preventing submissions, please consult your API logs for further information';
$string['errorcode7'] = 'This file has not been submitted to Duplichecker because there is a problem creating the user in Duplichecker which is preventing submissions, please consult your API logs for further information';
$string['errorcode8'] = 'This file has not been submitted to Duplichecker because there is a problem creating the temp file. The most likely cause is an invalid file name. Please rename the file and re-upload using Edit Submission.';
$string['errorcode9'] = 'The file cannot be submitted as there is no accessible content in the file pool to submit.';
$string['errorcode10'] = 'This file has not been submitted to Duplichecker because there is a problem creating the class in Duplichecker which is preventing submissions, please consult your API logs for further information';
$string['errorcode11'] = 'This file has not been submitted to Duplichecker because it is missing data';
$string['errorcode12'] = 'This file has not been submitted to Duplichecker because it belongs to an assignment in which the course was deleted. Row ID: ({$a->id}) | Course Module ID: ({$a->cm}) | User ID: ({$a->userid})';
$string['errorcode14'] = 'This file has not been submitted to Duplichecker because the attempt it belongs to could not be found';

$string['updatereportscores'] = 'Update Report Scores for Duplichecker Plagiarism Plugin';
$string['sendqueuedsubmissions'] = 'Send Queued Files from the Duplichecker Plagiarism Plugin';

$string['coursegeterror'] = 'Could not get course data';
$string['cronsubmittedsuccessfully'] = 'Submission: {$a->title} ( ID: {$a->submissionid}) for the assignment {$a->assignmentname} on the course {$a->coursename} was successfully submitted to Duplichecker.';

$string['messageprovider:submission'] = 'Duplichecker Plagiarism Plugin Digital Receipt notifications';

$string['report_title'] = 'dupli Report';

$string['privacy:metadata:core_files'] = 'Duplichecker stores files that have been uploaded to Moodle to form a Duplichecker submission.';
$string['privacy:metadata:plagiarism_dupli_files'] = 'Information that links a Moodle submission to a Duplichecker submission.';
$string['privacy:metadata:plagiarism_dupli_files:userid'] = 'The ID of the user who is the owner of the submission.';
$string['privacy:metadata:plagiarism_dupli_files:submitter'] = 'The ID of the user who has made the submission.';
$string['privacy:metadata:plagiarism_dupli_files:similarityscore'] = 'The similarity score of the submission.';
$string['privacy:metadata:plagiarism_dupli_files:lastmodified'] = 'A timestamp indicating when the user last modified their submission.';
$string['privacy:metadata:plagiarism_dupli_client'] = 'In order to integrate with a Duplichecker, some user data needs to be exchanged with Duplichecker.';
$string['privacy:metadata:plagiarism_dupli_client:module_id'] = 'The module id is sent to Duplichecker for identification purposes.';
$string['privacy:metadata:plagiarism_dupli_client:module_name'] = 'The module name is sent to Duplichecker for identification purposes.';
$string['privacy:metadata:plagiarism_dupli_client:module_type'] = 'The module type is sent to Duplichecker for identification purposes.';
$string['privacy:metadata:plagiarism_dupli_client:module_creationtime'] = 'The module creation time is sent to Duplichecker for identification purposes.';
$string['privacy:metadata:plagiarism_dupli_client:submittion_userId'] = 'The submission userId is sent to Duplichecker for identification purposes.';
$string['privacy:metadata:plagiarism_dupli_client:submittion_name'] = 'The submission name is sent to Duplichecker for identification purposes.';
$string['privacy:metadata:plagiarism_dupli_client:submittion_type'] = 'The submission type is sent to Duplichecker for identification purposes.';
$string['privacy:metadata:plagiarism_dupli_client:submittion_content'] = 'The submission content is sent to Duplichecker for scan processing.';
