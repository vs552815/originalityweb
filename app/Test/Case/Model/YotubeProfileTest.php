<?php
App::uses('YotubeProfile', 'Model');

/**
 * YotubeProfile Test Case
 */
class YotubeProfileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.yotube_profile',
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
		$this->YotubeProfile = ClassRegistry::init('YotubeProfile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->YotubeProfile);

		parent::tearDown();
	}

}
