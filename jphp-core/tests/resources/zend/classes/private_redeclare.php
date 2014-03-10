--TEST--
ZE2 A derived class does not know anything about inherited private methods
--FILE--
<?php
class base {
	private function show() {
		echo "base\n";
	}
	function test() {
		$this->show();
	}
}

$t = new base();
$t->test();

class derived extends base {
	function show() {
		echo "derived\n";
	}
	function test() {
		echo "test\n";
		$this->show();
		parent::test();
		parent::show();
	}
}

$t = new derived();
$t->test();
?>
--EXPECTF--
base
test
derived
base

Fatal error: Call to private method base::show() from context 'derived' in %s on line %d, position %d