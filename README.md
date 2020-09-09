# Url string parser

This package depends on `parse_url`, `gethostbyname` php functions. It provides a simple way to cast all what is needed about url string:
* Domain
* Ip
* Prefix
* Validation
* etc.

## Getting Started

### Install

Run the following command:

```bash
composer require edbox/valid-url
```

## Usage

```php
$url = 'https://www.example.com/index.php?request=product_cat&product_info=22726';

$object = new Edbox\Tools\ValidUrl($url);
// or
// $object = (new Edbox\Tools\ValidUrl)->setUrlString($url);
var_dump(

    /**
     * Available get methods
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
```

## Credits

- [Edvinas Gurevicius](https://github.com/gadnis)

## License

The MIT License (MIT). Please see [LICENSE](LICENSE.md) for more information.
