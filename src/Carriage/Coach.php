<?php declare(strict_types = 1);

namespace Train\Carriage;

class Coach extends \Train\Carriage
{
	private int $seats;


	public function __construct(int $seats)
	{
		$this->seats = $seats;
	}


	public function order(): int
	{
		return $this->seats;
	}

}
