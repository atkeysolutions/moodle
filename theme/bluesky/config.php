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
 * BlueSky config.
 *
 * @package    theme_bluesky
 * @author     Paul Walker
 * @copyright  2020 onwards Catalyst IT Europe <http://catalyst-eu.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

$THEME->name = 'bluesky';

$THEME->editor_sheets = [];
$THEME->parents = ['boost'];
$THEME->enable_dock = false;
$THEME->extrascsscallback = 'theme_bluesky_get_extra_scss';
$THEME->prescsscallback = 'theme_bluesky_get_pre_scss';
$THEME->precompiledcsscallback = 'theme_bluesky_get_precompiled_css';
$THEME->yuicssmodules = array();
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->scss = function($theme) {
    return theme_bluesky_get_main_scss_content($theme);
};
$THEME->usefallback = true;
$THEME->iconsystem = '\\theme_bluesky\\output\\icon_system_fontawesome';

$THEME->sheets = [];

$THEME->rarrow ="🡪";
$THEME->larrow = "🡨";

$THEME->layouts = [
    // Most backwards compatible layout without the blocks - this is the layout used by default.
    'base' => array(
        'file' => 'columns.php',
        'regions' => array(),
    ),
    // Standard layout with blocks, this is recommended for most pages with general information.
    'standard' => array(
        'file' => 'columns.php',
        'regions' => array('side-post','side-hidden'),
        'defaultregion' => 'side-post',
    ),
    // Main course page.
    'course' => array(
        'file' => 'columns.php',
        'regions' => array('side-post','side-hidden'),
        'defaultregion' => 'side-post',
        'options' => array('langmenu' => true),
    ),
    'coursecategory' => array(
        'file' => 'columns.php',
        'regions' => array('side-post','side-hidden'),
        'defaultregion' => 'side-post',
    ),
    // Part of course, typical for modules - default page layout if $cm specified in require_login().
    'incourse' => array(
        'file' => 'columns.php',
        'regions' => array('side-post','side-hidden'),
        'defaultregion' => 'side-post',
    ),
    // The site home page.
    'frontpage' => array(
        'file' => 'columns.php',
        'regions' => array('side-pre', 'side-post','side-hidden'),
        'defaultregion' => 'side-post',
        'options' => array('nofullheader' => true),
    ),
    // Server administration scripts.
    'admin' => array(
        'file' => 'columns.php',
        'regions' => array('side-post','side-hidden'),
        'defaultregion' => 'side-post',
    ),
    // My dashboard page.
    'mydashboard' => array(
        'file' => 'columns.php',
        'regions' => array('side-pre', 'side-post','side-hidden'),
        'defaultregion' => 'side-post',
        'options' => array('nonavbar' => true, 'langmenu' => true, 'nocontextheader' => true),
    ),
    // My public page.
    'mypublic' => array(
        'file' => 'columns.php',
        'regions' => array('side-post','side-hidden'),
        'defaultregion' => 'side-post',
    ),
    'login' => array(
        'theme' => 'boost',
        'file' => 'login.php',
        'regions' => array(),
        'options' => array('langmenu' => true),
    ),

    // Pages that appear in pop-up windows - no navigation, no blocks, no header.
    'popup' => array(
        'file' => 'contentonly.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => true),
    ),
    // No blocks and minimal footer - used for legacy frame layouts only!
    'frametop' => array(
        'file' => 'contentonly.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nocoursefooter' => true),
    ),
    // Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible.
    'embedded' => array(
        'theme' => 'boost',
        'file' => 'embedded.php',
        'regions' => array()
    ),
    // Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
    // This must not have any blocks, links, or API calls that would lead to database or cache interaction.
    // Please be extremely careful if you are modifying this layout.
    'maintenance' => array(
        'theme' => 'boost',
        'file' => 'maintenance.php',
        'regions' => array(),
    ),
    // Should display the content and basic headers only.
    'print' => array(
        'file' => 'contentonly.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => false),
    ),
    // The pagelayout used when a redirection is occuring.
    'redirect' => array(
        'theme' => 'boost',
        'file' => 'embedded.php',
        'regions' => array(),
    ),
    // The pagelayout used for reports.
    'report' => array(
        'file' => 'columns.php',
        'regions' => array('side-post','side-hidden'),
        'defaultregion' => 'side-post',
    ),
    // The pagelayout used for safebrowser and securewindow.
    'secure' => array(
        'file' => 'secure.php',
        'regions' => array('side-post'),
        'defaultregion' => 'side-post'
    )
];
