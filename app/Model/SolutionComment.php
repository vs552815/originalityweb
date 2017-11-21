<?php
App::uses('AppModel', 'Model');
/**
 * SolutionComment Model
 *
 * @property Solutions $Solutions
 * @property User $User
 */
class SolutionComment extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'solution_comment';


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
