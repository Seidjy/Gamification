<?php 
class Metas{
	private $regraDeCumprir;
	private $regraDeLimitar;
	private $regraDePremiar;
	function __construct($cumprir, $limitar, $premiar)
	{
		$this->regraDeCumprir = $cumprir;
		$this->regraDeLimitar = $limitar;
		$this->regraDePremiar = $regraDeCumprir;
	}
}