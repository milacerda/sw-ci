<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Api_test extends TestCase
{
	public function test_index()
	{
		$output = $this->request('GET', 'api/index');
		$this->assertResponseCode(200);
		$this->assertResponseHeader(
			'Content-Type', 'application/json'
		);
	}

	public function test_search()
	{
		$output = $this->request('GET', 'api/search/1');
		$this->assertResponseCode(200);
		$this->assertResponseHeader(
			'Content-Type', 'application/json'
		);
	}

	public function test_store()
	{
		$output = $this->request('POST', 'api/store', [
				'nome' => 'nome',
				'clima' => 'clima',
				'terreno' => 'terreno'
		]);

		$this->assertResponseCode(200);
		$this->assertResponseHeader(
			'Content-Type', 'application/json'
		);
	}

	public function test_getMovies()
	{
		$output = $this->request('GET', 'api/getMovies/teste');
		$this->assertResponseCode(200);
		$this->assertResponseHeader(
			'Content-Type', 'application/json'
		);
	}

	public function test_update()
	{
		$output = $this->request('PUT', 'api/update/1', [
				'nome' => 'nome',
				'clima' => 'clima',
				'terreno' => 'terreno'
		]);

		$this->assertResponseCode(202);
		$this->assertResponseHeader(
			'Content-Type', 'application/json'
		);
	}

	public function test_delete()
	{
		$output = $this->request('DELETE', 'api/delete/1');

		$this->assertResponseCode(204);
		$this->assertResponseHeader(
			'Content-Type', 'application/json'
		);
	}

	public function test_method_404()
	{
		$this->request('GET', 'api/method_not_exist');
		$this->assertResponseCode(404);
	}

	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/../..');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
	}
}
