<?php
require __DIR__ . '/autoload.php';

## Usage ##
use Uploader as Upload;
use Curl as cURL;
use Images as Image;


$read = new Upload();
$img = new Image('test', 'test');
print_r($img);