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
        $client = new \Goutte\Client();
        $news = [];
        $crawler = $client->request('GET', 'https://news.ycombinator.com/');
        $row_count = $crawler->filter('tr.athing');
        $this->response(['row_count'=>$row_count->count()]);
    }
}
