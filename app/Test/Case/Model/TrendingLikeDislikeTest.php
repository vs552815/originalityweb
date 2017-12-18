<?php
App::uses('TrendingLikeDislike', 'Model');

/**
 * TrendingLikeDislike Test Case
 */
class TrendingLikeDislikeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.trending_like_dislike',
		'app.trending_video',
		'app.user',
		'app.like_dislike',
		'app.stroy',
		'app.story',
		'app.comment',
		'app.trending_video_comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TrendingLikeDislike = ClassRegistry::init('TrendingLikeDislike');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TrendingLikeDislike);

		parent::tearDown();
	}

}
