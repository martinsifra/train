<?php declare(strict_types = 1);

namespace Train\Sort;

final class Descending implements \Train\SortStrategy
{
	public function sort(\Train\Train $train, \Train\Carriage $carriage): ?\Train\Carriage
	{
		$current = $train->tail();
		while ($current !== null) {
			if ($carriage->order() < $current->order()) {
				return $current;
			}

			$current = $current->previous();
		}

		return null;
	}

}
