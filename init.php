<?php

include "vendor/autoload.php";

$connection = (new MongoDB\Client)->local->students;

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates')
]);

?>