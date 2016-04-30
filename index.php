<?php
session_start();
require __DIR__ . '/autoload.php';

## Usage ##
use Curl as cURL;
use Images as Image;


$img = new Image('username','password');
$o = $img->__getImages();
foreach ($o['entries'] as $key => $value) {
   echo $value['media'][0]['url']."<br>";
}
