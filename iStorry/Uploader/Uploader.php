<?php
    class Uploader {
          protected $dir = __DIR__ . '/images/';
          public function __construct(){
              if(!file_exists($this->dir)){
                  throw new Exception("Location " . $this->dir . " not found!");
              }
          }
          public function __openDir(){
              if ($dh = opendir($this->dir)){
                  while (($file = readdir($dh)) !== false){
                       echo "filename:" . $file . "<br>";
                  }
                  closedir($dh);
              }
          }
    }