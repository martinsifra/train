<?php declare(strict_types = 1);

namespace Train;

abstract class Carriage
{
	protected ?Carriage $previous = null;

	protected ?Carriage $next = null;


	abstract public function order(): int;


	public function onAttach(Train $train, ?Carriage $after): void
	{
		$head = $train->head();

		if ($head === null) { // Train without carriages
			return;
		}

		if ($after === null) { // At the beginning of train
			$this->next = $head;
			$head->previous = $this;
		} else {
			$next = $after->next;

			$this->previous = $after;
			$this->next = $next;

			$after->next = $this;

			if ($next !== null) { // Not the end of train
				$next->previous = $this;
			}
		}
	}


	public function previous(): ?Carriage
	{
		return $this->previous;
	}


	public function next(): ?Carriage
	{
		return $this->next;
	}


}
