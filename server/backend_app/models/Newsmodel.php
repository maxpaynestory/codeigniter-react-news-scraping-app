<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News
 *
 * @author usamaahmed
 */
class Newsmodel extends CI_Model {

    public function createBulk($input_array) {
        $this->db->truncate('news');
        $data = [];
        foreach ($input_array as $news) {
            array_push($data, [
                'title' => $news['title'],
                'url' => $news['url'],
                'points' => $news['points'],
                'username' => $news['username'],
                'comments_total' => $news['number_of_comments'],
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
        $this->db->insert_batch('news', $data);
    }

    public function delete($id) {
        $db = $this->db;
        /* @var $db CI_DB_query_builder */
        $res = $db->delete('news', ['id' => $id]);
        
        if($res  == FALSE){
            throw new Exception("Not found");
        }
    }
    
    public function getAll(){
        $db = $this->db;
        /* @var $db CI_DB_query_builder */
        $query = $db->get('news');
        /* @var $query CI_DB_result */
        return $query->result_array();
    }

}
