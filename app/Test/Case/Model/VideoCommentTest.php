<?php
App::uses('VideoComment', 'Model');

/**
 * VideoComment Test Case
 */
class VideoCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.video_comment',
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
		$this->VideoComment = ClassRegistry::init('VideoComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VideoComment);

		parent::tearDown();
	}

}
