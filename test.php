<?php

use FiveM\FiveM;

require('vendor/autoload.php');


$object = new FiveM('217.182.183.158', 30120, false);
dd($object->players()[1]);


