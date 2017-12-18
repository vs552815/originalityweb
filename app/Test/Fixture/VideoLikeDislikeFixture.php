<?php
/**
 * VideoLikeDislike Fixture
 */
class VideoLikeDislikeFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'video_like_dislike';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'live_stream_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'video_like' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'video_dislike' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'live_stream_id' => 1,
			'user_id' => 1,
			'video_like' => 1,
			'video_dislike' => 1
		),
	);

}
