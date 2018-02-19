<?php
App::uses('GamingStory', 'Model');

/**
 * GamingStory Test Case
 */
class GamingStoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gaming_story',
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
		$this->GamingStory = ClassRegistry::init('GamingStory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GamingStory);

		parent::tearDown();
	}

}
