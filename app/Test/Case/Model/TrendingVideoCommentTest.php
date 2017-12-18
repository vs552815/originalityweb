<?php
App::uses('TrendingVideoComment', 'Model');

/**
 * TrendingVideoComment Test Case
 */
class TrendingVideoCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.trending_video_comment',
		'app.user',
		'app.like_dislike',
		'app.stroy',
		'app.story',
		'app.comment',
		'app.trending_video',
		'app.trending_like_dislike'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TrendingVideoComment = ClassRegistry::init('TrendingVideoComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TrendingVideoComment);

		parent::tearDown();
	}

}
