<?php

require 'vendor/autoload.php';

use Uph\Hello\Hello as Hi;

//$hello = new Uph\Hello\Hello('Budi');
$hello = new Hi('Budi');

$hello->sayHello();