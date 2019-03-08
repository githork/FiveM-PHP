# FiveM-PHP  🐌
![packagist-stable](https://badgen.net/packagist/v/itexzoz/fivem-php)
![packagist-license](https://img.shields.io/packagist/l/itexzoz/fivem-php.svg)
![packagist-download](https://badgen.net/packagist/dt/itexzoz/fivem-php)

# rewrite soon 

## Installation
Pull in the project using composer:
`composer require itexzoz/fivem-php`


ServerList
```php
//echo (new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->get();
//echo (new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->getPlayers();
//echo (new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->getInfos();
//echo (new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->getResources();
//echo (new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->getRequest(); // GuzzleHttp
//echo (new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->findPlayer();
//echo (new FiveM())->target()->fromServersList()->findPlayer(['discord', 150336961867939840]);
```

DirectConnect
```php

```