<?php
/**
 * UserEditForm Helper
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AppHelper', 'View/Helper');

/**
 * UserEditForm Helper
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Users\View\Helper
 */
class UserLayoutHelper extends AppHelper {

/**
 * Other helpers used by FormHelper
 *
 * @var array
 */
	public $helpers = array(
		'NetCommons.NetCommonsHtml',
	);

/**
 * Default Constructor
 *
 * @param View $View The View this helper is being attached to.
 * @param array $settings Configuration settings for the helper.
 */
	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		$this->User = ClassRegistry::init('Users.User');
		$this->UsersLanguage = ClassRegistry::init('Users.UsersLanguage');
	}

/**
 * After render file callback.
 * Called after any view fragment is rendered.
 *
 * Overridden in subclasses.
 *
 * @param string $viewFile The file just be rendered.
 * @param string $content The content that was rendered.
 * @return void
 */
	public function afterRenderFile($viewFile, $content) {
		$content = $this->NetCommonsHtml->css('/data_types/css/style.css') . $content;

		parent::afterRenderFile($viewFile, $content);
	}

/**
 * ユーザ属性の表示
 *
 * @param array $userAttribute ユーザ属性データ
 * @return string HTMLタグ
 */
	public function display($userAttribute) {
		$html = '';

		if (! $this->isDisplayable($userAttribute)) {
			return $html;
		}

		$userAttributeKey = $userAttribute['UserAttribute']['key'];

		if ($userAttributeKey === 'created_user') {
			$fieldName = 'TrackableCreator.handlename';
		} elseif ($userAttributeKey === 'modified_user') {
			$fieldName = 'TrackableUpdater.handlename';
		} elseif ($this->User->hasField($userAttributeKey)) {
			$fieldName = 'User.' . $userAttributeKey;
		} elseif ($this->UsersLanguage->hasField($userAttributeKey)) {
			$fieldName = 'UsersLanguage.%s.' . $userAttributeKey;
		} else {
			$fieldName = '';
		}

		$element = $this->userElement($fieldName, $userAttribute);
		if ($element) {
			$html .= '<div class="form-group">';
			if ($userAttribute['UserAttributeSetting']['display_label']) {
				$html .= '<div class="user-attribute-label">' . h($userAttribute['UserAttribute']['name']) . '</div>';
			}
			if ($userAttributeKey === 'avatar') {
				$html .= $element;
			} else {
				$html .= '<div class="form-control data-type-no-border">';
				$html .= $element;
				$html .= '</div>';
			}
			$html .= '</div>';
		}

		return $html;
	}

/**
 * ユーザ属性の表示
 *
 * @param string $fieldName モデルのフィールド名
 * @param array $userAttribute ユーザ属性データ
 * @return string HTMLタグ
 */
	public function userElement($fieldName, $userAttribute) {
		$element = '';
		$userAttributeKey = $userAttribute['UserAttribute']['key'];

		if ($userAttributeKey === 'avatar') {
			//後で対応
			$element .= '<div class="thumbnail">';
			$element .= $this->NetCommonsHtml->image('/users/img/noimage.gif', array(
				'class' => 'img-responsive img-rounded',
				'alt' => 'Avatar',
			));
			$element .= '</div>';

		} elseif (isset($userAttribute['UserAttributeChoice'])) {
			if ($userAttributeKey === 'role_key') {
				$keyPath = '{n}[key=' . Hash::get($this->_View->viewVars, $fieldName) . ']';
			} else {
				$keyPath = '{n}[code=' . Hash::get($this->_View->viewVars, $fieldName) . ']';
			}
			$option = Hash::extract($userAttribute['UserAttributeChoice'], $keyPath);
			$element .= $option[0]['name'];

		} elseif ($this->UsersLanguage->hasField($userAttributeKey)) {
			foreach ($this->_View->viewVars['UsersLanguage'] as $index => $usersLanguage) {
				$element .= '<div ng-show="activeLangId === \'' . $usersLanguage['language_id'] . '\'" ng-cloak>';
				$element .= Hash::get($this->_View->viewVars, sprintf($fieldName, $index));
				$element .= '</div>';
			}

		} elseif (isset($fieldName)) {
			$element .= Hash::get($this->_View->viewVars, $fieldName);

		} else {
			$element .= '';
		}

		return $element;
	}

/**
 * 表示可能な項目かどうかチェック
 *
 * @param array $userAttribute ユーザ属性データ
 * @return bool 表示有無
 */
	public function isDisplayable($userAttribute) {
		if (! $userAttribute['UserAttributeSetting']['display'] ||
				$userAttribute['UserAttributeSetting']['data_type_key'] === DataType::DATA_TYPE_PASSWORD ||
				(! $userAttribute['UserAttributesRole']['other_readable'] && Current::read('User.id') !== $this->_View->viewVars['User']['id']) ||
				(! $userAttribute['UserAttributesRole']['self_readable'] && Current::read('User.id') === $this->_View->viewVars['User']['id']) ||
				$userAttribute['UserAttributeSetting']['only_administrator'] && ! Current::allowSystemPlugin('user_manager')) {

			return false;
		} else {
			return true;
		}
	}

}