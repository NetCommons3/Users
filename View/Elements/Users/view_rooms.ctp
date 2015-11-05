<?php
/**
 * UserAttribute index template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<?php echo $this->Rooms->spaceTabs(Space::ROOM_SPACE_ID, 'pills', array(
	Space::PUBLIC_SPACE_ID => array(
		'url' => '#user-public-space',
		'attributes' => array(
			'aria-controls' => 'user-public-space',
			'role' => 'tab',
			'data-toggle' => 'tab',
		),
	),
	Space::ROOM_SPACE_ID => array(
		'url' => '#user-room-space',
		'attributes' => array(
			'aria-controls' => 'user-room-space',
			'role' => 'tab',
			'data-toggle' => 'tab',
		),
	),
)); ?>

<div class="tab-content">
	<div id="user-public-space" class="tab-pane">
		<article class="rooms-manager">
			<?php echo $this->Rooms->roomsRender(Space::PUBLIC_SPACE_ID,
					'Users.Users/view_rooms_index', 'Users.Users/view_rooms_header',
					$roomTreeLists[Space::PUBLIC_SPACE_ID], false); ?>
		</article>
	</div>

	<div id="user-room-space" class="tab-pane active">
		<article class="rooms-manager">
			<?php echo $this->Rooms->roomsRender(Space::ROOM_SPACE_ID,
					'Users.Users/view_rooms_index', 'Users.Users/view_rooms_header',
					$roomTreeLists[Space::ROOM_SPACE_ID], false); ?>
		</article>
	</div>
</div>