<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
  |--------------------------------------------------------------------------
  | CORS Allow Any Domain
  |--------------------------------------------------------------------------
  |
  | Set to TRUE to enable Cross-Origin Resource Sharing (CORS) from any
  | source domain
  |
 */
$config['allow_any_cors_domain'] = TRUE;

/*
  |--------------------------------------------------------------------------
  | CORS Allowable Headers
  |--------------------------------------------------------------------------
  |
  | If using CORS checks, set the allowable headers here
  |
 */
$config['allowed_cors_headers'] = [
    'Origin',
    'X-Requested-With',
    'Content-Type',
    'Accept',
    'Access-Control-Request-Method',
    'Access-Control-Allow-Origin'
];

