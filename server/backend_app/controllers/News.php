<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news
 *
 * @author usamaahmed
 */
class News extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
    }

    public function index_get() {
        $this->load->model('newsmodel');
        $this->response(['objects' => $this->newsmodel->getAll()]);
    }

    public function index_delete($id) {
        $this->load->model('newsmodel');
        try {
            $this->newsmodel->delete($id);
            $this->response(['deleted' => true], 202);
        } catch (Exception $e) {
            $this->response(['deleted' => false], 404);
        }
    }

}
