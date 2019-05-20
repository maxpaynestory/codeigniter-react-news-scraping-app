<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsParser
 *
 * @author usamaahmed
 */
class Newsparser {
    
    /** @var Goutte\Client Description */
    private $client; 
    
    public function __construct($params = []) {
        if(isset($params['client']) and $params['client'] instanceof Goutte\Client){
            $this->client = $params['client'];
        }else{
            throw new Exception('goute client is required');
        }
    }
    
    public function parse()
    {
        $news = [];
        $client =  $this->client;
        $crawler = $client->request('GET', 'https://news.ycombinator.com/');
        $news_rows = $crawler->filter('tr.athing');
        $news_rows->each(function($node) use ($crawler, &$news){
            /* @var $node Symfony\Component\DomCrawler\Crawler */
            /* @var $node1 Symfony\Component\DomCrawler\Crawler */
            $id = $node->attr('id');
            $node1 = $node->filter('a.storylink');
            $title = $node1->text();
            $url = $node1->attr('href');
            $score_node = $crawler->filter('span#score_' . $id);
            $points = (int)preg_replace("/[^0-9]/", '', $score_node->text());
            $next_nodes = $score_node->nextAll();
            $username = $next_nodes->filter('a.hnuser')->text();
            $number_of_coments = (int)preg_replace("/[^0-9]/", '', $next_nodes->last()->text());
            
            array_push($news,[
                'title' => $title,
                'url' =>  $url,
                'points' => $points,
                'username' => $username,
                'number_of_comments' => $number_of_coments
            ]);
        });
        return $news;
    }
}
