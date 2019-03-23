# FiveM-PHP  🐌
![packagist-stable](https://badgen.net/packagist/v/itexzoz/fivem-php)
![packagist-license](https://img.shields.io/packagist/l/itexzoz/fivem-php.svg)
![packagist-download](https://badgen.net/packagist/dt/itexzoz/fivem-php)

## Installation
Pull in the project using composer:
`composer require itexzoz/fivem-php`


- From servers list 
```php
(new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->status();
(new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->get();
(new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->getPlayers();
(new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->getInfos();
(new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->getResources();
(new FiveM())->target(['149.202.65.148', 30130])->fromServersList()->getRequest(); // GuzzleHttp
(new FiveM())->target()->fromServersList()->findPlayer(['discord', 150336961867939840]);
```

- From direct connect
```php
(new FiveM())->target(['149.202.65.148', 30130])->fromDirectConnect()->status();
(new FiveM())->target(['149.202.65.148', 30130])->fromDirectConnect()->get();
(new FiveM())->target(['149.202.65.148', 30130])->fromDirectConnect()->getPlayers();
(new FiveM())->target(['149.202.65.148', 30130])->fromDirectConnect()->getInfos();
(new FiveM())->target(['149.202.65.148', 30130])->fromDirectConnect()->getResources();
```

