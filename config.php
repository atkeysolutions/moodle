<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = getenv('DB_HOSTNAME');
$CFG->dbname    = getenv('DB_DB_NAME');
$CFG->dbuser    = getenv('DB_USERNAME');
$CFG->dbpass    = getenv('DB_PASSWORD');
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => getenv('DB_PORT'),
  'dbsocket' => '',
);

$CFG->wwwroot   = getenv('WWW_ROOT');
$CFG->sslproxy  = substr($CFG->wwwroot, 0,5) == "https";
$CFG->dataroot  = '/var/app/shared/moodledata';
$CFG->admin     = 'admin';
$CFG->tempdir   = '/var/app/tmp';
$CFG->cachedir  = '/var/app/cache';
$CFG->localcachedir = '/var/app/shared/cache';

$CFG->directorypermissions = 0777;

// Upgrade key
//
// If the upgrade key is defined here, then the value must be provided every time
// the site is being upgraded though the web interface, regardless of whether the
// administrator is logged in or not. This prevents anonymous access to the upgrade
// screens where the real authentication and authorization mechanisms can not be
// relied on.
//
// It is strongly recommended to use a value different from your real account
// password.
//
$CFG->upgradekey = 'UpgradeKey123!';

// Use the following flag to completely disable the Available update notifications
// feature and hide it from the server administration UI.
//
$CFG->disableupdatenotifications = true;
//
// Use the following flag to completely disable the installation of plugins
// (new plugins, available updates and missing dependencies) and related
// features (such as cancelling the plugin installation or upgrade) via the
// server administration web interface.
//
$CFG->disableupdateautodeploy = true;

// When working with production data on test servers, no emails or other messages
// should ever be send to real users
// $CFG->noemailever = true;    // NOT FOR PRODUCTION SERVERS!

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
// Test deploy