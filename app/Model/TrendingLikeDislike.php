<?php
App::uses('AppModel', 'Model');
/**
 * TrendingLikeDislike Model
 *
 * @property TrendingVideo $TrendingVideo
 * @property User $User
 */
class TrendingLikeDislike extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'trending_like_dislike';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TrendingVideo' => array(
			'className' => 'TrendingVideo',
			'foreignKey' => 'trending_video_id',
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
