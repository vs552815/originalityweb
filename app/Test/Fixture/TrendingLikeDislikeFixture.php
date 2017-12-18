<?php
/**
 * TrendingLikeDislike Fixture
 */
class TrendingLikeDislikeFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'trending_like_dislike';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'trending_video_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'trending_like' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'trending_dislike' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'id' => array('column' => 'id', 'unique' => 0)
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
			'trending_video_id' => 1,
			'trending_like' => 1,
			'trending_dislike' => 1,
			'user_id' => 1
		),
	);

}
