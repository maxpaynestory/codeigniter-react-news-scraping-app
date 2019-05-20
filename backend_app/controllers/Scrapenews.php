<?php

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
    public function index_get(){
        $this->load->library('newsparser', ['client'=> new Goutte\Client()]);
        $ycombinator_news = $this->newsparser->parse();
        $this->response(['done'=>$ycombinator_news]);
    }
}
