<?php
App::uses('Solution', 'Model');

/**
 * Solution Test Case
 */
class SolutionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.solution',
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
		$this->Solution = ClassRegistry::init('Solution');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Solution);

		parent::tearDown();
	}

}
