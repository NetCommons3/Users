<?php
/**
 * SendMailUser Behavior
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Mitsuru Mutaguchi <mutaguchi@opensource-workshop.jp>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('ModelBehavior', 'Model');

/**
 * SendMailUser Behavior
 *
 * @author Mitsuru Mutaguchi <mutaguchi@opensource-workshop.jp>
 * @package NetCommons\Users\Model\Behavior
 */
class SendMailUserBehavior extends ModelBehavior {

/**
 * 複数人の送信先ユーザ取得する
 * ※まだ決められない実装
 */
	public function setSendMailUsers(Model $model, $blockKey) {
  		// blockeyをセットしたら、複数人を取得して、セットするまでやる。
		//$users = $this->getSendMailUsers($wwww, $zzzz);
		//$this->setSendMailUsers($blockKey);
	}
}
