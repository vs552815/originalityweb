<?php
/**
 * LikeDislike Fixture
 */
class LikeDislikeFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'like_dislike';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'story_likes' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'story_dislike' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'stroy_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'story_likes' => 1,
			'story_dislike' => 1,
			'stroy_id' => 1,
			'user_id' => 1
		),
	);

}
