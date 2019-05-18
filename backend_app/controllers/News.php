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

    public function index_get() {
        $this->response(['help'=>true]);
    }

}
