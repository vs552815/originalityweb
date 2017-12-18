<?php
App::uses('AppModel', 'Model');
/**
 * VideoComment Model
 *
 * @property LiveStream $LiveStream
 * @property User $User
 */
class VideoComment extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'video_comment';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'LiveStream' => array(
			'className' => 'LiveStream',
			'foreignKey' => 'live_stream_id',
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
