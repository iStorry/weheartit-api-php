<?php
class Images extends cURL {
       protected $endpoint = 'https://api.weheartit.com';
       protected $clientID = '';
       protected $clientSecret = '';
       protected $args = array(
             'users' => '/api/users',
             'search_images' => 'api/v2/search/entries',
             'oauth' => 'oauth/token'
       );
       protected $cURL = NULL;
       public function __construct($user, $pass){
             $this->cURL = new cURL();
             $a = $this->__token($user,$pass);
         //throw new Expection('Class not found / user & pass required! ');
       }
       public function __token($user, $pass){
           $response = $this->cURL->post($this->endpoint . '/' . $this->args['oauth'],
           $vars = array('client_id' => $this->clientID, 'client_secret' => $this->clientSecret, 'grant_type' => 'password','password' => $user,'username' => $pass));
           print_r($response);
       }
}