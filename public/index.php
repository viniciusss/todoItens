<?php

use Absolute\Auth;

use Absolute\Registry;

use Absolute\Router;

include '../vendors/SplClassLoader.php';

$classLoader = new SplClassLoader('Absolute', '../vendors');
$classLoader->register();

$classLoader = new SplClassLoader('App', '..');
$classLoader->register();

$bootstrap = new \App\Bootstrap();
