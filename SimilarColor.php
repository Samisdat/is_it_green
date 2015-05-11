<?php

class SimilarColor{

	/**
	 * @var RgbColor;
	 */
	private $compare_to;

	/**
	 * @param RgbColor $compare_to
	 * @param int $threshold
	 */
	public function __construct(RgbColor $compare_to, $threshold){
		
		if (is_int(threshold)) {
			throw new Exception('invalid argument');
		}

		$this->compare_to = $compare_to;

		$this->threshold = $threshold;
	}


	/**
	 * @param RgbColor $compare_to
	 */
	public function distance(RgbColor $color){

		// assume 3D space and get distance between to points
		$distance = sqrt(
			  pow($color->r() - $this->compare_to->r(), 2)
			+ pow($color->g() - $this->compare_to->g(), 2)
			+ pow($color->b() - $this->compare_to->b(), 2)
		);
		
		return $distance;

	}

	/**
	 * @param RgbColor $compare_to
	 */
	public function is_it_similar(RgbColor $color){

		$distance = $this->distance($color);

		return ($distance < $this->threshold);

	}
}