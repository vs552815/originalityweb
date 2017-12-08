<?php
App::uses('SolutionComment', 'Model');

/**
 * SolutionComment Test Case
 */
class SolutionCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.solution_comment',
		'app.solutions',
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
		$this->SolutionComment = ClassRegistry::init('SolutionComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SolutionComment);

		parent::tearDown();
	}

}
