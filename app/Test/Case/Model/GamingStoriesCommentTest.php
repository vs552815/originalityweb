<?php
App::uses('GamingStoriesComment', 'Model');

/**
 * GamingStoriesComment Test Case
 */
class GamingStoriesCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gaming_stories_comment',
		'app.gaming_stories',
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
		$this->GamingStoriesComment = ClassRegistry::init('GamingStoriesComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GamingStoriesComment);

		parent::tearDown();
	}

}
