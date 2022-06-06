<?php declare(strict_types = 1);

namespace Train;

class Train
{
	private ?Carriage $head = NULL;

	private ?Carriage $tail = NULL;

	private SortStrategy $sortStrategy;


	public function __construct(
		SortStrategy $sortStrategy
	) {
		$this->sortStrategy = $sortStrategy;
	}


	public function attach(Carriage $carriage): self
	{
		// Find the right place with SortStrategy where to attach new carriage.

		return $this;
	}


	public function head(): ?Carriage
	{
		return $this->head;
	}


	public function tail(): ?Carriage
	{
		return $this->tail;
	}

}
