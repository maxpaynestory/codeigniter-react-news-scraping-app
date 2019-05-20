<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Scrapenews
 *
 * @author usamaahmed
 */
class Scrapenews extends REST_Controller {

    public function index_get() {
        $this->load->library('newsparser', ['client' => new Goutte\Client()]);
        $this->load->model('newsmodel');
        $ycombinator_news = $this->newsparser->parse();
        $this->newsmodel->createBulk($ycombinator_news);
        $this->response(['done' => true]);
    }

}
