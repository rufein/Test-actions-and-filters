<?php

// phpunit --bootstrap Foo.php test/FooTest

class FooTest extends PHPUnit_Framework_TestCase{

	public function testInitial(){
		// Create object and the constructor assign a filter
		$a = new Foo(1);

		// Get the amount
		// Applied filter: doubleAmount (Multiply by 2)
		$b = $a->getAmount();       // b = 2
		$this->assertEquals(2, $b); // True
		
		// Delete original filter
		remove_filter('filter_foo', array($a, 'doubleAmount'));
		
		// Get the amount: 
		// No Applied filter
		$c = $a->getAmount();       // c = 1
		$this->assertEquals(1, $c); // True
		
	}
	
	public function testTwoInstancedFilters(){
		// Create object and the constructor assign a filter
		$a = new Foo(1);
		
		// Get the amount
		// Duplicate the same filter: doubleAmount (Multiply by 2)
		add_filter('filter_foo', array($a, 'doubleAmount'));
		$d = $a->getAmount();       // d = 2
		$this->assertEquals(2, $d); // True
		
		// Create a different instance of the same object
		$z = new Foo(1);
		$y = $z->getAmount();       // y = 4
		$this->assertEquals(4, $y); // True
		
	}
	
	public function testStaticFunction(){
		
		// Create object and the constructor assign a filter
		$a = new Foo(1);
		
		// Add filter from a class and assing a static function
		add_filter('filter_foo', array('Foo', 'tripleAmount'));
		
		// Get the amount
		$b = $a->getAmount();       // b = 6
		$this->assertEquals(6, $b); // True
		
		
	}
	
	public function testUnsetObject(){
		
		// Create object
		$a = new Foo(1);
		unset($a);
		
		// Object in memory
		$b = apply_filters('filter_foo', 1 );	// b = 1
		$this->assertEquals(2, $b);    			// True
		
	}

	
}