<?php
App::uses('AppModel', 'Model');
/**
 * Comment Model
 *
 * @property Story $Story
 */
class Comment extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'comment';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Story' => array(
			'className' => 'Story',
			'foreignKey' => 'story_id',
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
