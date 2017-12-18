<?php
App::uses('VideoLikeDislike', 'Model');

/**
 * VideoLikeDislike Test Case
 */
class VideoLikeDislikeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.video_like_dislike',
		'app.live_stream',
		'app.user',
		'app.like_dislike',
		'app.stroy',
		'app.story',
		'app.comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VideoLikeDislike = ClassRegistry::init('VideoLikeDislike');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VideoLikeDislike);

		parent::tearDown();
	}

}
