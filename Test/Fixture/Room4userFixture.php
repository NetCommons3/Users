<?php
/**
 * 会員情報、会員管理用 RoomFixture
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('RoomFixture', 'Rooms.Test/Fixture');

/**
 * 会員情報、会員管理用 RoomFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Users\Test\Fixture
 */
class Room4userFixture extends RoomFixture {

/**
 * Model name
 *
 * @var string
 */
	public $name = 'Room';

/**
 * Full Table Name
 *
 * @var string
 */
	public $table = 'rooms';

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		//サイト全体
		array(
			'id' => '1',
			'space_id' => '1',
			'page_id_top' => null,
			'parent_id' => null,
			//'lft' => '1',
			//'rght' => '12',
			'weight' => '1',
			'sort_key' => '~00000001',
			'active' => '1',
			'default_role_key' => 'visitor',
			'need_approval' => '1',
			'default_participation' => '1',
			'page_layout_permitted' => '0',
			'theme' => null,
		),
		//パブリックスペース
		array(
			'id' => '2',
			'space_id' => '2',
			'page_id_top' => '4',
			'parent_id' => '1',
			//'lft' => '1',
			//'rght' => '4',
			'weight' => '1',
			'sort_key' => '~00000001-00000001',
			'active' => true,
			'default_role_key' => 'visitor',
			'need_approval' => '1',
			'default_participation' => '1',
			'page_layout_permitted' => '1',
			'theme' => 'Default',
		),
		//パブリックスペース、パブリックルーム(room_id=5)
		array(
			'id' => '5',
			'space_id' => '2',
			'page_id_top' => '3',
			'parent_id' => '2',
			//'lft' => '2',
			//'rght' => '3',
			'weight' => '1',
			'sort_key' => '~00000001-00000001-00000001',
			'active' => true,
			'default_role_key' => 'visitor',
			'need_approval' => true,
			'default_participation' => true,
			'page_layout_permitted' => true,
			'theme' => null,
		),

		//プライベート
		array(
			'id' => '3',
			'space_id' => '3',
			'page_id_top' => null,
			'parent_id' => '1',
			//'lft' => '5',
			//'rght' => '18',
			'weight' => '2',
			'sort_key' => '~00000001-00000002',
			'active' => '1',
			'default_role_key' => 'room_administrator',
			'need_approval' => '0',
			'default_participation' => '0',
			'page_layout_permitted' => '0',
			'theme' => 'Default',
		),
		//プライベートルーム、管理者(room_id=6)
		array(
			'id' => '6',
			'space_id' => '3',
			'page_id_top' => '0',
			'parent_id' => '3',
			//'lft' => '6',
			//'rght' => '7',
			'weight' => '1',
			'sort_key' => '~00000001-00000002-00000001',
			'active' => true,
			'default_role_key' => 'room_administrator',
			'need_approval' => '0',
			'default_participation' => '0',
			'page_layout_permitted' => '0',
			'theme' => null,
		),
		//プライベートルーム、編集長(room_id=7)
		array(
			'id' => '7',
			'space_id' => '3',
			'page_id_top' => '0',
			'parent_id' => '3',
			//'lft' => '8',
			//'rght' => '9',
			'weight' => '2',
			'sort_key' => '~00000001-00000002-00000002',
			'active' => true,
			'default_role_key' => 'room_administrator',
			'need_approval' => '0',
			'default_participation' => '0',
			'page_layout_permitted' => '0',
			'theme' => null,
		),
		//プライベートルーム、編集者(room_id=8)
		array(
			'id' => '8',
			'space_id' => '3',
			'page_id_top' => '0',
			'parent_id' => '3',
			//'lft' => '10',
			//'rght' => '11',
			'weight' => '3',
			'sort_key' => '~00000001-00000002-00000003',
			'active' => true,
			'default_role_key' => 'room_administrator',
			'need_approval' => '0',
			'default_participation' => '0',
			'page_layout_permitted' => '0',
			'theme' => null,
		),
		//プライベートルーム、一般1(room_id=9)
		array(
			'id' => '9',
			'space_id' => '3',
			'page_id_top' => '0',
			'parent_id' => '3',
			//'lft' => '12',
			//'rght' => '13',
			'weight' => '4',
			'sort_key' => '~00000001-00000002-00000004',
			'active' => true,
			'default_role_key' => 'room_administrator',
			'need_approval' => '0',
			'default_participation' => '0',
			'page_layout_permitted' => '0',
			'theme' => null,
		),
		//プライベートルーム、ゲスト(room_id=10)
		array(
			'id' => '10',
			'space_id' => '3',
			'page_id_top' => '0',
			'parent_id' => '3',
			//'lft' => '14',
			//'rght' => '15',
			'weight' => '5',
			'sort_key' => '~00000001-00000002-00000005',
			'active' => true,
			'default_role_key' => 'room_administrator',
			'need_approval' => '0',
			'default_participation' => '0',
			'page_layout_permitted' => '0',
			'theme' => null,
		),
		//プライベートルーム、一般2(room_id=13)
		array(
			'id' => '13',
			'space_id' => '3',
			'page_id_top' => '0',
			'parent_id' => '3',
			//'lft' => '16',
			//'rght' => '17',
			'weight' => '6',
			'sort_key' => '~00000001-00000002-00000006',
			'active' => true,
			'default_role_key' => 'room_administrator',
			'need_approval' => '0',
			'default_participation' => '0',
			'page_layout_permitted' => '0',
			'theme' => null,
		),

		//コミュニティスペース
		array(
			'id' => '4',
			'space_id' => '4',
			'page_id_top' => null,
			'parent_id' => '1',
			//'lft' => '19',
			//'rght' => '24',
			'weight' => '3',
			'sort_key' => '~00000001-00000003',
			'active' => '1',
			'default_role_key' => 'general_user',
			'need_approval' => '1',
			'default_participation' => '1',
			'page_layout_permitted' => '1',
			'theme' => 'Default',
		),
		//コミュニティスペース、ルーム1(room_id=11)
		array(
			'id' => '11',
			'space_id' => '4',
			'page_id_top' => '0',
			'parent_id' => '4',
			//'lft' => '20',
			//'rght' => '21',
			'weight' => '1',
			'sort_key' => '~00000001-00000003-00000001',
			'active' => '1',
			'default_role_key' => 'general_user',
			'need_approval' => '0',
			'default_participation' => '0',
			'page_layout_permitted' => null,
			'theme' => null,
		),
		//コミュニティスペース、ルーム2(room_id=12)
		array(
			'id' => '12',
			'space_id' => '4',
			'page_id_top' => '0',
			'parent_id' => '4',
			//'lft' => '22',
			//'rght' => '23',
			'weight' => '2',
			'sort_key' => '~00000001-00000003-00000002',
			'active' => '1',
			'default_role_key' => 'general_user',
			'need_approval' => '0',
			'default_participation' => '0',
			'page_layout_permitted' => null,
			'theme' => null,
		),
	);
}
