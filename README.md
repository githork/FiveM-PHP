# FiveM-PHP

FiveM PHP Is small PHP FiveM API Wrapper (Work in progress)

![packagist-stable](https://badgen.net/packagist/v/itexzoz/fivem-php)
![packagist-license](https://img.shields.io/packagist/l/itexzoz/fivem-php.svg)
![packagist-download](https://badgen.net/packagist/dt/itexzoz/fivem-php)

### To know the list of returned values I invite you to look at the models to give 

https://github.com/iTexZoz/FiveM-PHP/blob/master/src/Model

```php
$object = new FiveM('217.182.183.158', 30120, false);
$object->players()[1];

/** @var Players $value */
foreach ($object->players() as $value) {
    
}
```
