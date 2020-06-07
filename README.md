# FiveM-PHP

FiveM PHP Is small PHP FiveM API Wrapper (Work in progress)

### To know the list of returned values I invite you to look at the models to give 

https://github.com/iTexZoz/FiveM-PHP/blob/master/src/Model

```php
$object = new FiveM('217.182.183.158', 30120, false);
$object->players()[1];

/** @var Players $value */
foreach ($object->players() as $value) {
    
}
```
