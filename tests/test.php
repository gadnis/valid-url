<?php

require_once __DIR__ . '/../vendor/autoload.php';

$url = 'https://www.example.com/index.php?request=product_cat&product_info=22726';

$object = new Edbox\Tools\ValidUrl($url);
// or
// $object = (new Edbox\Tools\ValidUrl)->setUrlString($url);

var_dump(

    /**
     * Available methods
     */
    $object->toArray()
    // $object->getPrefix()
    // $object->getDomain()
    // $object->getUniqDomain()
    // $object->getPath()
    // $object->getQuery()
    // $object->getFragment()
    // $object->getIp()
    // $object->isValid()
);