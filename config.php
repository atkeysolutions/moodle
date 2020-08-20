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

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
