<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = getenv('RDS_HOSTNAME');
$CFG->dbname    = getenv('RDS_DB_NAME');
$CFG->dbuser    = getenv('RDS_USERNAME');
$CFG->dbpass    = getenv('RDS_PASSWORD');
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => getenv('RDS_PORT'),
  'dbsocket' => '',
);

$CFG->wwwroot   = getenv('WWW_ROOT');
$CFG->dataroot  = '/var/app/shared/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
