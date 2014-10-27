<?php

require_once 'plugin.php';

class Foo{
	
	private $amount;

	/*
	 *  Constructor
	 *  
	 *  Assign a variable and declare a filter
	 *  
	 */
	public function __construct( $amount ) {
		$this->amount = $amount;
		add_filter('filter_foo', array($this, 'doubleAmount'));
	}

	/*
	 *  Return the variable after appy custom filter called -filter_foo-
	 */
	public function getAmount() {
		$amount = apply_filters('filter_foo', $this->amount );
		return $amount;
	}
	
	/*
	 * Multiply by 2
	 */
	public function doubleAmount($amount){
	    return $amount * 2;
	}
	
	/*
	 * Multiply by 3
	 */
	public static function tripleAmount($amount){
	   return $amount * 3;
	}
	

}