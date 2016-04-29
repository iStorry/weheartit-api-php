<?php 
//Define autoloader 
function __autoload($class) {
    $path = __DIR__ . '/iStorry/' .$class. '/' .$class. '.php';
    include_once($path);
    if(!class_exists($class, false)){
        throw new RuntimeException('Class ' .$class. ' has not been loaded yet');
    }
}
spl_autoload_register('__autoload');