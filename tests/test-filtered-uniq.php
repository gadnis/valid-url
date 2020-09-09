<?php

require_once __DIR__ . '/../vendor/autoload.php';

$url = 'https://www.example.com/index.php?request=product_cat&product_info=22726#somet-ancar';

$object = new Edbox\Tools\ValidUrl($url);

var_dump(
    $object->getFilteredUniqUrl(),
    (new Edbox\Tools\ValidUrl($object->getFilteredUniqUrl()))->isValid()
);