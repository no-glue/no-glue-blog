<?php

require_once('premade/Factory.php');

use premade;

\premade\Factory::create('SplClassLoader')->register();
\premade\Factory::create('IndexSimple');
