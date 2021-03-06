<?php
/**
 * Config/routes.phpのテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsRoutesTestCase', 'NetCommons.TestSuite');

/**
 * Config/routes.phpのテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Pages\Test\Case\Routing\Route\SlugRoute
 */
class RoutesTest extends NetCommonsRoutesTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array();

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'users';

/**
 * DataProvider
 *
 * ### 戻り値
 * - url URL
 * - expected 期待値
 *
 * @return array テストデータ
 */
	public function dataProvider() {
		return array(
			array(
				'url' => '/users/users/download/1/avatar/thumb',
				'expected' => array(
					'plugin' => 'users', 'controller' => 'users_avatar', 'action' => 'download',
					'user_id' => '1', 'field_name' => 'avatar', 'size' => 'thumb',
				)
			),
			array(
				'url' => '/users/users/download/aaaa/avatar/thumb',
				'expected' => array(
					'plugin' => 'users', 'controller' => 'users', 'action' => 'throwBadRequest',
				)
			),
			array(
				'url' => '/users/users/download/1/avatar/aaaa',
				'expected' => array(
					'plugin' => 'users', 'controller' => 'users', 'action' => 'throwBadRequest',
					'block_id' => '1', 'key' => 'avatar',
				)
			),
			array(
				'url' => '/users/users/download/1/avatar',
				'expected' => array(
					'plugin' => 'users', 'controller' => 'users_avatar', 'action' => 'download',
					'user_id' => '1', 'field_name' => 'avatar', 'size' => 'medium',
				)
			),
			array(
				'url' => '/users/users/view/1',
				'expected' => array(
					'plugin' => 'users', 'controller' => 'users', 'action' => 'view',
					'user_id' => '1',
				)
			),
		);
	}

}
