<?php
App::uses('AppModel', 'Model');
/**
 * SolutionImage Model
 *
 * @property Solutions $Solutions
 * @property User $User
 */
class SolutionImage extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Solutions' => array(
			'className' => 'Solutions',
			'foreignKey' => 'solutions_id',
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
