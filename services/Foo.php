<?php

namespace Services;

class Foo {
	public function foo() {
		return foo("called from inside class");
	}
	public function fooBrokenClosure()
	{
		return function($name) {
			foo("Hello $name!");
		};
	}
	public function fooFixedClosure()
	{
		return function($name) {
			\Services\foo("Hello $name!");
		};
	}
}