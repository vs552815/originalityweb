<?php
App::uses('TrendingVideo', 'Model');

/**
 * TrendingVideo Test Case
 */
class TrendingVideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.trending_video',
		'app.user',
		'app.like_dislike',
		'app.stroy',
		'app.story',
		'app.comment',
		'app.trending_like_dislike',
		'app.trending_video_comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TrendingVideo = ClassRegistry::init('TrendingVideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TrendingVideo);

		parent::tearDown();
	}

}
