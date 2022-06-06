<?php declare(strict_types = 1);

namespace Train;

class Train
{
	private ?Carriage $head = null;

	private ?Carriage $tail = null;

	private SortStrategy $sortStrategy;


	public function __construct(
		SortStrategy $sortStrategy
	) {
		$this->sortStrategy = $sortStrategy;
	}


	public function attach(Carriage $carriage): self
	{
		$after = $this->sortStrategy->sort($this, $carriage);

		$carriage->onAttach($this, $after);

		if ($after === null) {
			$this->head = $carriage;
			$this->tail = $this->tail ?? $carriage;
		} elseif ($carriage->next() === null) {
			$this->tail = $carriage;
		}

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
