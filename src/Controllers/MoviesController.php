<?php

namespace Controllers;

use Slim\Container;
use PDO;
use PDOException;

class MoviesController 
{
    //GET index()
    //get 1 show()
    //post create()
    //patch edit()
    //put reemplace()
    //delete delete()


    //se ahorra  " Request $request, Response $response, array $args "
    private $request;
    private $response;
    private $db;

    public function __construct(Container $container){
        $this->request = $container->get('request');
        $this->response = $container->get('response');
        $this->db = $container->get('db');
    }

    public function index()
    {
        try{
            $sql = 'SELECT * FROM movies';
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $this->response->withJson( $stmt->fetchAll(PDO::FETCH_ASSOC));

        }catch (PDOException $e){

            return $this->response->withJson(['error' => $e->getMessage()]);
        }


        //$data = json_decode(file_get_contents('templates/MOCK_DATA.json'));
        //return $response->withJson(['status' => 'ok GET empty']);
        //return $this->response->withJson($data);
    }
    public function show()
    {        
        //$id= $this->request->getParam('id');
        $sql = 'SELECT * FROM movies WHERE id= ? and avaiable = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1,1);
        $stmt->bindValue(2,1);
        $stmt->execute();
        return $this->response->withJson( $stmt->fetch(PDO::FETCH_ORI_FIRST));
        //return $this->response->withJson(['status' => 'ok GET with id:'.$args['id']]);
    }
    public function create(Request $request, Response $response, array $args)
    {
        return $this->response->withJson(['status' => 'ok POST with id:'.$args['id']]);
    }
    public function edit( $request, $response, $args)
    {
        return $this->response->withJson(['status' => 'ok PATCH with id:'.$args['id']]);
    }
    public function reemplace( $request, $response, $args)
    {
        return $this->response->withJson(['status' => 'ok PUT with id: '.$args['id']]);
    }
    public function delete( $request, $response, $args)
    {
        return $this->response->withJson(['status' => 'ok DELETE with id:'.$args['id']]);
    }

    /*
        PDO (conexiones, ejecutar operaciones);
        PDOStatement ( preparar consultas)
        PDOException (extension de exception)
        */
}
