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
 * Session started
**/
session_start();
require dirname(dirname(__FILE__)) . '/autoload.php';
use Curl as cURL;
use Images as Image;
/**
  * Processing login
  *
 **/
 $img = new Image('username','password');
 if(isset($_REQUEST["query"], $_REQUEST["limit"])){ 
      $result = $img->__getImages($_GET["query"]);    
 } else { 
 $result = $img->__getImages();
 }
?>
<html lang="ja">
    <head>
        <title> Weheartit Api </title>
        <meta charset="utf-8">
        <meta name="description" content="Weheartit-api-php">
        <meta name="author" content="Jatinjit Singh">
        <meta name="viewport" content="width=device-width", initial-scale=1">
        <!-- Fonts --> 
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
        <!-- CSS -->
         <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.css">
         <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
         <style>
             .images {
                padding: 0.5%; 
                margin-left: 10%;
                margin-right: 10%;
             }
         </style>
    </head>
<body>
    <div style="margin-top: 5%; text-align: center"><h4> Search Example </h4></div>
    <div style="text-align: center"><h6> For usage visit <a href="https://github.com/iStorry/weheartit-api-php#usage"> github </a> </h6></div>
    <?php foreach ($result['entries'] as $key => $value) { ?>
             <div class="two columns images">
                    <img src="<?php echo $value['media'][4]['url']; ?>"></img><br>
                    <a href="<?php echo $value['media'][0]['url']; ?>"> Enlarge </a>
             </div>
    <?php } ?>      
</body>
