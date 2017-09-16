<?php
App::uses('AppModel', 'Model');
/**
 * LikeDislike Model
 *
 * @property Stroy $Stroy
 * @property User $User
 */
class LikeDislike extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'like_dislike';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Stroy' => array(
			'className' => 'Stroy',
			'foreignKey' => 'stroy_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
