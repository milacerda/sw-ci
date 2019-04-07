<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * Main controller da API.
	 */

    function __construct()
    {
        // Constructor da classe pai
        parent::__construct();
        // Para permitir requisições entre domínios diferentes
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        
        // Carregando o Model
        $this->load->model('Planets_model');
    }

    /*
    * Função que retorna todos os Planetas cadastrados no banco
    * Opção de filtro por nome
    */
	public function index()
	{
        if($this->input->get('search'))
        {
            $planets = $this->Planets_model->getPlanetByName($this->input->get('search'));

            if(!empty($planets))
            {
                $data = array();
                $data['count'] = count($planets);
                $data['results'] = array();
                foreach($planets as $p){
                    $p['url'] = base_url('planets/'.$p['id']);
                    array_push($data['results'], $p);
                }
                response(200, $data);
            }
            else 
            {
                response(404, 
                    ['message'   => 'Planeta não encontrado.']
                );
            }
        } 
        else
        {
            $planets = $this->Planets_model->getAllPlanets();
            if(!empty($planets))
            {
                $data = array();
                $data['count'] = count($planets);
                $data['results'] = array();
                foreach($planets as $planet){
                    $planet['url'] = base_url('planets/'.$planet['id']);
                    array_push($data['results'], $planet);
                }
    
                response(200, $data);
            } 
            else 
            {
                response(200, 
                    ['message'   => 'Nenhum planeta cadastrado.']
                );
            }
        }
    }

    /*
    * Função que busca um planeta pelo ID
    */
    public function search($parameter)
    {
        if(!empty($parameter))
        {
            $planet = $this->Planets_model->getPlanet($parameter);
            
            if(empty($planet))
            {
                response(404,
                    ['message'   => 'Planeta não encontrado']
                );
            }
            else
            {
                $data = array();
                $data['results'] = array();
                $planet['url'] = base_url('planets/'.$planet['id']);
                array_push($data['results'], $planet);
                response(200, $data);
            }
    
        } 

    }

    /*
    * Função que cadastra um novo planeta no banco de dados
    */
    public function store()
    {
        $post = $this->input->post();

        $data = [
            "nome" => $post['nome'],
            "clima" => $post['clima'],
            "terreno" => $post['terreno']
        ];

        $filmes = $this->getMovies($post['nome']);
        $data["filmes"] = $filmes;

        $planet = $this->Planets_model->newPlanet($data);

        if(!empty($planet))
        {
            $data = array();
            $data['results'] = array();
            $planet['url'] = base_url('planets/'.$planet['id']);
            array_push($data['results'], $planet);

            response(201, $data);
        }
        else {
            response(400,
                ['message'   => 'Ocorreu um erro ao tentar criar o planeta.']
            );
        }
    }

    /*
    * Função que procura o número de filmes em que o planeta aparece
    */
    public function getMovies($planet)
    {
        // Importando a biblioteca do guzzle
        $this->load->library('guzzle');

        // Iniciando o guzzle client 
        $client = new GuzzleHttp\Client();

        // Busca na API os dados sobre o Planeta
        $res = $client->request('GET', 'https://swapi.co/api/planets/?search='.$planet, ['verify' => false]);

        $status = $res->getStatusCode();
        if($status == 200)
        {
            $data = json_decode($res->getBody(), true);
            
            if($data['count'] > 0){
                foreach($data['results'] as $d){
                    if($d['name'] == $planet){
                        return count($d['films']);
                    }
                }
                return 0;
            } else {
                return 0;
            }
        } 
        else 
        {
            return 0;
        }
    }

    /*
    * Função para atualizar os dados do Planeta
    */
    public function update($id)
    {
        $planet = $this->Planets_model->getPlanet($id);

        if(empty($planet))
        {
            response(404, [
                'message'   => 'Planeta não encontrado',
            ]);
        } 
        else
        {
            $data = [
                'nome' => $this->input->input_stream('nome'),
                'clima' => $this->input->input_stream('clima'),
                'terreno' => $this->input->input_stream('terreno')
            ];
            $planet = $this->Planets_model->updatePlanet($id, $data);

            if(!empty($planet))
            {
                $data = array();
                $data['results'] = array();
                $planet['url'] = base_url('planets/'.$planet['id']);
                array_push($data['results'], $planet);

                response(202, $data);
            }
            else {
                response(400, [
                    'message'   => 'Ocorreu um erro ao tentar atualizar o planeta.',
                ]);
            }

        }
    }

    /*
    * Função para excluir um Planeta
    */
    public function delete($id)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS"){
            die(0);
        }
        $planet = $this->Planets_model->getPlanet($id);

        if(empty($planet))
        {
            response(404, [
                'message'   => 'Planeta não encontrado'
            ]);
        } 
        else
        {
            $this->Planets_model->deletePlanet($id);
            $planet = $this->Planets_model->getPlanet($id);

            if(empty($planet))
            {
                response(204, [
                    'message'   => 'Planeta excluído com sucesso.'
                ]);
            }
            else {
                response(400, [
                    'message'   => 'Erro ao tentar excluir o Planeta.'
                ]);
            }
        }
        
    }
}
