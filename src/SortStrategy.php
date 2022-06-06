<?php declare(strict_types = 1);

namespace Train;

interface SortStrategy
{
	public function sort(Train $train, Carriage $carriage): ?Carriage;

}
