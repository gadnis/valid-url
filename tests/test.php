<?php

require_once __DIR__ . '/../vendor/autoload.php';

$url = 'https://www.example.com/index.php?request=product_cat&product_info=22726';

$object = new Edbox\Tools\ValidUrl($url);

var_dump(

    /**
     * Available methods
     */
    $object->toArray()
    // $object->getPrefix()
    // $object->getDomain()
    // $object->getUniqDomain()
    // $object->getPath()
    // $object->getIp()
    // $object->getValid()
);