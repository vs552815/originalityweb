<?php
App::uses('SolutionImage', 'Model');

/**
 * SolutionImage Test Case
 */
class SolutionImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.solution_image',
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
		$this->SolutionImage = ClassRegistry::init('SolutionImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SolutionImage);

		parent::tearDown();
	}

}
