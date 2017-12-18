<?php
App::uses('AppModel', 'Model');
/**
 * TrendingVideo Model
 *
 * @property User $User
 * @property TrendingLikeDislike $TrendingLikeDislike
 * @property Comment $Comment
 */
class TrendingVideo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'trending_video';


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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'TrendingLikeDislike' => array(
			'className' => 'TrendingLikeDislike',
			'foreignKey' => 'trending_video_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'joinTable' => 'trending_video_comment',
			'foreignKey' => 'trending_video_id',
			'associationForeignKey' => 'comment_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
