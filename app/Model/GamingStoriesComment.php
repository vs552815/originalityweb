<?php
App::uses('AppModel', 'Model');
/**
 * GamingStoriesComment Model
 *
 * @property GamingStories $GamingStories
 * @property User $User
 */
class GamingStoriesComment extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'GamingStories' => array(
			'className' => 'GamingStories',
			'foreignKey' => 'gaming_stories_id',
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
