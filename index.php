<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/services/functions.php';

use Services\Foo;

$foo = new Foo();

// shows the function working fine within class
$foo->foo();

echo("-----DEMONSTRATING CLOSURE WORKING AFTER SERIALIZE (full namespaced function call) -----\n");

// create a closure from within the class that calls
$closure = $foo->fooFixedClosure();

// call prior to serialization
$closure('fixedClosure before serialization');

// serialize & then restore closure
$serialized = \Opis\Closure\serialize($closure);
$closure = \Opis\Closure\unserialize($serialized);

// the closure works fine
$closure('fixedClosure after serialization');

echo("-----DEMONSTRATING CLOSURE BROKEN AFTER SERIALIZE-----\n");

// create a closure from within the class that calls
$closure = $foo->fooBrokenClosure();

// shows the foo closure working fine prior to serializing
$closure('brokenClosure before serialization');

// serialize & then restore closure
$serialized = \Opis\Closure\serialize($closure);
$closure = \Opis\Closure\unserialize($serialized);

// the closure now doesn't work
$closure('brokenClosure after serialization');