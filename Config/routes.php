<?php
/**
 * Users routes configuration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

Router::connect(
	'/users/users/download/:user_id/:field_name/:size',
	['plugin' => 'users', 'controller' => 'users_avatar', 'action' => 'download'],
	['user_id' => '[0-9]+', 'field_name' => 'avatar', 'size' => 'big|medium|small|thumb']
);
Router::connect(
	'/users/users/download/:user_id/:field_name',
	['plugin' => 'users', 'controller' => 'users_avatar', 'action' => 'download', 'size' => 'medium'],
	['user_id' => '[0-9]+', 'field_name' => 'avatar', 'size' => 'medium']
);

//Router::connect(
//	'/users/users/download/:user_id/:field_name/:size',
//	['plugin' => 'users', 'controller' => 'users', 'action' => 'download'],
//	['user_id' => '[0-9]+', 'size' => 'big|medium|small|thumb']
//);
//Router::connect(
//	'/users/users/download/:user_id/:field_name',
//	['plugin' => 'users', 'controller' => 'users', 'action' => 'download', 'size' => 'medium'],
//	['user_id' => '[0-9]+', 'size' => 'medium']
//);
Router::connect(
	'/users/users/download/*',
	array(
		'plugin' => 'users', 'controller' => 'users', 'action' => 'throwBadRequest',
	)
);

Router::connect(
	'/users/users/:action/:user_id',
	['plugin' => 'users', 'controller' => 'users'],
	['user_id' => '[0-9]+']
);

Router::connect(
	'/users/users/:action/:user_id/*',
	['plugin' => 'users', 'controller' => 'users'],
	['user_id' => '[0-9]+']
);
