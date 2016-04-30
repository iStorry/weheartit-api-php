<?php
/**
 * @file weheartit.php
 * @author  Jatinjit Singh <jatinx.lol@gmail.com>
 * @version 1.0
 *
 * @section LICENSE
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of
 * the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * General Public License for more details at
 * https://www.gnu.org/copyleft/gpl.html
 *
 * @section DESCRIPTION
 *
 * A basic Weheartit Api wrapper
 */

class Images extends cURL {
       /**
        * The api url for HTTP connection with weheartit 
        *
        * @var string
        * @access protected
       **/
       protected $endpoint = 'https://api.weheartit.com';

       /**
        * The clientID provided by weheartit , you can get this id by debugging app requests
        *
        * @var string
        * @access protected
       **/
       
       protected $clientID = '{client-id}';

       /**
        * The client secret is required for connection , without this you can't make proper connection
        *
        * @var string
        * @access protected
       **/

       protected $clientSecret = '{client-secret}';

       /**
        * The accesstoken to send along with requests 
        *
        * @var string
        * @access public 
       **/

       public $access_token = NULL;

       /**
        *  Curl Response 
        *
        * @var string 
        * @access protected 
       **/
       protected $response = NULL;
       
       /**
        * api endpoints
        *
        * @var string 
        * @access protected 
       **/ 
       protected $args = array(
             'user' => '/api/v2/user',
             'search_images' => 'api/v2/search/entries',
             'oauth' => 'oauth/token'
       );
       protected $cURL = NULL;
       /**
        * Initializes a Curl object
        *
       **/
       public function __construct($user, $pass){
             $this->cURL = new cURL();
                if(empty($user && $pass)){
                    throw new RuntimeException("Error Processing Request: Username & Password Required", 1);
                }
             $this->__token($user, $pass); // Acquiring Token Now 
       }

      /**
        * Makes an HTTP request of the specified $method to a $url with an optional array or string of $vars
        *
        * Returns a Response object if the request was successful, false otherwise
        *
        * @param string $this->args['oauth']
        * @param string $this->endpoint
        * @param array|string $vars
        * @return CurlResponse|boolean
		* @access protected 
       **/
      protected function __token($user, $pass){
           $response = $this->cURL->post($this->endpoint . '/' . $this->args['oauth'],
           $vars = array('client_id' => $this->clientID, 'client_secret' => $this->clientSecret, 'grant_type' => 'password','password' => $pass,'username' => $user));
           if($response->headers['Status-Code'] == 401){
               throw new RuntimeException($response->body);
               return 0;
           }
           $res = json_decode($response->body, TRUE);
           $_SESSION['access_token'] = $this->access_token = $res['access_token'];
           return $this->access_token;
      }
      /**
        * Set custom cURL headers to send with the request
        *
        * Return : NULL;
        *
        * @access protected
        * @example : Authorization: Bearer d305721b1c4fc39dc61b7b489d5fca30a
        *
       **/
      protected function __authorization(){
		  $this->cURL->headers['Authorization'] = 'Bearer '.$this->access_token;
      }
      /**
        *  Initializes a User
        *
        * @return : user profile details 
        *
        * @access public
        *
       **/ 
       public function __user(){
         	$this->__authorization(); // Setting Headers Authorization
         	$res = $this->cURL->get($this->endpoint . '/' .$this->args['user']);
         	return json_decode($res->body, TRUE);
	}
}
