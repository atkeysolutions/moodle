<?php // Moodle configuration file for development environment

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'bsl_moodle';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'root';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
//  'dbport' => getenv('DB_PORT'),
  'dbsocket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
);

$CFG->wwwroot   = 'http://localhost:8888/bsl-moodle';
//$CFG->sslproxy  = substr($CFG->wwwroot, 0,5) == "https";
$CFG->dataroot  = '/var/app/shared/moodledata';
$CFG->admin     = 'admin';
$CFG->tempdir   = '/var/app/tmp';
$CFG->cachedir  = '/var/app/cache';
$CFG->localcachedir = '/var/app/shared/cache';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
// Test deploy
