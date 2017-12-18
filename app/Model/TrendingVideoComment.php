<?php
App::uses('AppModel', 'Model');
/**
 * TrendingVideoComment Model
 *
 * @property User $User
 * @property TrendingVideo $TrendingVideo
 */
class TrendingVideoComment extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'trending_video_comment';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TrendingVideo' => array(
			'className' => 'TrendingVideo',
			'foreignKey' => 'trending_video_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
