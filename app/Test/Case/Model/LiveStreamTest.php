<?php
App::uses('LiveStream', 'Model');

/**
 * LiveStream Test Case
 */
class LiveStreamTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->LiveStream = ClassRegistry::init('LiveStream');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LiveStream);

		parent::tearDown();
	}

}
