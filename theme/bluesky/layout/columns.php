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
 * The columns layout for the bluesky theme.
 *
 * @package    theme_bluesky
 * @author     Paul Walker
 * @copyright  2020 onwards Catalyst IT Europe <http://catalyst-eu.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$bodyattributes = $OUTPUT->body_attributes();
$blockspre = $OUTPUT->blocks('side-pre');
$blockspost = $OUTPUT->blocks('side-post');
$blockshidden = $OUTPUT->blocks('side-hidden');

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$hassidehidden = $PAGE->blocks->region_has_content('side-hidden', $OUTPUT);

$courseexit = theme_bluesky_get_setting('exiturl');

$extraclasses = [];
if ($hassidepre) {
    $extraclasses[] = 'has-side-pre';
}
if ($hassidepost ) {
    $extraclasses[] = 'has-side-post';
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockspre,
    'sidepostblocks' => $blockspost,
    'sidehiddenblocks' => $blockshidden,
    'haspreblocks' => $hassidepre,
    'haspostblocks' => $hassidepost,
    'hashiddenblocks' => $hassidehidden,
    'bodyattributes' => $bodyattributes,
    'course_exit' => $courseexit,
    'copyright' => theme_bluesky_get_copyright_year(),
    'is_siteadmin' => is_siteadmin()
];

echo $OUTPUT->render_from_template('theme_bluesky/columns', $templatecontext);

