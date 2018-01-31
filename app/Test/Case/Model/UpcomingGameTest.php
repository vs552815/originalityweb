<?php
App::uses('UpcomingGame', 'Model');

/**
 * UpcomingGame Test Case
 */
class UpcomingGameTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.upcoming_game'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UpcomingGame = ClassRegistry::init('UpcomingGame');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UpcomingGame);

		parent::tearDown();
	}

}
