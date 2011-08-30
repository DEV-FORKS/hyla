<?php defined('SYSPATH') or die('No direct script access.');

return array(
	// temporary until theme is taken from user/site settings
	'theme'          => HYLAPATH.'themes/_default',      // default hyla theme
	'tracker'        => HYLAPATH.'plugins/tracker',      // Tracker Plugin
	'hyla'           => HYLAPATH.'core',                 // Core hyla module
	'acl'            => MODPATH.'acl',                   // ACL Module
	'assets'         => MODPATH.'assets',                // Asset Library
	'media'          => MODPATH.'media',                 // Kohana CFS Media Module
	'kostache'       => MODPATH.'kostache',              // View Classes
	'minion'         => MODPATH.'minion',                // CLI module
	'unittest'       => MODPATH.'unittest',              // PHPUnit support
	'events'         => MODPATH.'event-dispatcher',      // Event Dispatcher,
	'yform'          => MODPATH.'yform',                 // Form Generation
	'config-couchdb' => MODPATH.'config-driver-couchdb', // Config driver for CouchDB
	'tasks-media'    => MODPATH.'minion-tasks-media',    // Media related tasks
	'userguide'      => MODPATH.'userguide',             // Documentation
);