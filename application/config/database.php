<?php defined('SYSPATH') or die('No direct access allowed.');

if ( $_SERVER['SERVER_NAME'] == "textu.local") return array
(
	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			/**
			 * The following options are available for MySQL:
			 *
			 * string   hostname     server hostname, or socket
			 * string   database     database name
			 * string   username     database username
			 * string   password     database password
			 * boolean  persistent   use persistent connections?
			 *
			 * Ports and sockets may be appended to the hostname.
			 */
			'hostname'   => 'localhost',
			'database'   => 'textu',
			'username'   => 'root',
			'password'   => 'Ru80pE',
			'persistent' => FALSE,
		),
		'table_prefix' => '5xto_',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),

);

else return array
(
	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			/**
			 * The following options are available for MySQL:
			 *
			 * string   hostname     server hostname, or socket
			 * string   database     database name
			 * string   username     database username
			 * string   password     database password
			 * boolean  persistent   use persistent connections?
			 *
			 * Ports and sockets may be appended to the hostname.
			 */
			'hostname'   => 'localhost',
			'database'   => 'textuo5_textuapp',
			'username'   => 'textuo5_usr3982',
			'password'   => 'fT1WH$EvhR48',
			'persistent' => FALSE,
		),
		'table_prefix' => '5xto_',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),
);
