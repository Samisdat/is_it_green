<?php

class RgbColor{
	
	/**
	 * @var int
	 */
	private $red;

	/**
	 * @var int
	 */
	private $green;

	/**
	 * @var int
	 */
	private $blue;

	public function __construct($color){
		
		if(is_string($color)){

			$this->from_string($color);

		}
		else if(is_array($color)){

			$this->from_array($color);

		}
		else{

			throw new Exception('invalid argument');
			
		}
	}
	private function from_string($hexString){

		if(!preg_match('/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/', $hexString)){

			throw new Exception('not a hex color');

		}

		// cut hex away
		$hexString = str_replace("#", "", $hexString);

		if(strlen($hexString) === 3) {

			$this->red   = hexdec(substr($hexString,0,1).substr($hexString,0,1));
			$this->green = hexdec(substr($hexString,1,1).substr($hexString,1,1));
			$this->blue  = hexdec(substr($hexString,2,1).substr($hexString,2,1));

		} else {

			$this->red   = hexdec(substr($hexString,0,2));
			$this->green = hexdec(substr($hexString,2,2));
			$this->blue  = hexdec(substr($hexString,4,2));

		}		
	}

	private function from_array($color_array){

		if(count($color_array) !== 3){

			throw new Exception('invalid argument');

		}

		foreach($color_array as $chanel){

			if(!is_int($chanel)){

				throw new Exception('invalid argument');

			}

			if($chanel < 0 || $ chanel > 255){
				
				throw new Exception('invalid argument');

			}

		}

		$this->red   = $color_array[0];
		$this->green = $color_array[1];
		$this->blue  = $color_array[2];


	}
}