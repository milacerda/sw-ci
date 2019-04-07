<?php

class Planets_model_test extends TestCase
{
	public function setUp()
	{
		$this->resetInstance();
		$this->CI->load->model('Planets_model');
		$this->obj = $this->CI->Planets_model;
	}

	public function test_getPlanet()
	{
        $id = 1;

		$list = $this->obj->getPlanet($id);
		$this->assertInternalType("array", $list);

        $keys = [
            'id',
            'nome',
            'clima',
            'terreno',
            'filmes',
            'created_at',
            'updated_at',
        ];

        $arrayKeys = array_keys($list);

        $this->assertEquals($keys, $arrayKeys);
	}

	public function test_getPlanetByName()
	{
        $name = 'nome';

		$list = $this->obj->getPlanetByName($name);
		$this->assertInternalType("array", $list);

        $keys = [
            'id',
            'nome',
            'clima',
            'terreno',
            'filmes',
            'created_at',
            'updated_at',
        ];

        $arrayKeys = array_keys($list);

        $this->assertEquals($keys, $arrayKeys);
	}

    public function test_getAllPlanets()
	{
		$list = $this->obj->getAllPlanets();
		$this->assertInternalType("array", $list);
		$this->assertNotEquals(0, count($list));
	}

    public function test_newPlanet()
	{
		$data = [
			"nome" => 'nome',
			"clima" => 'clima',
			"terreno" => 'terreno'
		];

		$list = $this->obj->newPlanet($data);
		$this->assertInternalType("array", $list);
		$this->assertNotEquals(0, count($list));
	}

    public function test_updatePlanet()
	{
		$id = 1;
		$data = [
			"nome" => 'nome',
			"clima" => 'clima',
			"terreno" => 'terreno'
		];

		$list = $this->obj->updatePlanet($id, $data);
		$this->assertInternalType("array", $list);
		$this->assertNotEquals(0, count($list));
	}

    public function test_deletePlanet()
	{
		$id = 1;
		$list = $this->obj->deletePlanet($id);
		$this->assertInternalType("boolean", $list);
	}


}