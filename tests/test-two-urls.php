<?php

require_once __DIR__ . '/../vendor/autoload.php';

$url1 = 'https://www.muzi.lt/lt/9880-dambrelis-terre-murjunga-nepal-0014.html';
$url2 = 'https://www.muzi.lt/lt/9880-dambrelis-terre-murjunga-nepal-0014.html#123';

$object = new Edbox\Tools\ValidUrl($url1);

var_dump(
    $object->isEqual($url2)
);