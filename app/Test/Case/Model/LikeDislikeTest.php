<?php
App::uses('LikeDislike', 'Model');

/**
 * LikeDislike Test Case
 */
class LikeDislikeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.like_dislike',
		'app.stroy',
		'app.user',
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
		$this->LikeDislike = ClassRegistry::init('LikeDislike');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LikeDislike);

		parent::tearDown();
	}

}
