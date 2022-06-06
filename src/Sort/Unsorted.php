<?php declare(strict_types = 1);

namespace Train\Sort;

use Train\Carriage;
use Train\Train;
use Train\SortStrategy;

final class Unsorted implements SortStrategy
{
	public function sort(Train $train, Carriage $carriage): ?Carriage
	{
		return $train->tail();
	}

}
