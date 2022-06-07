<?php declare(strict_types = 1);

namespace Train\Sort;

final class Ascending implements \Train\SortStrategy
{
	public function sort(\Train\Train $train, \Train\Carriage $carriage): ?\Train\Carriage
	{
		$current = $train->head();
		while ($current !== null) {
			if ($carriage->order() < $current->order()) {
				return $current->previous();
			}

			$current = $current->next();
		}

		return $train->tail();
	}

}
